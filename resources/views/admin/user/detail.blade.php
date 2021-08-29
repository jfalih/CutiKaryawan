@extends('layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Ubah data user {{$user->name}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{route('admin.user.update',['id' => $user->id])}}" class="card">
                    @csrf
                    <div class="card-body">
                        @if(count($errors) > 0)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <ul>
                                                @foreach($errors->all() as $message)
                                                    <li>{{ $message }}</li>
                                                @endforeach
                                            </ul>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif
                                        @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <i class="uil uil-check me-2"></i>
                                            {{session('success')}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                            </button>
                                        </div>
                                        @endif
                                        @if(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="uil uil-exclamation-octagon me-2"></i>
                                            {{session('error')}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                            </button>
                                        </div>
                                        @endif
                        <div class="mb-3 row">
                            <label for="name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" value="{{$user->name}}" id="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nik" class="col-md-2 col-form-label">Nik</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="nik" value="{{$user->nik}}" id="nik">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                                <input class="form-control" type="email" name="email" value="{{$user->email}}" id="email">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-md-2 col-form-label">Password</label>
                            <div class="col-md-10">
                                <input class="form-control" type="password" name="password" id="password">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger" type="reset">Reset</button>
                        <button class="btn btn-primary" type="submit">Ubah</button>
                    </div>
                </form>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

        
    </div> <!-- container-fluid -->
@endsection