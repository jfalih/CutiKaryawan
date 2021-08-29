@extends('layouts.app')
@section('css')

        <!-- DataTables -->
        <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />  

        <!-- Responsive datatable examples -->
    @parent
@endsection
@section('content')
    <div class="container-fluid"> 
        <div class="row">
            <div class="col-12">
                <div class="card">
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
                            {{session('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <h4 class="card-title">List User</h4>
                        <p class="card-title-desc">List user pengguna website.</p>
                        <button class="btn btn-primary mb-3"  data-bs-toggle="modal" data-bs-target="#myModal"><i class="fas fa-plus"></i> Tambah User</button>
                        <table id="datatables1" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Nik</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{route('user.add')}}"  class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label for="example-text-input" class="col-form-label">Name</label>
                        <div class="col-md-12">
                            <input class="form-control" name="name" type="text" placeholder="Nama" id="example-text-input">
                        </div>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-form-label">Nik</label>
                        <div class="col-md-12">
                            <input class="form-control" name="nik" type="text" placeholder="Nik" id="example-text-input">
                        </div>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-form-label">Email</label>
                        <div class="col-md-12">
                            <input class="form-control" name="email" type="email" placeholder="Email" id="example-text-input">
                        </div>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-form-label">Saldo Cuti</label>
                        <div class="col-md-12">
                            <input class="form-control" name="saldo_cuti" type="number" placeholder="Saldo cuti" id="example-text-input">
                        </div>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-form-label">Level</label>
                        <div class="col-md-12">
                            <select name="level" class="form-select">
                                <option>Pilih level</option>
                                <option value="karyawan">Karyawan</option>
                                <option value="staff">Staff</option>
                                <option value="hrd">Hrd</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-form-label">Password</label>
                        <div class="col-md-12">
                            <input class="form-control" name="password" type="password" placeholder="Password" id="example-text-input">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                </div>
            </form><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('js')
    @parent
    
        <!-- Required datatable js -->
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('assets/libs/jszip/jszip.min.js')}}"></script>
        <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
        
        <!-- Responsive examples -->
        <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

        <!-- Datatable init js -->
        <script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
        <script type="text/javascript">
            $(function () {
              var table = $('#datatables1').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: "{{ route('admin.user') }}",
                  columns: [
                      {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                      {data: 'name', name: 'Nama'},
                      {data: 'nik', name: 'Nik'},
                      {data: 'email', name: 'Email'},
                      {data: 'action', name: 'Action'},
                  ]
              });
              
            });
        </script>
    @endsection