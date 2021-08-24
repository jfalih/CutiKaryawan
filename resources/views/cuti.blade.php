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
                    <div class="col-lg-12">
                        <form class="card" method="POST" enctype="multipart/form-data" action="{{route('cuti.add')}}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">                    
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
                                    </div>
                                </div>
                                    <div class="row">        
                                        <div class="col-lg-12">
                                            <div class="mb-3 row">
                                                <label class="form-label">Kategori Cuti</label>
                                                <div class="col-md-12">
                                                    <select name="category" id="category" class="form-select">
                                                        <option value="0">Pilih Kategori</option>
                                                        @foreach($categories as $val)
                                                        <option value="{{$val->id}}">{{$val->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="isi"></div>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-danger" type="reset">Reset Form</button>
                                <button class="btn btn-primary" type="submit">Ajukan Cuti</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Keterangan</h4>
                                <h6 class="card-text font-14 text-muted">Berikut keterangan warna yang ada dikalender.</h6>
                                <div class="alert alert-border alert-border-warning alert-dismissible fade show" role="alert">
                                    <i class="fas fa-circle font-size-16 text-warning me-2"></i>
                                    Kuning - Cuti belum dikonfirmasi staff hrd.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>
                                <div class="alert alert-border alert-border-danger alert-dismissible fade show" role="alert">
                                    <i class="fas fa-circle font-size-16 text-danger me-2"></i>
                                    Merah - Cuti ditolak staff hrd.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>
                                <div class="alert alert-border alert-border-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-circle font-size-16 text-success me-2"></i>
                                    Hijau - Cuti dikonfirmasi staff hrd.
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

 <script>
     $(document).ready(function(){
    var sites = {!! json_encode($cuti->toArray()) !!};
    var baru = [];
    for(var i = 0; i < sites.length; i++){
        var nameClass;
        switch (sites[i].status) {
            case 'pending':
                nameClass = 'bg-warning';
                break;
            case 'cancel':
                nameClass = 'bg-danger';
                break;
            case 'success':
                nameClass = 'bg-success';
                break;
            case 'confirmed':
                nameClass = 'bg-info';
                break;
        }
        baru.push({
            title: sites[i].user.name,
            allDay : true,
            start : new Date(sites[i].from),
            end : new Date(sites[i].to),
            className: nameClass 
        });
    }
    
    console.log('inibaru',baru);
    !(function (g) {
    "use strict";
    function e() {}
    (e.prototype.init = function () {
        var l = g("#event-modal"),
            t = g("#modal-title"),
            a = g("#form-event"),
            i = null,
            r = null,
            s = document.getElementsByClassName("needs-validation"),
            i = null,
            r = null,
            e = new Date(),
            n = e.getDate(),
            d = e.getMonth(),
            o = e.getFullYear();
        var c = baru, v = (document.getElementById("calendar")); 
        function u(e) {
            l.modal("show"), a.removeClass("was-validated"), a[0].reset(), g("#event-title").val(), g("#event-category").val(), t.text("Add Event"), (r = e);
        }
        var m = new FullCalendar.Calendar(v, {
            plugins: ["bootstrap", "interaction", "dayGrid", "timeGrid"],
            editable: !1,
            droppable: !0,
            selectable: !0,
            defaultView: "dayGridMonth",
            themeSystem: "bootstrap",
            header: { left: "prev,next today", center: "title"},
            
            events: c,
        });
        m.render();
    }),
        (g.CalendarPage = new e()),
        (g.CalendarPage.Constructor = e);
})(window.jQuery),
    (function () {
        "use strict";
        window.jQuery.CalendarPage.init();
    })();
})
    
 </script>
 <!-- Calendar init -->

 <script src="{{asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
 <script src="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
 <script src="{{asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
 <script src="{{asset('assets/libs/@chenfengyuan/datepicker/datepicker.min.js')}}"></script>

 <!-- init js -->
 <script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>
 <script type="text/javascript">
    $(document).ready(function () {    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#category').on('change',function() {
            var cat_id = this.value;
            $.ajax({
                url:"{{ route('category') }}",
                type:"POST",
                data: {
                    cat_id: cat_id
                },
                success:function (data) {
                    $('#isi').html(data);
                }
            })
        });
    });
 </script>
@endsection
