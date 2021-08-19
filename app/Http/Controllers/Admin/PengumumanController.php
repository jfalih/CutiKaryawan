<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pengumuman;
use DataTables;
class PengumumanController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Pengumuman::all();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('active', function (Pengumuman $pengumuman) {
                return view('active.default', [
                    'data' => $pengumuman
                ]);
            })
            ->addColumn('action', function (Pengumuman $pengumuman) {
                return view('admin.pengumuman.action', [
                    'data' => $pengumuman
                ]);
            })
            ->make(true);
        }
        return view('admin.pengumuman');
    }
}
