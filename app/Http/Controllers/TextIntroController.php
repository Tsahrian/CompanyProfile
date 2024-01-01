<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\TextIntro;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Auth;

class TextIntroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $text_intros = TextIntro::all();
        return view('dashboard.static_text.text_intro.index', [
            'text_intros' => $text_intros
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
        return view('dashboard.static_text.text_intro.create', compact('category'));
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
            'title_intro' => 'required|min:4',
            'title_intro_en' => 'required|min:4',
        ]);

        $data = $request->all();
            $data['slug'] = str::slug($request->title_intro);
            $data['user_id'] = Auth::id();
            // $data['body_intro'];
            $data['categori_id'] = 0;
            $data['body_intro'] = str::limit(strip_tags($request->body_intro_en), 200);
            $data['body_intro_en'] = str::limit(strip_tags($request->body_intro_en), 200);

        TextIntro::create($data);

        return redirect()->route('text_intro.index')->with('success', 'New post has been added!');
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
        $text_intros = TextIntro::find($id);
        $category = category::all();

        return view('dashboard.static_text.text_intro.edit', compact('text_intros', 'category'));
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
            $data['slug'] = Str::slug($request->title_intro);
            $data['body_intro'] = str::limit(strip_tags($request->body_intro), 200);
            $data['body_intro_en'] = str::limit(strip_tags($request->body_intro_en), 200);

            $text_intros = TextIntro::findOrFail($id);
            $text_intros->update($data);
            return redirect()->route('text_intro.index')->with('success', 'New post has been update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $text_intros = TextIntro::find($id);

        $text_intros->delete();

        return redirect()->route('text_intro.index')->with('success', 'Post has been delete!');
    }
}
