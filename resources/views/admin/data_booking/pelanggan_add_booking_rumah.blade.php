@extends('layouts.app')

@section('title')
  Booking ke Rumah
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
  <style type="text/css">
    #map{ width:100%; height: 480px; }
  </style>
@endsection

@section('style')

@endsection

@section('content')
<div class="padding">
    
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
          

  <div class="box">
    <div class="box-header">
      <h2 style="display:inline"><b>Booking ke Rumah</b></h2>
    </div>


    <div class="box-divider m-a-0"></div>
        <div class="box-body">
          <form role="form" action="{{ url('/data-booking/store') }}" method="post">
            @csrf

            <input type="hidden" name="booking" value="rumah">

            <div class="form-group row">
              <label for="jenis_layanan" class="col-sm-2 form-control-label">Jenis Layanan</label>
              <div class="col-sm-10">
                  <select name="layanan_id" id="layanan_id" class="form-control" required>
                  <option value="{{ $data['layanan']->id }}">{{ ucwords($data['layanan']->jenis_layanan) }} - Rp{{ number_format($data['layanan']->harga_layanan) }}</option>                    
                  </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="jumlah_orang" class="col-sm-2 form-control-label">Jumlah Orang</label>
              <div class="col-sm-10">
                <input type="number" name="jumlah_orang" class="form-control" id="jumlah_orang" placeholder="Masukkan Jumlah Orang" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="nama" class="col-sm-2 form-control-label">Nama Pemesan</label>
              <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama" value="{{ Auth::user()->name }}" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="no_hp" class="col-sm-2 form-control-label">No. HP</label>
              <div class="col-sm-10">
                <input type="number" name="no_hp" class="form-control" id="no_hp" value="{{ Auth::user()->no_hp }}" placeholder="Masukkan Nomor HP">
              </div>
            </div>

            <div class="form-group row">
              <label for="alamat" class="col-sm-2 form-control-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat" required>
              </div>
            </div>

            <div class="form-group row">
              <label for="lokasi" class="col-sm-2 form-control-label">Pilih Lokasi</label>
              <div class="col-sm-10">              
                
                <div id="map"></div>

                <br>

                <input style="margin-bottom: 5px" type="text" id="onIdlePositionView" class="form-control" readonly="yes">
                <input type="hidden" name="lat" id="lat">
                <input type="hidden" name="lng" id="lng">

               </div>
             </div>

            <div class="form-group row">
              <label for="kapster_id" class="col-sm-2 form-control-label">Kapster</label>
              <div class="col-sm-10">
                <select name="kapster_id" id="kapster_id" class="form-control" onchange="get_member(this.value)" required>
                  <option value="">== Pilih ==</option>
                  @foreach($data['kapster'] as $value)
                    <option value="{{ $value->id }}">{{ ucwords($value->name) }}</option>
                  @endforeach

                </select>
              </div>
            </div>

            <div class="form-group row m-t-md">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn success">Tambah</button>
                <a href="{{ url('/data-booking') }}" type="button" class="btn danger">Batal</a>
              </div>
            </div>
          </form>
        </div>
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
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFbCMlSFpcX4hcL2M1nt_x6GotUW-qxG0"></script>
  <script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>

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
  $(document).ready(function() {
    $("li#data-booking").addClass('active');

  // Get element references
    var onClickPositionView = document.getElementById('onClickPositionView');
    var onIdlePositionView = document.getElementById('onIdlePositionView');
    var lat = document.getElementById('lat');
    var lng = document.getElementById('lng');

    // Initialize locationPicker plugin
    var lp = new locationPicker('map', {
      setCurrentPosition: true, // You can omit this, defaults to true
    }, {
      zoom: 15 // You can set any google map options here, zoom defaults to 15
    });

    // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
    google.maps.event.addListener(lp.map, 'idle', function (event) {
      // Get current location and show it in HTML
      var location = lp.getMarkerPosition();
      onIdlePositionView.value = 'Posisi yang dipilih adalah ' + location.lat + ',' + location.lng;

      lat.value = location.lat;
      lng.value = location.lng;
    });    

  });


  function get_member(member) {
    if (member == 1) {
      ajaxSetup();
      $.ajax({
        url:"{{ url('get-member') }}",
        type:"post",
        data:{},
        dataType:"json"
      }).done(function(res) {
        console.log(res);
      }).fail(function(res) {
        console.log(res);
      });
    } else if(member == 0) {
      console.log('Non Member');
    }
  }

  function ajaxSetup() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });     
  }      

</script>
@endsection