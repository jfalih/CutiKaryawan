<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use DataTables;
use Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            if(Auth::user()->level === 'staff'){
            $data = User::where('level','karyawan')->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function (User $user) {
                return view('admin.user.action', [
                    'data' => $user
                ]);
            })
            ->make(true);
            } else {
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
        }
        return view('admin.user');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.detail', ['user' => $user]);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nik' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ],[
            'required' => ':attribute harus diisi.',
            'email' => ':attribute harus berupa email.',
            'min' => 'Minimal karakter dari :attribute harus :min karakter.'
        ]);
        $user = User::findOrFail($id);
        if($user){
            $user->name = $request->name;
            $user->nik = $request->nik;
            $user->email = $request->email;            
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('success', 'Berhasil merubah pengguna!');
        }
        return redirect()->back()->with('error','User tidak ditemukan!');
    }
    public function add(Request $request)
    {
        $rules = [
            'name' => 'required',
            'nik' => 'required',
            'email' => 'required|email|unique:users',
            'level' => 'required',
            'password' => 'required'
        ];
        $messages = [
            'name.required' => 'Nama wajib diisi.',
            'nik.required' => 'Nik wajib diisi.',
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
            'saldo_cuti' => 12,
            'email' => $request->email,
            'level' => $request->level,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan pengguna!');
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus user!');
    }
}
