<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Jasa;
use App\Models\TextIntro;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Auth;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jasas = Jasa::all();
        return view('dashboard.static_text.jasa.index', [
            'jasas' => $jasas
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
        return view('dashboard.static_text.jasa.create', compact('category'));
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
            'title_jasa' => 'required|min:4',
            'title_jasa_en' => 'required|min:4',
        ]);

        $data = $request->all();
            $data['slug'] = str::slug($request->title_jasa);
            $data['user_id'] = Auth::id();
            $data['body_jasa'] = str::limit(strip_tags($request->body_jasa), 200);
            $data['body_jasa_en'] = str::limit(strip_tags($request->body_jasa_en), 200);
            $data['categori_id'] = 0;

        Jasa::create($data);

        return redirect()->route('jasa.index')->with('success', 'New post has been added!');
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
        $jasas = Jasa::find($id);
        $category = category::all();

        return view('dashboard.static_text.jasa.edit', compact('jasas', 'category'));
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
            $data['slug'] = Str::slug($request->title_jasa);
            $data['body_jasa'] = str::limit(strip_tags($request->body_jasa), 200);
            $data['body_jasa_en'] = str::limit(strip_tags($request->body_jasa_en), 200);

            $jasas = Jasa::findOrFail($id);
            $jasas->update($data);
            return redirect()->route('jasa.index')->with('success', 'New post has been update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jasas = Jasa::find($id);

        $jasas->delete();

        return redirect()->route('jasa.index')->with('success', 'Post has been delete!');
    }
}
