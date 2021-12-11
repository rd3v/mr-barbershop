@extends('layouts.app')

@section('title')
  Edit Booking di Tempat | Edit
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
      <h2 style="display:inline"><b>Edit Data Booking di Tempat</b></h2>
    </div>


      <div class="box-divider m-a-0"></div>
        <div class="box-body">
          <form role="form" action="{{ route('update-data-booking',['id' => $data_booking->id]) }}" method="post">
            @csrf
            @method('PUT')

            <input type="hidden" name="booking" value="tempat">

            <div class="form-group row">
              <label for="jenis_layanan" class="col-sm-2 form-control-label">Jenis Layanan</label>
              <div class="col-sm-10">
                  <small style="color: red">*abaikan jika tidak ada pengurangan atau penambahan layanan</small>
                  <select name="layanan_id[]" id="layanan_id" class="form-control" size="8">
                    @foreach($layanan as $value)
                      <option value="{{ $value->id }}">{{ $value->jenis_layanan }} (Rp{{ number_format($value->harga_layanan) }})</option>
                    @endforeach                    
                  </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="nama" class="col-sm-2 form-control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama" value="{{ $data_booking->nama }}" required readonly>
              </div>
            </div>

            <div class="form-group row">
              <label for="no_hp" class="col-sm-2 form-control-label">No. HP</label>
              <div class="col-sm-10">
                <input type="number" name="no_hp" class="form-control" id="no_hp" value="{{ $data_booking->no_hp }}" placeholder="Masukkan Nomor HP" required readonly>
              </div>
            </div>

            <div class="form-group row">
              <label for="status" class="col-sm-2 form-control-label">Status</label>
              <div class="col-sm-10">
                  <select name="status" id="status" class="form-control" required>
                    <option value="0" {{ ($data_booking->status == 0 ? 'selected':'') }}>Dalam Antrian</option>
                    <option value="1" {{ ($data_booking->status == 1 ? 'selected':'') }}>On Service</option>
                    <option value="2" {{ ($data_booking->status == 2 ? 'selected':'') }}>Selesai</option>
                  </select>
              </div>
            </div>

            <div class="form-group row m-t-md">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn primary">Update</button>
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
</script>
@endsection