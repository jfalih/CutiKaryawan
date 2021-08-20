<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\{Cuti, Category, User};
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
        $validate_category = Validator::make($request->all(), [
            'category' => 'required'
        ], ['category.required' => 'Category wajib diisi.']);
        if($validate_category->fails()){
            return redirect()->back()->withErrors($validate_category);
        }
        switch ($request->category) {
            case 1:
                $rules = [
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
                $to = \Carbon\Carbon::createFromFormat('Y-m-d', $request->from);
                $from = \Carbon\Carbon::createFromFormat('Y-m-d', $request->to);
                $diff_in_days = $to->diffInDays($from);
                $cuti = Cuti::create([
                    'cat_id' => $request->category,
                    'alasan' => $request->alasan,
                    'file' => $request->file('file')->getClientOriginalName(),
                    'from' => $request->from,
                    'to' => $request->to,
                    'user_id' => Auth::user()->id
                ]);
                $request->file('file')->store('public/files');
                return redirect()->back()->with('success', 'Berhasil membuat permohonan cuti');
                break;
            case 2:
                $rules = [
                    'from' => 'required',
                    'to' => 'required',
                    'alasan' => 'required|min:10|max:190',
                ];
                $messages = [
                    'jenis.required' => 'Jenis cuti wajib dipilih.',
                    'ttd.required' => 'Tanda tangan wajib diisi.',
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
                    $to = \Carbon\Carbon::createFromFormat('Y-m-d', $request->from);
                    $from = \Carbon\Carbon::createFromFormat('Y-m-d', $request->to);
                    $diff_in_days = $to->diffInDays($from);        
                if($diff_in_days <= Auth::user()->saldo_cuti){
                    $user = User::find(Auth::user()->id);
                    $user->saldo_cuti = $user->saldo_cuti - $diff_in_days;
                    $user->save();
                    $cuti = Cuti::create([
                        'cat_id' => $request->category,
                        'alasan' => $request->alasan,
                        'from' => $request->from,
                        'status' => 'pending',
                        'to' => $request->to,
                        'user_id' => Auth::user()->id
                    ]);
                    return redirect()->back()->with('success', 'Berhasil membuat permohonan cuti');
                } else {
                    return redirect()->back()->with('error', 'Sisa saldo cuti kamu tidak cukup');    
                }
                break;
            default:
                return redirect()->back()->with('error','Gagal membuat permohonan cuti!');
            break;
        }
    }
    public function index()
    {
        $categories = Category::all();
        $cuti = Cuti::with('user')->get();
        return view('cuti', [
            'categories' => $categories,
            'cuti' => $cuti
        ]);
    }
    public function category(Request $request)
    {
        return view('cuti.isi', ['id' => $request->cat_id]);
    }
    public function history(Request $request)
    {
        $cuti = Cuti::where('user_id', Auth::user()->id)->get();
        return view('cuti.history',[
            'cuti' => $cuti
        ]);
    }
}
