<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Visi_Misi;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Auth;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visi_misis = Visi_Misi::all();
        return view('dashboard.static_text.visi_misi.index', [
            'visi_misis' => $visi_misis
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
        return view('dashboard.static_text.visi_misi.create', compact('category'));
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
            $data['body'] = str::limit(strip_tags($request->body), 200);
            $data['body_en'] = str::limit(strip_tags($request->body_en), 200);
            $data['categori_id'] = 0;

        Visi_Misi::create($data);

        return redirect()->route('visi_misi.index')->with('success', 'New post has been added!');
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
        $visi_misis = Visi_Misi::find($id);
        $category = category::all();

        return view('dashboard.static_text.visi_misi.edit', compact('visi_misis', 'category'));
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
        $data = $request->all();
            $data['slug'] = Str::slug($request->title);
            $data['body'] = str::limit(strip_tags($request->body), 200);
            $data['body_en'] = str::limit(strip_tags($request->body_en), 200);

            $visi_misis = Visi_Misi::findOrFail($id);
            $visi_misis->update($data);
            return redirect()->route('visi_misi.index')->with('success', 'New post has been update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visi_misis = Visi_Misi::find($id);

        $visi_misis->delete();

        return redirect()->route('visi_misi.index')->with('success', 'Post has been delete!');
    }
}
