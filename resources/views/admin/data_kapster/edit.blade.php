@extends('layouts.app')

@section('title')
  Data Kapster | Edit
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
      <h2 style="display:inline"><b>Edit Data Kapster</b></h2>
    </div>


<div class="box-divider m-a-0"></div>
        <div class="box-body">
          <form role="form" action="{{ route('update-data-kapster',['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    <ul>
                      <li>{{ session('error') }}</li>
                    </ul>
                </div>
            @endif

            <div class="form-group row">
              <label for="foto" class="col-sm-2 form-control-label">Foto</label>
              <div class="col-sm-10">
                <input type="file" name="foto" class="form-control" id="foto">
                <br>
                <center>
                    <img src="{{ ('/assets/img/kapster/'.$data->foto) }}" alt="Gambar" id="image" width="25%">
                </center>                
              </div>
            </div>


            <div class="form-group row">
              <label for="inputName" class="col-sm-2 form-control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="inputName" placeholder="Masukkan Nama" required="" value="{{ $data->name }}">
              </div>
            </div>

            <div class="form-group row">
              <label for="username" class="col-sm-2 form-control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan Username" required value="{{ $data->username }}">
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-sm-2 form-control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email" required value="{{ $data->email }}">
              </div>
            </div>

            <div class="form-group row">
              <label for="no_hp" class="col-sm-2 form-control-label">No. HP</label>
              <div class="col-sm-10">
                <input type="number" name="no_hp" class="form-control" id="no_hp" placeholder="Masukkan Nomor HP" required value="{{ $data->no_hp }}">
              </div>
            </div>

            <div class="form-group row">
              <label for="alamat" class="col-sm-2 form-control-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat" required value="{{ $data->alamat }}">
              </div>
            </div>

            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 form-control-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                <select class="form-control c-select" name="jenis_kelamin" required>
                  <option value="laki - laki" {{ $data->jenis_kelamin == 'laki - laki' ? 'selected':'' }}>Laki - laki</option>
                  <option value="perempuan" {{ $data->jenis_kelamin == 'perempuan' ? 'selected':'' }}>Perempuan</option>
                </select>
              </div>
            </div>

            <div class="form-group row m-t-md">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn primary">Update</button>
                <a href="{{ url('/data-kapster') }}" type="button" class="btn danger">Batal</a>
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
  $("li#data-kapster").addClass('active');

    document.getElementById("foto").onchange = function () {
        var reader = new FileReader();

        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            document.getElementById("image").style.display = '';
            document.getElementById("image").src = e.target.result;
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    };
  
</script>
@endsection