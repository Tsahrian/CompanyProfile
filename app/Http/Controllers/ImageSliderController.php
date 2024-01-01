<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageSlider;
use App\Models\Category;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image_slider = ImageSlider::all();
        return view('dashboard.image_slider.index', [
            'image_slider' => $image_slider
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
        return view('dashboard.image_slider.create', compact('category'));
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
            'title_slider' => 'required|min:4',
            'title_slider_en' => 'required|min:4',
        ]);

        $data = $request->all();
            $data['slug'] = str::slug($request->title_slider);
            $data['user_id'] = Auth::id();
            $data['views'] = 0;
            $data['categori_id'] = 0;
            $data['body'] = str::limit(strip_tags($request->body), 200);
            $data['body_en'] = str::limit(strip_tags($request->body_en), 200);
            $data['images_slider'] = $request->file('images_slider')->store('image_slider');

        ImageSlider::create($data);
        return redirect()->route('image_slider.index')->with('success', 'New post has been added!');
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
        $image_slider = ImageSlider::find($id);
        $category = category::all();

        return view('dashboard.image_slider.edit', [
            'image_slider'      => $image_slider,
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
        if(empty($request->file('images_slider'))){
            $image_slider = ImageSlider::find($id);
            $image_slider->update([
                'title_slider' => $request->title_slider,
                'title_slider_en' => $request->title_slider_en,
                'body' => str::limit(strip_tags($request->body), 200),
                'body_en' => str::limit(strip_tags($request->body_en), 200),
                'slug' => str::slug($request->title_slider),
                'category_id' => $request->category_id,
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
            ]);
            return redirect()->route('image_slider.index')->with('success', 'New post has been update!');
        }else{
            $image_slider = ImageSlider::find($id);
            storage::delete($image_slider->images_slider);
            $image_slider->update([
                'title_slider' => $request->title_slider,
                'body' => $request->body,
                'body_en' => $request->body_en,
                'slug' => str::slug($request->title_slider),
                'category_id' => $request->category_id,
                'is_active' => $request->is_active,
                'user_id' => Auth::id(),
                'images_slider' => $request->file('images_slider')->store('image_slider'),
            ]);
            return redirect()->route('image_slider.index')->with('success', 'New post has been update!');
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
        $image_slider = ImageSlider::find($id);

        storage::delete($image_slider->images_slider);
        $image_slider->delete();

        return redirect()->route('image_slider.index')->with('success', 'Post has been delete!');
    }


}
