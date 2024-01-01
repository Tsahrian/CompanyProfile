<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3',
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:255'
        ]);
        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);
        $request->session()->flash('success', 'Registrasi berhasil!!, Silahkan Login');
        return redirect('/login');
    }
}
