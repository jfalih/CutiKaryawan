@extends('layouts.app')
@section('css')
    <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/spectrum-colorpicker2/spectrum.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/libs/@chenfengyuan/datepicker/datepicker.min.css')}}">
    <link href="{{asset('assets/libs/@fullcalendar/core/main.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/@fullcalendar/daygrid/main.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/@fullcalendar/bootstrap/main.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/@fullcalendar/timegrid/main.min.css')}}" rel="stylesheet" type="text/css" />
    @parent
@endsection
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Pengajuan Cuti</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-6">
                        <form class="card" method="POST" action="{{route('cuti.add')}}">
                            @csrf
                            <div class="card-body">
                                    <div class="row">        
                                        <div class="col-lg-12">
                                            <div class="mb-3 row">
                                                <label class="form-label">Tanggal Cuti</label>
                                                <div class="input-daterange input-group" id="datepicker6" data-date-format="yyyy-m-dd" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                                    <input type="text" class="form-control" name="start" placeholder="Tanggal Mulai" />
                                                    <input type="text" class="form-control" name="end" placeholder="Tanggal Akhir" />
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="form-label" id="alasan">Alasan Cuti</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text" placeholder="Alasan Cuti" id="alasan">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="form-label">File Surat Cuti</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="file" name="file">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-danger" type="reset">Reset Form</button>
                                <button class="btn btn-primary" type="submit">Ajukan Cuti</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Keterangan</h4>
                                <h6 class="card-text font-14 text-muted">Berikut keterangan warna yang ada dikalender.</h6>
                                <div class="alert alert-border alert-border-danger alert-dismissible fade show" role="alert">
                                    <i class="fas fa-circle font-size-16 text-danger me-2"></i>
                                    Merah - Tanggal sudah diambil karyawan lain.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                       
                                    </button>
                                </div>
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div> <!-- end col -->

                </div> 


            </div>
        </div>
        
    </div> <!-- container-fluid -->
@endsection
@section('js')
 @parent
    
 <script src="{{asset('assets/libs/moment/min/moment.min.js')}}"></script>
 <script src="{{asset('assets/libs/jquery-ui-dist/jquery-ui.min.js')}}"></script>
 <script src="{{asset('assets/libs/@fullcalendar/core/main.min.js')}}"></script>
 <script src="{{asset('assets/libs/@fullcalendar/bootstrap/main.min.js')}}"></script>
 <script src="{{asset('assets/libs/@fullcalendar/daygrid/main.min.js')}}"></script>
 <script src="{{asset('assets/libs/@fullcalendar/timegrid/main.min.js')}}"></script>
 <script src="{{asset('assets/libs/@fullcalendar/interaction/main.min.js')}}"></script>

 <!-- Calendar init -->
 <script src="{{asset('assets/js/pages/calendar.init.js')}}"></script>

 <script src="{{asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
 <script src="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
 <script src="{{asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
 <script src="{{asset('assets/libs/@chenfengyuan/datepicker/datepicker.min.js')}}"></script>

 <!-- init js -->
 <script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>

@endsection
