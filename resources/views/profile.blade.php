@extends('layouts.app')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Profile</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row mb-4">
        <div class="col-xl-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="text-center">
                        <div class="mt-4">
                            <i class="fa fa-user fa-4x"></i>
                        </div>
                        <h5 class="mt-3 mb-1">{{Auth::user()->name}}</h5>
                        <p class="text-muted">{{Auth::user()->level}}</p>
                        <a href="{{route('user.pengaturan')}}" class="btn btn-light btn-sm"><i class="uil uil-cog"></i> Pengaturan Akun</a>
                        <a href="{{route('user.pengaturan')}}" class="btn btn-light btn-sm"><i class="uil uil-lock"></i> Ganti Password</a>
                    </div>

                    <hr class="my-4">

                    <div class="text-muted">
                        <div class="table-responsive mt-4">
                            <div>
                                <p class="mb-1">Nama :</p>
                                <h5 class="font-size-16">{{Auth::user()->name}}</h5>
                            </div>
                            <div class="mt-4">
                                <p class="mb-1">Nik :</p>
                                <h5 class="font-size-16">{{Auth::user()->nik}}</h5>
                            </div>
                            <div class="mt-4">
                                <p class="mb-1">Sisa Cuti :</p>
                                <h5 class="font-size-16">{{Auth::user()->saldo_cuti}}</h5>
                            </div>
                            <div class="mt-4">
                                <p class="mb-1">Status :</p>
                                <h5 class="font-size-16">{{Auth::user()->level}}</h5>
                            </div>
                            <div class="mt-4">
                                <p class="mb-1">E-mail :</p>
                                <h5 class="font-size-16">{{Auth::user()->email}}</h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    
</div>
@endsection