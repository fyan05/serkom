<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.home');
    }
    public function login(Request $request)
    {
        return view('login');
    }
public function Auth(Request $request) {
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.index');
        }
        elseif (Auth::user()->role == 'operator') {
            return redirect()->route('admin.index');
        }
        else {
            return redirect()->back();
        }
    }

    return back()->withErrors([
        'username' => 'Username atau password salah.',
    ]);
}
public function logout(){
    Auth::logout();
    return redirect()->route('login');
}
}
