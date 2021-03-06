@extends('layouts.app')

@section('title')
  Dashboard
@endsection

@section('css')

  <!-- style -->
  <link rel="stylesheet" href="{{ asset('themes/dashboard/v1/assets/animate.css/animate.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('themes/dashboard/v1/assets/glyphicons/glyphicons.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('themes/dashboard/v1/assets/font-awesome/css/font-awesome.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('themes/dashboard/v1/assets/material-design-icons/material-design-icons.css') }}" type="text/css" />

  <link rel="stylesheet" href="{{ asset('themes/dashboard/v1/assets/bootstrap/dist/css/bootstrap.min.css') }}" type="text/css" />

  <link rel="stylesheet" href="{{ asset('themes/dashboard/v1/assets/styles/app.css') }}" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="{{ asset('themes/dashboard/v1/assets/styles/font.css') }}" type="text/css" />

@endsection

@section('style')

@endsection

@section('content')
<div class="padding">
    <div class="margin">
        <h5 class="m-b-0 _300">Hi {{ ucfirst(Auth::user()->name) }}, welcome back</h5>
        <small class="text-muted">Bring your best service!</small>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="row">
              @if(Auth::user()->level == 'admin')
                <div class="col-xs-6">
                    <div class="box p-a">
                      <div class="pull-left m-r">
                        <i class="fa fa-group text-2x text-danger m-y-sm"></i>
                      </div>
                      <div class="clear">
                        <div class="text-muted">Pelanggan</div>
                        <h4 class="m-a-0 text-md _600"><a href="{{ url('/data-pelanggan') }}" style="cursor: pointer;">{{ $data['jumlah_user'] }}</a></h4>
                      </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="box p-a">
                      <div class="pull-left m-r">
                        <i class="fa fa-cut text-2x text-info m-y-sm"></i>
                      </div>
                      <div class="clear">
                        <div class="text-muted">Antrian di Tempat</div>
                        <h4 class="m-a-0 text-md _600"><a href>{{ $data['antrian_di_tempat'] }}</a></h4>
                      </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="box p-a">
                      <div class="pull-left m-r">
                    <i class="material-icons text-2x text-accent m-y-sm">&#xe0c8;
                      <!-- <span ui-include="{{ asset('themes/dashboard/v1/assets/images/i_0.svg') }}"></span> -->
                    </i>
                      </div>
                      <div class="clear">
                        <div class="text-muted">Antrian ke Rumah</div>
                        <h4 class="m-a-0 text-md _600"><a href>{{ $data['antrian_ke_rumah'] }}</a></h4>
                      </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="box p-a">
                      <div class="pull-left m-r">
                    <i class="material-icons text-2x text-success m-y-sm">&#xe636;
                      <!-- <span ui-include="{{ asset('themes/dashboard/v1/assets/images/i_0.svg') }}"></span> -->
                    </i>
                      </div>
                      <div class="clear">
                        <div class="text-muted">Selesai</div>
                        <h4 class="m-a-0 text-md _600"><a href="{{ url('/data-booking') }}" style="cursor: pointer;">{{ $data['selesai'] }}</a></h4>
                      </div>
                    </div>
                </div>
              @elseif(Auth::user()->level == 'kapster')
                <div class="col-xs-6">
                    <div class="box p-a">
                      <div class="pull-left m-r">
                        <i class="fa fa-group text-2x text-danger m-y-sm"></i>
                      </div>
                      <div class="clear">
                        <div class="text-muted">Orderan Menunggu</div>
                        <h4 class="m-a-0 text-md _600">{{ $data['orderan_menunggu'] }}</h4>
                      </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="box p-a">
                      <div class="pull-left m-r">
                        <i class="fa fa-ban text-2x text-info m-y-sm"></i>
                      </div>
                      <div class="clear">
                        <div class="text-muted">Orderan di Tolak</div>
                        <h4 class="m-a-0 text-md _600"><a href>{{ $data['orderan_di_tolak'] }}</a></h4>
                      </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="box p-a">
                      <div class="pull-left m-r">
                    <i class="fa fa-check text-2x text-accent m-y-sm">&#xe0c8;
                      <!-- <span ui-include="{{ asset('themes/dashboard/v1/assets/images/i_0.svg') }}"></span> -->
                    </i>
                      </div>
                      <div class="clear">
                        <div class="text-muted">Selesai</div>
                        <h4 class="m-a-0 text-md _600"><a href>{{ $data['selesai'] }}</a></h4>
                      </div>
                    </div>
                </div>
              @elseif(Auth::user()->level == 'pelanggan')
                <div class="col-xs-6">
                    <div class="box p-a">
                      <div class="pull-left m-r">
                        <i class="fa fa-user text-2x text-danger m-y-sm"></i>
                      </div>
                      <div class="clear">
                        <div class="text-muted">Jumlah Booking ke Rumah</div>
                        <h4 class="m-a-0 text-md _600">{{ $data['jumlah_booking_ke_rumah'] }}</h4>
                      </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="box p-a">
                      <div class="pull-left m-r">
                        <i class="fa fa-cut text-2x text-info m-y-sm"></i>
                      </div>
                      <div class="clear">
                        <div class="text-muted">Jumlah Booking di Tempat</div>
                        <h4 class="m-a-0 text-md _600"><a href>{{ $data['jumlah_booking_di_tempat'] }}</a></h4>
                      </div>
                    </div>
                </div>
              @endif

        <div class="col-sm-12 col-md-12 col-xl-12">
            
        </div>

            </div>
        </div>

    </div>

</div>
@endsection

@section('js')
<!-- build:js scripts/app.html.js -->
<!-- jQuery -->
  <script src="{{ asset('themes/dashboard/v1/libs/jquery/jquery/dist/jquery.js')}}"></script>
<!-- Bootstrap -->
  <script src="{{ asset('themes/dashboard/v1/libs/jquery/tether/dist/js/tether.min.js') }}"></script>
  <script src="{{ asset('themes/dashboard/v1/libs/jquery/bootstrap/dist/js/bootstrap.js') }}"></script>
<!-- core -->
  <script src="{{ asset('themes/dashboard/v1/libs/jquery/underscore/underscore-min.js') }}"></script>
  <script src="{{ asset('themes/dashboard/v1/libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js') }}"></script>
  <script src="{{ asset('themes/dashboard/v1/libs/jquery/PACE/pace.min.js') }}"></script>

  <script>
// lazyload config
var MODULE_CONFIG = {
    easyPieChart:   [ "{{ asset('themes/dashboard/v1/libs/jquery/jquery.easy-pie-chart/dist/jquery.easypiechart.fill.js')}}" ],
    sparkline:      [ "{{ asset('themes/dashboard/v1/libs/jquery/jquery.sparkline/dist/jquery.sparkline.retina.js') }}" ],
    plot:           [ "{{ asset('themes/dashboard/v1/libs/jquery/flot/jquery.flot.js') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/flot/jquery.flot.resize.js') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/flot/jquery.flot.pie.js') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/flot.tooltip/js/jquery.flot.tooltip.min.js') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/flot-spline/js/jquery.flot.spline.min.js') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/flot.orderbars/js/jquery.flot.orderBars.js') }}"],
    vectorMap:      [ "{{ asset('themes/dashboard/v1/libs/jquery/bower-jvectormap/jquery-jvectormap-1.2.2.min.js') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/bower-jvectormap/jquery-jvectormap.css') }}", 
                      "{{ asset('themes/dashboard/v1/libs/jquery/bower-jvectormap/jquery-jvectormap-world-mill-en.js') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/bower-jvectormap/jquery-jvectormap-us-aea-en.js') }}"],
    dataTable:      [
                      "{{ asset('themes/dashboard/v1/libs/jquery/datatables/media/js/jquery.dataTables.min.js') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/plugins/integration/bootstrap/3/dataTables.bootstrap.js') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}"],
    footable:       [
                      "{{ asset('themes/dashboard/v1/libs/jquery/footable/dist/footable.all.min.js') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/footable/css/footable.core.css') }}"
                    ],
    screenfull:     [
                      "{{ asset('themes/dashboard/v1/libs/jquery/screenfull/dist/screenfull.min.js') }}"
                    ],
    sortable:       [
                      "{{ asset('themes/dashboard/v1/libs/jquery/html.sortable/dist/html.sortable.min.js') }}"
                    ],
    nestable:       [
                      "{{ asset('themes/dashboard/v1/libs/jquery/nestable/jquery.nestable.css') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/nestable/jquery.nestable.js') }}"
                    ],
    summernote:     [
                      "{{ asset('themes/dashboard/v1/libs/jquery/summernote/dist/summernote.css') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/summernote/dist/summernote.js') }}"
                    ],
    parsley:        [
                      "{{ asset('themes/dashboard/v1/libs/jquery/parsleyjs/dist/parsley.css') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/parsleyjs/dist/parsley.min.js') }}"
                    ],
    select2:        [
                      "{{ asset('themes/dashboard/v1/libs/jquery/select2/dist/css/select2.min.css') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/select2-bootstrap-theme/dist/select2-bootstrap.min.css') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/select2-bootstrap-theme/dist/select2-bootstrap.4.css') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/select2/dist/js/select2.min.js') }}"
                    ],
    datetimepicker: [
                      "{{ asset('themes/dashboard/v1/libs/jquery/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.dark.css') }}",
                      "{{ asset('themes/dashboard/v1/libs/js/moment/moment.js') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"
                    ],
    chart:          [
                      "{{ asset('themes/dashboard/v1/libs/js/echarts/build/dist/echarts-all.js') }}",
                      "{{ asset('themes/dashboard/v1/libs/js/echarts/build/dist/theme.js') }}",
                      "{{ asset('themes/dashboard/v1/libs/js/echarts/build/dist/jquery.echarts.js') }}"
                    ],
    bootstrapWizard:[
                      "{{ asset('themes/dashboard/v1/libs/jquery/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"
                    ],
    fullCalendar:   [
                      "{{ asset('themes/dashboard/v1/libs/jquery/moment/moment.js') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/fullcalendar/dist/fullcalendar.min.js') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/fullcalendar/dist/fullcalendar.css') }}",
                      "{{ asset('themes/dashboard/v1/libs/jquery/fullcalendar/dist/fullcalendar.theme.css') 
                    }}",
                      "{{ asset('themes/dashboard/v1/scripts/plugins/calendar.js') }}"
                    ],
    dropzone:       [
                      "{{ asset('themes/dashboard/v1/libs/js/dropzone/dist/min/dropzone.min.js') }}",
                      "{{ asset('themes/dashboard/v1/libs/js/dropzone/dist/min/dropzone.min.css') }}"
                    ]
  };
    
  </script>

  <script src="{{ asset('themes/dashboard/v1/scripts/palette.js') }}"></script>
  <script src="{{ asset('themes/dashboard/v1/scripts/ui-load.js') }}"></script>
  <script src="{{ asset('themes/dashboard/v1/scripts/ui-jp.js') }}"></script>
  <script src="{{ asset('themes/dashboard/v1/scripts/ui-include.js') }}"></script>
  <script src="{{ asset('themes/dashboard/v1/scripts/ui-device.js') }}"></script>
  <script src="{{ asset('themes/dashboard/v1/scripts/ui-form.js') }}"></script>
  <script src="{{ asset('themes/dashboard/v1/scripts/ui-nav.js') }}"></script>
  <script src="{{ asset('themes/dashboard/v1/scripts/ui-scroll-to.js') }}"></script>
  <script src="{{ asset('themes/dashboard/v1/scripts/ui-toggle-class.js') }}"></script>

  <script src="{{ asset('themes/dashboard/v1/scripts/app.js') }}"></script>

  <!-- ajax -->
  <script src="{{ asset('themes/dashboard/v1/libs/jquery/jquery-pjax/jquery.pjax.js') }}"></script>
  <script src="{{ asset('themes/dashboard/v1/scripts/ajax.js') }}"></script>
<!-- endbuild -->
  <script>
    (function ($) {
      "use strict";
        
      uiLoad.load("{{ asset('themes/dashboard/v1/libs/jquery/screenfull/dist/screenfull.min.js') }}");
      $(document).on('click', '[ui-fullscreen]', function (e) {
        e.preventDefault();
        if (screenfull.enabled) {
          screenfull.toggle();
        }
      });

    })(jQuery);    
  </script>
@endsection

@section('script')
<script>
  $("li#dashboard").addClass('active');
</script>
@endsection