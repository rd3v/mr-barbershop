@extends('layouts.app')

@section('title')
  List Booking Pelanggan
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
    
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
          

  <div class="box">
    <div class="box-header">
      <h2 style="display:inline"><b>List Data Booking</b></h2>
    </div>
    <br>
    <div class="table-responsive">

      @if(session()->has('errors'))
          <div class="alert alert-danger">
              {{ session()->get('errors') }}
          </div>
      @endif

      @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
      @endif

      @if(session()->has('update'))
          <div class="alert alert-info">
              {{ session()->get('update') }}
          </div>
      @endif

      <div class="col-sm-12 col-md-12 col-lg-12">

        {{-- booking ke rumah --}}

        <div style="padding: 1em">
            
            <div class="alert" style="background-color: #E0E0E0">
              <h5>No.1</h5>
              <h4 class="text-center"><u>Konfirmasi Booking</u></h4>
              <br>
              <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <table class="table table-striped">
                    <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td>Fikratullah Nugraha</td>
                    </tr>
                    <tr>
                      <td>No. HP</td>
                      <td>:</td>
                      <td>081222333444</td>
                    </tr>
                    <tr>
                      <td>Gender</td>
                      <td>:</td>
                      <td>Pria</td>
                    </tr>
                    <tr>
                      <td>Pelayanan</td>
                      <td>:</td>
                      <td>1. Hair Cut<br>2. Creambath</td>
                    </tr>
                  </table>

                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 text-center">
                  <h4>No. Antrian</h4>
                  <div class="alert" style="background-color: grey; padding: 10px">
                    <p style="font-size: 5em">4</p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                    <h3 style="font-weight: bolder">Total : Rp{{ number_format(100000) }}</h3>
                  </div>
                </div>

                <br>

                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                    <button class="btn btn-success btn-accept">Terima</button> | 
                    <button class="btn btn-danger btn-denied">Tolak</button>
                  </div>
                </div>


              </div>
            </div>

        </div>


      </div>

    </div>
  </div>


        </div>
    </div>

  <form id="hapus_form" action="" method="POST">
      @method('DELETE')
      @csrf
  </form>

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
  $("li#data-booking").addClass('active');

  $(".btn-accept").click(() => {

    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var booking = $(this).data('booking');
    if(!confirm('Terima Booking Pelanggan ' + nama)) return false;

      alert('Booking di terima');

  });

  $(".btn-denied").click(function() {

    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var booking = $(this).data('booking');
    if(!confirm('Tolak Booking Pelanggan ' + nama)) return false;

      alert('Booking di tolak');
      
      $('#hapus_form').attr('action', "/data-booking/delete/" + booking + "/" + id).submit();

  });
</script>
@endsection