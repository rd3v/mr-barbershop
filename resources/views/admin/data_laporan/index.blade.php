@extends('layouts.app')

@section('title')
  Data Laporan
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
      <h2 style="display:inline"><b>Data Laporan</b></h2>
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

      {{-- data laporan --}}
      <div class="table-responsive">      
        <table class="table table-striped">
          <tr>
            <th class="text-center" colspan="7">{{ strtoupper("Laporan Berdasarkan Metode Waiting Line")}}</th>
          </tr>
          <tr>
            <th colspan="2"><p>Perkiraan Jam Sibuk di Mr. Barber</p></th>
            <td colspan="2"><p>16.00 - 17.00 dan 19.00 - 20.00</p></td>
            <td colspan="3"></td>
          </tr>
          <tr>
            <th colspan="2"><p>Tanggal tersibuk</p></th>
            <td colspan="2">
              @php
                $temp_tgl = explode("-", $rata_rata_pelanggan_datang['tanggal']);
                $tanggal = $temp_tgl[2]." / ".$temp_tgl[1]." / ".$temp_tgl[0];
              @endphp
              <p>{{ $tanggal }}, <b>Jumlah</b> {{ $rata_rata_pelanggan_datang['jumlah'] }} Orang</p>
            </td>
            <td colspan="3"></td>
          </tr>
          <tr>
            <td colspan="2">Jam 16.00 - 17.00</td>
            <td colspan="2"><input placeholder="Input Jumlah Pelanggan" type="text" class="form-control" id="jam_empat_lima_sore"></td>
            <td colspan="3"></td>
          </tr>
          <tr>
            <td colspan="2">Jam 19.00 - 20.00</td>
            <td colspan="2"><input placeholder="Input Jumlah Pelanggan" type="text" class="form-control" id="jam_tujuh_delapan_malam"></td>
            <td colspan="3"></td>
          </tr>
          <tr>
            <td colspan="2">Rata - rata pelanggan yang datang</td>
            <td colspan="2"><input readonly type="number" id="rata_rata" class="form-control"></td>
            <td colspan="3">Average()</td>
          </tr>
          <tr><td colspan="7"></td></tr>
          <tr>
            <th>Parameter</th>
            <th>Nilai</th>
            <th></th>
            <th>Parameter</th>
            <th>Nilai</th>
            <th>Menit</th>
            <th>Detik</th>
          </tr>
          <tr>
            <td>M/M/s</td>
            <td></td>
            <td></td>
            <td>Tingkat intensitas fasilitas pelayanan <b>(P)</b></td>
            <td><span id="p">0</span></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>λ (jumlah rata-rata tingkat kedatangan )</td>
            <td><span id="jumlah_rata_rata_tingkat_kedatangan"></span></td>
            <td></td>
            <td>Jumlah kedatangan pelanggan yang diharapkan menunggu dalam Waiting Line <b>(Lq)</b></td>
            <td><span id="lq">0</span></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>µ (melayani rata-rata pelanggan )</td>
            <td><input type="number" class="form-control" id="melayani_rata_rata_pelanggan" value="0"></td>
            <td></td>
            <td>Jumlah rata-rata kedatangan pelanggan yang diharapkan dalam sistem <b>(L)</b></td>
            <td><span id="l">0</span></td>
            <td><span id="l_menit">0</span></td>
            <td><span id="l_detik">0</span></td>
          </tr>
          <tr>
            <td>s (jumlah fasilitas pelayanan (server))</td>
            <td><input type="number" class="form-control" id="jumlah_fasilitas_pelayanan" value="0"></td>
            <td></td>
            <td>Waktu yang diharapkan oleh setiap kedatangan pelanggan untuk menunggu dalam Waiting Line <b>(Wq)</b></td>
            <td><span id="wq">0</span></td>
            <td><span id="wq_menit">0</span></td>
            <td><span id="wq_detik">0</span></td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td>Waktu yang diharapkan oleh setiap kedatangan pelanggan selama dalam sistem / menunggu dalam pelayanan <b>(W)</b></td>
            <td><span id="w">0</span></td>
            <td><span id="w_menit">0</span></td>
            <td><span id="w_detik">0</span></td>
          </tr>
        </table>
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
  $("li#data-laporan").addClass('active');

  $("#jam_empat_lima_sore").on('input', function() {
    var nilai = parseInt($(this).val());
    var nilai2 = parseInt($("#jam_tujuh_delapan_malam").val());
    var hasil = (nilai + nilai2) / 2;
    $("input#rata_rata").val(hasil);
    $("#jumlah_rata_rata_tingkat_kedatangan").html(Math.round(hasil));
  });

  var hasil = 0
  $("#jam_tujuh_delapan_malam").on('input', function() {
    var nilai = parseInt($(this).val());
    var nilai2 = parseInt($("#jam_empat_lima_sore").val());
    hasil = (nilai + nilai2) / 2;
    $("input#rata_rata").val(hasil);
    $("#jumlah_rata_rata_tingkat_kedatangan").html(Math.round(hasil));
  });

  $("input#melayani_rata_rata_pelanggan").on('input', function() {
    var nilai = parseInt($(this).val());
    var tingkat_intensitas_fasilitas_pelayanan = (nilai / hasil).toFixed(2);

    $("span#p").html(tingkat_intensitas_fasilitas_pelayanan);
    
    var jumlah_rata_rata_tingkat_kedatangan = parseInt($("input#jumlah_rata_rata_tingkat_kedatangan").val());
    var melayani_rata_rata_pelanggan = parseInt($("input#melayani_rata_rata_pelanggan").val());

    var lq = ((hasil ^ 2) / melayani_rata_rata_pelanggan * (melayani_rata_rata_pelanggan - hasil)).toFixed(0);
    $("span#lq").html(lq);

    var l = parseInt(tingkat_intensitas_fasilitas_pelayanan + lq);
    $("span#l").html(l);


  });

</script>
@endsection
