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

                        <h4 class="card-title">Riwayat Cuti</h4>
                        <p class="card-title-desc">Riwayat pengajuan cuti kamu selama ini.</p>

                        <table id="datatables_new" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Alasan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($cuti as $i => $item)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$item->category->title}}</td>
                                    <td>@if($item->subcategory == null) {{'Tidak Ada Subcategory'}} @else {{$item->subcategory->title}} @endif</td>
                                    <td>{{$item->alasan}}</td>
                                    <td>{{$item->from}}</td>
                                    <td>{{$item->to}}</td>
                                    <td>@include('status.default', ['data' => $item])</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">
                                        <center>Tidak Ada Data</center>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
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
              var table = $('#datatables_new').DataTable({
                  lengthChange: !1,
                  buttons: ["copy", "excel", "pdf", "colvis"],
              })
            .buttons()
            .container()
            .appendTo("#datatables_new_wrapper .col-md-6:eq(0)");
              
            });
        </script>
    @endsection