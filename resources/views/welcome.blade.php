@extends('layouts.app')
@section('content')
<div class="container-fluid">


    <div class="row">
        @if(Auth::user()->level === 'hrd')
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <div class="avatar-sm mx-auto mb-4">
                            <span class="avatar-title rounded-circle bg-soft-primary font-size-24">
                                    <i class="fas fa-user text-primary"></i>
                                </span>
                        </div>
                        <p class="font-16 text-muted mb-2"></p>
                        <h5><a href="#" class="text-dark">Selamat Datang! - <span class="text-muted font-16">{{Auth::user()->name}}</span> </a></h5>
                        <p class="text-muted">Hai website ini merupakan sistem cuti karyawan.</p>
                    </div>
                    <div class="row mt-4">
                        <div class="col-4">
                            <div class="social-source text-center mt-3">
                                <div class="avatar-xs mx-auto mb-3">
                                    <span class="avatar-title rounded-circle bg-primary font-size-16">
                                            <i class="fas fa-users text-white"></i>
                                        </span>
                                </div>
                                <h5 class="font-size-15">Total Users</h5>
                                <p class="text-muted mb-0">@php 
                                        $user = App\User::all();
                                        echo $user->count();
                                    @endphp Total User</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="social-source text-center mt-3">
                                <div class="avatar-xs mx-auto mb-3">
                                    <span class="avatar-title rounded-circle bg-info font-size-16">
                                            <i class="fas fa-clipboard text-white"></i>
                                        </span>
                                </div>
                                <h5 class="font-size-15">
                                    Total Pengajuan Cuti
                                </h5>
                                <p class="text-muted mb-0">@php 
                                    $cuti = App\Cuti::all();
                                    echo $cuti->count();
                                @endphp Total Pengajuan Cuti</p>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="social-source text-center mt-3">
                                <div class="avatar-xs mx-auto mb-3">
                                    <span class="avatar-title rounded-circle bg-pink font-size-16">
                                            <i class="fas fa-exclamation-circle text-white"></i>
                                        </span>
                                </div>
                                <h5 class="font-size-15">Total Pengumuman</h5>
                                <p class="text-muted mb-0"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">    
                    <div class="float-end mt-2">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{Auth::user()->saldo_cuti}}</span></h4>
                        <p class="text-muted mb-0">Saldo Cuti</p>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1">{{Auth::user()->level}}</h4>
                        <p class="text-muted mb-0">Jabatan</p>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <i class="fas fa-address-card"></i>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1">{{Auth::user()->name}}</h4>
                        <p class="text-muted mb-0">Nama</p>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->
    </div> <!-- end row-->

    <div class="row">
        <div class="col-xl-4">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-sm-8">
                            <p class="text-white font-size-18">Selamat datang di <b>Sistem Cuti Karyawan</b>!</p>
                            <div class="mt-4">
                                <a href="{{route('cuti')}}" class="btn btn-success waves-effect waves-light">
                                    Ajukan Cuti!
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mt-4 mt-sm-0">
                                <img src="assets/images/setup-analytics-amico.svg" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->

        </div> <!-- end Col -->
        
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4">Pengumuman</h4>

                    <ol class="activity-feed mb-0 ps-2" data-simplebar style="max-height: 336px;">
                        <li class="feed-item">
                            <div class="feed-item-list">
                                <p class="text-muted mb-1 font-size-13">Today<small class="d-inline-block ms-1">12:20 pm</small></p>
                                <p class="mb-0">Andrei Coman magna sed porta finibus, risus
                                    posted a new article: <span class="text-primary">Forget UX
                                        Rowland</span></p>
                            </div>
                        </li>
                        <li class="feed-item">
                            <p class="text-muted mb-1 font-size-13">22 Jul, 2020 <small class="d-inline-block ms-1">12:36 pm</small></p>
                            <p class="mb-0">Andrei Coman posted a new article: <span
                                    class="text-primary">Designer Alex</span></p>
                        </li>
                        <li class="feed-item">
                            <p class="text-muted mb-1 font-size-13">18 Jul, 2020 <small class="d-inline-block ms-1">07:56 am</small></p>
                            <p class="mb-0">Zack Wetass, sed porta finibus, risus Chris Wallace
                                Commented <span class="text-primary"> Developer Moreno</span></p>
                        </li>
                        <li class="feed-item">
                            <p class="text-muted mb-1 font-size-13">10 Jul, 2020 <small class="d-inline-block ms-1">08:42 pm</small></p>
                            <p class="mb-0">Zack Wetass, Chris combined Commented <span
                                    class="text-primary">UX Murphy</span></p>
                        </li>

                        <li class="feed-item">
                            <p class="text-muted mb-1 font-size-13">23 Jun, 2020 <small class="d-inline-block ms-1">12:22 am</small></p>
                            <p class="mb-0">Zack Wetass, sed porta finibus, risus Chris Wallace
                                Commented <span class="text-primary"> Developer Moreno</span></p>
                        </li>
                        <li class="feed-item pb-1">
                            <p class="text-muted mb-1 font-size-13">20 Jun, 2020 <small class="d-inline-block ms-1">09:48 pm</small></p>
                            <p class="mb-0">Zack Wetass, Chris combined Commented <span
                                    class="text-primary">UX Murphy</span></p>
                        </li>

                    </ol>

                </div>
            </div>
        </div>

    </div> <!-- end row-->

</div> <!-- container-fluid -->
@endsection