<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $request->session()->regenerate();
            if(Auth::user()->level !== 'karyawan'){
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('welcome');
            }
        }
        return back()->with('error', 'Email atau password salah!');
    }
    public function index()
    {
        return view('auth.login');
    }
}
