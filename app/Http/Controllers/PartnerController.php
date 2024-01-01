<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
        return view('dashboard.partner.index',  [
            'partners' => $partners
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
        return view('dashboard.partner.create', compact('category'));
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
            'name_partner' => 'required|min:4',
        ]);

        $data = $request->all();
            $data['slug'] = str::slug($request->name_partner);
            $data['user_id'] = Auth::id();
            $data['categori_id'] = 0;
            $data['logo'] = $request->file('logo')->store('partners');

        Partner::create($data);

        return redirect()->route('partner.index')->with('success', 'New post has been added!');
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
        $partners = Partner::find($id);
        $category = category::all();

        return view('dashboard.partner.edit', compact('partners', 'category'));
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
            'name_partner' => 'required|min:4',
        ]);

        if (!empty($request->file('logo'))) {
            $data = $request->all();
            $data['slug'] = Str::slug($request->name_partner);
            $data['logo'] = $request->file('logo')->store('partners');

            $partners = Partner::findOrFail($id);
            Storage::delete($partners->logo);


            $partners->update($data);
            return redirect()->route('partner.index')->with('success', 'New post has been update!');
        } else {
            $data = $request->all();
            $data['slug'] = Str::slug($request->name_partner);

            $partners = Partner::findOrFail($id);
            $partners->update($data);
            return redirect()->route('partner.index')->with('success', 'New post has been update!');
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
        $partners = Partner::find($id);

        storage::delete($partners->cover);
        $partners->delete();

        return redirect()->route('partner.index')->with('success', 'Post has been delete!');
    }
}
