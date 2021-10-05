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
        <form role="form" class="p-a-md col-md-6">
          <div class="form-group">
            <label>Foto Profile</label>
            <div class="form-file">
              <input type="file">
              <button class="btn white">Upload foto</button>
            </div>
          </div>
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Lokasi</label>
            <input type="text" class="form-control">
          </div>

          <button type="submit" class="btn btn-info m-t">Update</button>
        </form>


      </div>

      <div class="tab-pane" id="tab-5">
        <div class="p-a-md dker _600">Keamanan</div>
        <div class="p-a-md">
          <div class="clearfix m-b-lg">
            <form role="form" class="col-md-6 p-a-0" method="post" action="">
              <div class="form-group">
                <label>Password Lama</label>
                <input type="password" class="form-control">
              </div>
              <div class="form-group">
                <label>Password Baru</label>
                <input type="password" class="form-control">
              </div>
              <div class="form-group">
                <label>Password Baru Lagi</label>
                <input type="password" class="form-control">
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
  </script>
@endsection

@section('script')

@endsection