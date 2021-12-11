@extends('layouts.app')

@section('title')
  My Profile
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
              <h2 style="display:inline"><b>Profile</b></h2>
            </div>

            <div class="box-divider m-a-0"></div>
              <div class="box-body">

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

<div class="row-col">
  <div class="col-sm-3 col-lg-2">
    <div class="p-y">
      <div class="nav-active-border left b-primary">
        <ul class="nav nav-sm">
          <li class="nav-item">
            <a class="nav-link block active" href data-toggle="tab" data-target="#tab-1">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link block" href data-toggle="tab" data-target="#tab-5">Keamanan</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-sm-9 col-lg-10 lt bg-auto">
    <div class="tab-content pos-rlt" >
      <div class="tab-pane active" id="tab-1">
        
        <div class="p-a-md dker _600">Profile</div>
        <form method="post" role="form" class="p-a-md col-md-6" action="{{ route('update-data-kapster',['id' => $user->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group row">
              <label for="foto" class="col-sm-2 form-control-label">Foto</label>
              <div class="col-sm-10">
                <input type="file" name="foto" class="form-control" id="foto">
                <br>
                <center>
                    <img src="{{ ('/assets/img/kapster/'.$user->foto) }}" alt="Gambar" id="image" width="25%">
                </center>                
              </div>
            </div>


            <div class="form-group row">
              <label for="inputName" class="col-sm-2 form-control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="inputName" placeholder="Masukkan Nama" required="" value="{{ $user->name }}">
              </div>
            </div>

            <div class="form-group row">
              <label for="username" class="col-sm-2 form-control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan Username" required value="{{ $user->username }}">
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-sm-2 form-control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email" required value="{{ $user->email }}">
              </div>
            </div>

            <div class="form-group row">
              <label for="no_hp" class="col-sm-2 form-control-label">No. HP</label>
              <div class="col-sm-10">
                <input type="number" name="no_hp" class="form-control" id="no_hp" placeholder="Masukkan Nomor HP" required value="{{ $user->no_hp }}">
              </div>
            </div>

            <div class="form-group row">
              <label for="alamat" class="col-sm-2 form-control-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat" required value="{{ $user->alamat }}">
              </div>
            </div>

            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 form-control-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                <select class="form-control c-select" name="jenis_kelamin" required>
                  <option value="laki - laki" {{ $user->jenis_kelamin == 'laki - laki' ? 'selected':'' }}>Laki - laki</option>
                  <option value="perempuan" {{ $user->jenis_kelamin == 'perempuan' ? 'selected':'' }}>Perempuan</option>
                </select>
              </div>
            </div>


          <button type="submit" class="btn btn-info m-t">Update</button>
        </form>


      </div>

      <div class="tab-pane" id="tab-5">
        <div class="p-a-md dker _600">Keamanan</div>
        <div class="p-a-md">
          <div class="clearfix m-b-lg">
            <form role="form" class="col-md-6 p-a-0" method="post" action="{{ route('profile.update', Auth::user()->id) }}">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label>Password Lama</label>
                <input type="password" name="old_pwd" class="form-control">
              </div>
              <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="new_pwd" class="form-control">
              </div>
              <div class="form-group">
                <label>Password Baru Lagi</label>
                <input type="password" name="confirm_new_pwd" class="form-control">
              </div>
              <button type="submit" class="btn btn-info m-t">Update</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>


<!-- .modal -->
<div id="modal" class="modal fade animate black-overlay" data-backdrop="false">
  <div class="row-col h-v">
    <div class="row-cell v-m">
      <div class="modal-dialog modal-sm">
        <div class="modal-content flip-y">
          <div class="modal-body text-center">          
            <p class="p-y m-t"><i class="fa fa-remove text-warning fa-3x"></i></p>
            <p>Are you sure to delete your account?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn white p-x-md" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger p-x-md" data-dismiss="modal">Yes</button>
          </div>
        </div><!-- /.modal-content -->
      </div>
    </div>
  </div>
</div>
<!-- / .modal -->

<!-- ############ PAGE END-->

    </div>
  </div>
  <!-- / -->

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

@section('script')

@endsection