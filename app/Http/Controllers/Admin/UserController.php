<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use DataTables;
use Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = User::all();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function (User $user) {
                return view('admin.user.action', [
                    'data' => $user
                ]);
            })
            ->make(true);
        }
        return view('admin.user');
    }
    public function add(Request $request)
    {
        $rules = [
            'name' => 'required',
            'nik' => 'required',
            'saldo_cuti' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'level' => 'required',
            'password' => 'required'
        ];
        $messages = [
            'name.required' => 'Nama wajib diisi.',
            'nik.required' => 'Nik wajib diisi.',
            'saldo_cuti.required' => 'Saldo awal cuti wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'level.required' => 'Level pengguna wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }       
        User::create([
            'name' => $request->name,
            'nik' => $request->nik,
            'saldo_cuti' => $request->saldo_cuti,
            'email' => $request->email,
            'level' => $request->level,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan pengguna!');
    }
    public function destroy($id)
    {
        $user = User::find($id);
    }
}
