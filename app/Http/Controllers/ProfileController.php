<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('dashboard.profile.index', [
            'profiles' => $profiles
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
        return view('dashboard.profile.create', compact('category'));
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
            'phone' => 'required|min:4',
        ]);

        $data = $request->all();
            $data['slug'] = str::slug($request->phone);
            $data['phone'];
            $data['address'];
            $data['email'];
            $data['is_active'];
            $data['categori_id'] = 0;

        Profile::create($data);

        return redirect()->route('profile.index')->with('success', 'New post has been added!');
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
        $profiles = Profile::find($id);
        $category = category::all();

        return view('dashboard.profile.edit', [
            'profiles'      => $profiles,
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
        $data = $request->all();
        $data['slug'] = str::slug($request->phone);

        $profiles = Profile::findOrFail($id);
        $profiles->update($data);

        return redirect()->route('profile.index')->with('success', 'New post has been update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profiles = Profile::find($id);

        $profiles->delete();

        return redirect()->route('profile.index')->with('success', 'Post has been delete!');
    }
}
