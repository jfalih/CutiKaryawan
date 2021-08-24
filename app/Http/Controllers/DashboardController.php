<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuti;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $cuties = Cuti::with('user')->get();
        return view('dashboard', ['cuti' => $cuties]);
    }
}
