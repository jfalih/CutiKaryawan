<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
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
    public function add(Request $request)
    {
        $rules = [
            'judul' => 'required',
            'isi' => 'required',
        ];
        $messages = [
            'judul.required' => 'Judul pengumuman masih kosong.',
            'isi.required' => 'Isi pengumuman masih kosong.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }   
        Pengumuman::create([
            'title' => $request->judul,
            'isi' => $request->isi
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan pengumuman!');
    }
    public function destroy($id)
    {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus pengumuman!');
    }
}
