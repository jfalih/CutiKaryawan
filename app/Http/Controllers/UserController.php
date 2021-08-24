<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use App\User;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user');
    }
    public function pengaturan(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'nik' => 'required',
        ];
        $messages = [
            'name.required' => 'Nama wajib diisi.',
            'nik.required' => 'Nik wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah digunakan.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }      
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nik = $request->nik;
        $user->save();
        return redirect()->back()->with('success','Berhasil merubah pengaturan akun!');
    }
    public function change_password()
    {
        return view('change');
    }
    public function password(Request $request)
    {
        $rules = [
            'password' => 'required',
            'new_password' => 'required',
            'c_password' => 'required|same:new_password',
        ];
        $messages = [
            'password.required' => 'Password wajib diisi.',
            'new_password.required' => 'New password wajib diisi.',
            'c_password.required' => 'Konfirmasi password wajib diisi.',
            'c_password.same' => 'Konfirmasi password tidak sama dengan password baru.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        } 
        $user = User::find(Auth::user()->id);
        if(Hash::check($request->password, $user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', 'Password berhasil diubah!');
        } else {
            return redirect()->back()->with('error', 'Password lama salah silahkan dicek kembali.');
        }
    }
    public function profile()
    {
        return view('profile');
    }
}
