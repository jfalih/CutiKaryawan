<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;
class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function index()
    {
        $pengumuman = Pengumuman::all();
        return view('welcome', ['pengumuman' => $pengumuman]);
    }
}
