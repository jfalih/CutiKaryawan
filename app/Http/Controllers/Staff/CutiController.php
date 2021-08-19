<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cuti;
use DataTables;
class CutiController extends Controller
{

    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Cuti::with('user')->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function (Cuti $cuti) {
                return view('staff.cuti.action', [
                    'cuti' => $cuti
                ]);
            })
            ->make(true);
        }
        return view('staff.laporan');
    }

    public function kalender(){
        return view('staff.kalender');
    }
}
