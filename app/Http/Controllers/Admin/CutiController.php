<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Cuti, Category};
use DataTables;
class CutiController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Cuti::all();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function (Cuti $cuti) {
                return view('admin.cuti.action', [
                    'data' => $cuti
                ]);
            })
            ->addColumn('status', function (Cuti $cuti) {
                return view('status.default', [
                    'data' => $cuti
                ]);
            })
            ->addColumn('username', function (Cuti $cuti) {
                return $cuti->user->name;
            })
            ->addColumn('category', function (Cuti $cuti) {
                return Category::find($cuti->cat_id)->title;
            })
            ->make(true);
        }
        return view('admin.cuti');
    }
    public function konfirmasi($id)
    {
        $cuti = Cuti::find($id);
        $cuti->status = 'success';
        $cuti->save();
        return redirect()->back()->with('success', 'Berhasil mengkonfirmasi cuti karyawan!');
    }
    public function tolak($id)
    {
        $cuti = Cuti::find($id);
        $cuti->status = 'canceled';
        $cuti->save();
        return redirect()->back()->with('success', 'Berhasil menolak cuti karyawan!');    
    }
}
