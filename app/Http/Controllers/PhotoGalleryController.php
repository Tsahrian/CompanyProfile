<?php

namespace App\Http\Controllers;

use App\Models\PhotoGallery;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo_gallery = PhotoGallery::all();
        return view('dashboard.photo_gallery.index', [
            'image_gallery' => $photo_gallery
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
        return view('dashboard.photo_gallery.create', compact('category'));
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
            'title_photo' => 'required|min:4',
            'title_photo_en' => 'required|min:4',
        ]);

        $data = $request->all();
            $data['slug'] = str::slug($request->title_photo);
            $data['user_id'] = Auth::id();
            $data['views'] = 0;
            $data['categori_id'] = 0;
            $data['body'] = str::limit(strip_tags($request->body), 200);
            $data['body_en'] = str::limit(strip_tags($request->body_en), 200);
            $data['image_gallery'] = $request->file('image_gallery')->store('photo_gallery');

        PhotoGallery::create($data);

        return redirect()->route('photo_gallery.index')->with('success', 'New post has been added!');
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
        $photo_gallery = PhotoGallery::find($id);
        $category = category::all();

        return view('dashboard.photo_gallery.edit', [
            'photo_gallery'      => $photo_gallery,
            'category'          => $category
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
        if(empty($request->file('image_gallery'))){
            $photo_gallery = PhotoGallery::find($id);
            $photo_gallery->update([
                'title_photo' => $request->title_photo,
                'title_photo_en' => $request->title_photo_en,
                'body' => str::limit(strip_tags($request->body), 200),
                'body_en' => str::limit(strip_tags($request->body_en), 200),
                'slug' => str::slug($request->title_photo),
                'category_id' => $request->category_id,
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
            ]);
            return redirect()->route('photo_gallery.index')->with('success', 'New post has been update!');
        }else{
            $photo_gallery = PhotoGallery::find($id);
            storage::delete($photo_gallery->image_gallery);
            $photo_gallery->update([
                'title_photo' => $request->title_photo,
                'title_photo_en' => $request->title_photo_en,
                'body' => str::limit(strip_tags($request->body), 200),
                'body_en' => str::limit(strip_tags($request->body_en), 200),
                'slug' => str::slug($request->title_photo),
                'category_id' => $request->category_id,
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
                'image_gallery' => $request->file('image_gallery')->store('photo_gallery'),
            ]);
            return redirect()->route('photo_gallery.index')->with('success', 'New post has been update!');
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
        $photo_gallery = PhotoGallery::find($id);

        storage::delete($photo_gallery->image_gallery);
        $photo_gallery->delete();

        return redirect()->route('photo_gallery.index')->with('success', 'Post has been delete!');
    }
}
