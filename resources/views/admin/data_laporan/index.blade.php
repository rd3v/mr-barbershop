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

      @if(session()->has('update'))
          <div class="alert alert-info">
              {{ session()->get('update') }}
          </div>
      @endif

      {{-- data laporan --}}
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6">
          <label for="tanggal_mulai">Tanggal Mulai</label>
          <input type="date" id="tanggal_mulai" class="form-control">
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
          <label for="tanggal_akhir">Tanggal Mulai</label>          
          <input type="date" id="tanggal_akhir" class="form-control">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
          <table class="table table-striped">
            <thead>            
              <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Jumlah Transaksi</th>
                <th>Pemasukan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="4" class="text-center">Silahkan pilih tanggal untuk melihat transaksi</td>
              </tr>
            </tbody>
          </table>
        </div>
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
@endsection

@section('script')
<script>
  $("li#data-laporan").addClass('active');
  
  var tanggal_mulai = null;
  var tanggal_akhir = null;

  $("#tanggal_mulai").change(function() {
    var tm = $(this);
    tanggal_mulai = tm.val();
    if((tanggal_mulai != null || tanggal_mulai != "") && (tanggal_akhir != null || tanggal_akhir != "")) {
      var tanggal = {
        tanggal_mulai:tanggal_mulai,
        tanggal_akhir:tanggal_akhir
      };
      getLaporan(tanggal);
    } 
  });
  $("#tanggal_akhir").change(function() {
    var ta = $(this);
    tanggal_akhir = ta.val();
    if((tanggal_mulai != null || tanggal_mulai != "") && (tanggal_akhir != null || tanggal_akhir != "")) {
      var tanggal = {
        tanggal_mulai:tanggal_mulai,
        tanggal_akhir:tanggal_akhir
      };
      getLaporan(tanggal);
    }
  });

  function getLaporan(tanggal = {}) {

    ajaxSetup();
    $.ajax({
      url:"{{ url('api/get_laporan') }}",
      type:"post",
      data: tanggal,
      dataType:"json"
    }).done(function(res) {
      if(res.response.data.laporan.transaksi.length > 0) {
        var tbody = "";
        for(var i = 0; i < res.response.data.laporan.transaksi.length; i++) {
          let tanggal = res.response.data.laporan.transaksi[i].tanggal.split("-");
          tbody += "<tr>";
          tbody += "<td>" + (i+1) + "</td>";
          tbody += "<td>" + tanggal[2] + " / " + tanggal[1] + " / " + tanggal[0] + "</td>";
          tbody += "<td>" + res.response.data.laporan.transaksi[i].jumlah_transaksi + "</td>";
          tbody += "<td>Rp" + (res.response.data.laporan.transaksi[i].total).replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1,") + "</td>";
          tbody += "</tr>";
        } 

      } else {
          tbody += "<tr>";
          tbody += "<td colspan='4' class='text-center'>Transaksi tidak di temukan!</td>";
          tbody += "</tr>";
      }
      
      $("tbody").html(tbody);

    }).fail(function(res) {
      console.log('Errors');
      console.log(res);
    });
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
