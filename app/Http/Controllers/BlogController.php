<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all();
        return view('dashboard.blog.index', [
            'blog' => $blog
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('dashboard.blog.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|min:4',
            'title_en' => 'required|min:4',
        ]);

        $data = $request->all();
            $data['slug'] = str::slug($request->title);
            $data['user_id'] = Auth::id();
            $data['tanggal'];
            $data['views'] = 0;
            $data['categori_id'] = 0;
            $data['body'] = str::limit(strip_tags($request->body), 200);
            $data['body_en'] = str::limit(strip_tags($request->body_en), 200);
            $data['image_blog'] = $request->file('image_blog')->store('blog');

        Blog::create($data);

        return redirect()->route('blog.index')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $category = category::all();

        return view('dashboard.blog.edit', [
            'blog'      => $blog,
            'category'  => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(empty($request->file('image_blog'))){
            $blog = blog::find($id);
            $blog->update([
                'tanggal'     => $request->tanggal,
                'title'       => $request->title,
                'title_en'    => $request->title_en,
                'body'        => str::limit(strip_tags($request->body), 200),
                'body_en'     => str::limit(strip_tags($request->body_en), 200),
                'slug'        => str::slug($request->title),
                'category_id' => $request->category_id,
                'is_active'   => $request->is_active,
                'user_id'     => Auth::id(),
            ]);
            return redirect()->route('blog.index')->with('success', 'New post has been update!');
        }else{
            $blog = blog::find($id);
            storage::delete($blog->image_blog);
            $blog->update([
                'tanggal'     => $request->tanggal,
                'title'       => $request->title,
                'title_en'    => $request->title_en,
                'body'        => $request->body,
                'body_en'     => $request->body_en,
                'slug'        => str::slug($request->title),
                'category_id' => $request->category_id,
                'is_active'   => $request->is_active,
                'user_id'     => Auth::id(),
                'image_blog'  => $request->file('image_blog')->store('blog'),
            ]);
            return redirect()->route('blog.index')->with('success', 'New post has been update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);

        storage::delete($blog->image_blog);
        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Post has been delete!');
    }
}
