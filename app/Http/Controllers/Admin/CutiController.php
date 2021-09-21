<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Cuti, Category, Subcategory};
use DataTables;
use Auth;
class CutiController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            if(Auth::user()->level === 'staff'){
                $data = Cuti::where([
                    ['status', '=','success'],
                    ['cat_id', '=', 1]
                ])->orWhere(
                    [
                        ['status', '=','pending'],
                        ['cat_id', '=', 1]
                    ]
                )->orWhere(
                    [
                        ['status', '=','canceled'],
                        ['cat_id', '=', 1]
                    ]
                )->get();
                return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function (Cuti $cuti) {
                    return view('admin.cuti.action', [
                        'data' => $cuti
                    ]);
                })
                ->addColumn('jumlah_cuti', function (Cuti $cuti) {
                    $to = \Carbon\Carbon::createFromFormat('Y-m-d', $cuti->to);
                    $from = \Carbon\Carbon::createFromFormat('Y-m-d', $cuti->from);
                    $diff_in_days = $to->diffInDays($from);
                    return $diff_in_days;
                })
                ->addColumn('sisa_cuti', function (Cuti $cuti) {
                    return $cuti->user->saldo_cuti;
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
            } else {
                $data = Cuti::where([
                    ['status', '=','success'],
                    ['cat_id', '=', 1]
                ])->orWhere(
                    [
                        ['status', '=','confirmed'],
                        ['cat_id', '=', 1]
                    ]
                )->orWhere(
                    [
                        ['status', '=','canceled'],
                        ['cat_id', '=', 1]
                    ]
                )->get();
                return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function (Cuti $cuti) {
                    return view('admin.cuti.action', [
                        'data' => $cuti
                    ]);
                })
                ->addColumn('jumlah_cuti', function (Cuti $cuti) {
                    $to = \Carbon\Carbon::createFromFormat('Y-m-d', $cuti->to);
                    $from = \Carbon\Carbon::createFromFormat('Y-m-d', $cuti->from);
                    $diff_in_days = $to->diffInDays($from);
                    return $diff_in_days;
                })
                ->addColumn('sisa_cuti', function (Cuti $cuti) {
                    return $cuti->user->saldo_cuti;
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
        }
        return view('admin.cuti');
    }
    public function lain(Request $request)
    {
        if($request->ajax()){
            if(Auth::user()->level === 'staff'){
                $data = Cuti::where([
                    ['status', '=','success'],
                    ['cat_id', '=', 2]
                ])->orWhere(
                    [
                        ['status', '=','pending'],
                        ['cat_id', '=', 2]
                    ]
                )->orWhere(
                    [
                        ['status', '=','canceled'],
                        ['cat_id', '=', 2]
                    ]
                )->get();
                return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function (Cuti $cuti) {
                    return view('admin.cuti.action', [
                        'data' => $cuti
                    ]);
                })
                ->addColumn('jumlah_cuti', function (Cuti $cuti) {
                    $to = \Carbon\Carbon::createFromFormat('Y-m-d', $cuti->to);
                    $from = \Carbon\Carbon::createFromFormat('Y-m-d', $cuti->from);
                    $diff_in_days = $to->diffInDays($from);
                    return $diff_in_days;
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
                    if($cuti->sub_id !== null) {
                        return Subcategory::find($cuti->sub_id)->title;
                    } else {
                        return Category::find($cuti->cat_id)->title;    
                    }
                })
                ->make(true);
            } else {
                $data = Cuti::where([
                    ['status', '=','success'],
                    ['cat_id', '=', 2]
                ])->orWhere(
                    [
                        ['status', '=','confirmed'],
                        ['cat_id', '=', 2]
                    ]
                )->orWhere(
                    [
                        ['status', '=','canceled'],
                        ['cat_id', '=', 2]
                    ]
                )->get();
                return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function (Cuti $cuti) {
                    return view('admin.cuti.action', [
                        'data' => $cuti
                    ]);
                })
                ->addColumn('jumlah_cuti', function (Cuti $cuti) {
                    $to = \Carbon\Carbon::createFromFormat('Y-m-d', $cuti->to);
                    $from = \Carbon\Carbon::createFromFormat('Y-m-d', $cuti->from);
                    $diff_in_days = $to->diffInDays($from);
                    return $diff_in_days;
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
                    if($cuti->sub_id !== null) {
                        return Subcategory::find($cuti->sub_id)->title;
                    } else {
                        return Category::find($cuti->cat_id)->title;    
                    }
                })
                ->make(true);
            }
        }
    }
    public function konfirmasi($id)
    {
        if(Auth::user()->level === 'staff'){
            $cuti = Cuti::find($id);
            $cuti->status = 'confirmed';
            $cuti->save();
            return redirect()->back()->with('success', 'Berhasil mengkonfirmasi cuti karyawan!');
        } else {
            $cuti = Cuti::find($id);
            $cuti->status = 'success';
            $cuti->save();
            return redirect()->back()->with('success', 'Berhasil mengkonfirmasi cuti karyawan!');
        }
    }
    public function tolak($id)
    {
        $cuti = Cuti::find($id);
        $cuti->status = 'canceled';
        $cuti->save();
        return redirect()->back()->with('success', 'Berhasil menolak cuti karyawan!');    
    }
}
