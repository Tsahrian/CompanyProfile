<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Storage;

class SosmedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sosmeds = Sosmed::all();
        return view('dashboard.sosmed.index', [
            'sosmeds' => $sosmeds
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
        return view('dashboard.sosmed.create', compact('category'));
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
            'title_sosmed' => 'required|min:4',
        ]);

        $data = $request->all();
            $data['slug'] = str::slug($request->title_sosmed);
            $data['categori_id'] = 0;
            $data['icon'] = $request->file('icon')->store('sosmed');

        Sosmed::create($data);

        return redirect()->route('sosmed.index')->with('success', 'New post has been added!');
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
        $sosmeds = Sosmed::find($id);
        $category = Category::all();

        return view('dashboard.sosmed.edit', [
            'sosmeds'      => $sosmeds,
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
        $this->validate($request, [
            'title_sosmed' => 'required|min:4',
        ]);

        if (!empty($request->file('icon'))) {
            $data = $request->all();
            $data['slug'] = Str::slug($request->title_sosmed);
            $data['icon'] = $request->file('icon')->store('sosmeds');

            $sosmeds = Sosmed::findOrFail($id);
            Storage::delete($sosmeds->icon);


            $sosmeds->update($data);
            return redirect()->route('sosmed.index')->with('success', 'New post has been update!');
        } else {
            $data = $request->all();
            $data['slug'] = Str::slug($request->title_sosmed);

            $sosmeds = Sosmed::findOrFail($id);
            $sosmeds->update($data);
            return redirect()->route('posts.index')->with('success', 'New post has been update!');
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
        $sosmeds = Sosmed::find($id);

        storage::delete($sosmeds->icon);
        $sosmeds->delete();

        return redirect()->route('sosmed.index')->with('success', 'Post has been delete!');
    }
}
