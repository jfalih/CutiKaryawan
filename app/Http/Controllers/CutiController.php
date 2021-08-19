<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuti;
use DataTables;
use Auth;
use Validator;
class CutiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }
    public function addCuti(Request $request){
        $rules = [
            'jenis' => 'required',
            'ttd' => 'required',
            'file' => 'required',
            'from' => 'required',
            'to' => 'required',
            'alasan' => 'required|min:10|max:190',
        ];
        $messages = [
            'jenis.required' => 'Jenis cuti wajib dipilih.',
            'ttd.required' => 'Tanda tangan wajib diisi.',
            'file.required' => 'File wajib diisi.',
            'from.required' => 'Tanggal awal cuti wajib diisi.',
            'to.required' => 'Tanggal akhir cuti wajib diisi.',
            'alasan.required' => 'Alasan cuti wajib diisi.',
            'alasan.min' => 'Alasan minimal diisi dengan :min karakter.',
            'alasan.max' => 'Alasan maximal diisi dengan :max karakter.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $cuti = Cuti::create([
            'cat_id' => $request->jenis,
            'alasan' => $request->alasan,
            'file' => $request->file('file')->getClientOriginalName(),
            'from' => $request->from,
            'to' => $request->to,
            'user_id' => Auth::user()->id
        ]);
        $request->file('file')->store('public/files');
        return redirect()->back()->with('success', 'Berhasil membuat cuti');
    }
    public function index()
    {
            return view('cuti');
    }
    public function history(Request $request)
    {
        $cuti = Cuti::where('user_id', Auth::user()->id)->get();
        return view('cuti.history',[
            'cuti' => $cuti
        ]);
    }
}
