<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin/login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt($request->only('name', 'password'))) {
            return redirect('/admin/dashboard');
        } else {
            Session::flash('error', 'Username atau Password Salah');
            return redirect('/admin');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/admin');
    }
}
