@extends('layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Pengaturan Akun</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{route('user.change')}}" class="card">
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
                            <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}" id="example-text-input">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Nik</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="nik" value="{{Auth::user()->nik}}" id="example-text-input">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                                <input class="form-control" type="email" name="email" value="{{Auth::user()->email}}" id="example-text-input">
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