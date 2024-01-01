<?php

namespace App\Http\Controllers;

use App\Models\Youtube;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Storage;


class YoutubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $youtubes = Youtube::all();
        return view('dashboard.youtube.index',  [
            'youtubes' => $youtubes
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
        return view('dashboard.youtube.create', compact('category'));
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
            'title_video' => 'required|min:4',
            'title_video_en' => 'required|min:4',
        ]);

        $data = $request->all();
            $data['slug'] = str::slug($request->title_video);
            // $data['views'] = 0;
            $data['categori_id'] = 0;
            $data['cover'] = $request->file('cover')->store('youtube');

        Youtube::create($data);

        return redirect()->route('youtube.index')->with('success', 'New post has been added!');
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
        $youtube = Youtube::find($id);
        $category = category::all();

        return view('dashboard.youtube.edit', compact('youtube', 'category'));
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
        $this->validate($request, [
            'title_video' => 'required|min:4',
            'title_video_en' => 'required|min:4',
        ]);

        if (!empty($request->file('cover'))) {
            $data = $request->all();
            $data['slug'] = Str::slug($request->title_video);
            $data['cover'] = $request->file('cover')->store('youtube');

            $youtube = Youtube::findOrFail($id);
            storage::delete($youtube->cover);


            $youtube->update($data);
            return redirect()->route('youtube.index')->with('success', 'New post has been update!');
        } else {
            $data = $request->all();
            $data['slug'] = Str::slug($request->title_video);

            $youtube = Youtube::findOrFail($id);
            $youtube->update($data);
            return redirect()->route('youtube.index')->with('success', 'New post has been update!');
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
        $youtube = Youtube::find($id);

        storage::delete($youtube->cover);
        $youtube->delete();

        return redirect()->route('youtube.index')->with('success', 'Post has been delete!');
    }
}
