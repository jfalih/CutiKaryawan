@extends('layouts.guest')
@section('content')
    
<div class="container">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card">
               
                <div class="card-body p-4"> 
                    <div class="text-center mt-2">
                        <h5 class="text-primary">Welcome Back !</h5>
                        <p class="text-muted">Sign in to continue to Sistem Cuti Karyawan.</p>
                    </div>
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="uil uil-exclamation-octagon me-2"></i>
                        {{session('error')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @endif
                    <div class="p-2 mt-4">
                        <form action="{{route('authenticate')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="username">Email</label>
                                <input type="text" class="form-control" id="username" name="email" placeholder="Enter username">
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label" for="userpassword">Password</label>
                                <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter password">
                            </div>
    
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="auth-remember-check">
                                <label class="form-check-label" for="auth-remember-check">Remember me</label>
                            </div>
                            
                            <div class="mt-3 text-end">
                                <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log In</button>
                            </div>

                            

                        </form>
                    </div>

                </div>
            </div>

            <div class="mt-5 text-center">
                <p>© <script>document.write(new Date().getFullYear())</script> Sistem Cuti Karyawan. Crafted with <i class="mdi mdi-heart text-danger"></i></p>
            </div>

        </div>
    </div>
    <!-- end row -->
</div>
<!-- end container -->
@endsection