@extends('layouts.app')

@section('title')
  My Booking
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
      <h2 style="display:inline"><b>My Booking</b></h2>&nbsp;
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

          <div class="b-b b-primary nav-active-primary">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="" data-toggle="tab" data-target="#tab_booking_di_tempat">Booking di Tempat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" data-toggle="tab" data-target="#tab_booking_ke_rumah">Booking di Rumah</a>
            </li>
          </ul>
        </div>
        <div class="tab-content p-a m-b-md">
          <div class="tab-pane animated fadeIn text-muted active" id="tab_booking_di_tempat">

            <a href="{{ url('/data-booking/tambah/tempat') }}" class="btn btn-success btn-md" style="color: white; margin: 10px">+Tambah Booking</a>
        
            <div class="table-responsive">
              
              <table ui-jp="dataTable" class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Layanan</th>
                    <th>Total Bayar</th>
                    <th>Waktu Booking</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <?php
                  $count = count($data['booking_tempat']);
                ?>
                <tbody class="<?php if($count == 0) echo 'text-center'; ?>">
                  @if($count > 0)
                    @foreach($data['booking_tempat'] as $key => $value)
                      @php
                        $jenis_layanan = "";
                        
                        $total_bayar = 0;
                        
                        $tanggal_temp = explode(' ', $value->created_at);
                        $tanggal_temp_date_only = explode('-', $tanggal_temp[0]);
                        $tanggal = $tanggal_temp_date_only[2]."-".$tanggal_temp_date_only[1]."-".$tanggal_temp_date_only[0];

                        $waktu = $tanggal_temp[1];

                      @endphp
                      @foreach($value->data_transaksi_layanan as $key2 => $transaksi_layanan)
                        @php
                          $total_bayar += $transaksi_layanan->layanan->harga_layanan;
                          $jenis_layanan .= $transaksi_layanan->layanan->jenis_layanan." - <b>Rp".number_format($transaksi_layanan->layanan->harga_layanan)."</b>";
                        @endphp
                          @if (($key2 + 1) != count($value->data_transaksi_layanan))
                            @php
                              $jenis_layanan .= ",<br> ";
                            @endphp
                          @endif
                      @endforeach

                      <tr>
                        <td>{{ ($key+1) }}</td>
                        <td>{!! $jenis_layanan !!}</td>
                        <td><b>Rp{{ number_format($total_bayar) }}</b></td>
                        <td>{{ $tanggal." ".$waktu }}</td>
                        <td>
                        @if($value->status == 0)
                          Dalam Antrian
                        @elseif($value->status == 1)
                          On Service
                        @elseif($value->status == 2)
                          Selesai
                        @endif
                        </td>
                        <td>

                        @if($value->status_booking == null or $value->status_booking == '')
                          <button data-booking="tempat" class="btn btn-danger btn-sm btn-batal" title="Batalkan Booking" data-id="{{ $value->id }}"><i class="fa fa-remove"></i></button>
                        @endif

                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>

            </div>

          </div>
          <div class="tab-pane animated fadeIn text-muted" id="tab_booking_ke_rumah">

            <a href="{{ url('/data-booking/tambah/rumah') }}" class="btn btn-success btn-md" style="color: white;margin: 10px">+Tambah Booking</a>    

            <div class="table-responsive">      
            
            
              <table ui-jp="dataTable" class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Layanan</th>
                    <th>Jumlah Orang</th>
                    <th>Total Bayar</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Peta</th>
                    <th>No. Antrian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <?php
                  $count = count($data['booking_rumah']);
                ?>
                <tbody class="<?php if($count == 0) echo 'text-center'; ?>">
                  @if($count > 0)
                    @foreach($data['booking_rumah'] as $key => $value)
                      <tr>
                        <td>{{ ($key+1) }}</td>
                        <td>{{ $value->layanan->jenis_layanan }} - Rp{{ number_format($value->layanan->harga_layanan) }}</td>
                        <td>{{ $value->jumlah_orang }}</td>
                        <td>Rp{{ number_format($value->layanan->harga_layanan * $value->jumlah_orang) }}</td>
                        <td>{{ $value->alamat }}</td>
                        <td>{{ $value->pelanggan->no_hp }}</td>
                        <td><a class="btn btn-sm btn-primary" href="https://maps.google.com?q={{$value->lat}},{{$value->lng}}" target="_blank"><i class="material-icons">map</i> Open Map</a></td>
                        <td>{{ $value->no_antrian }}</td>                        
                        <td>
                          @if($value->status_booking == null or $value->status_booking == '')
                          Menunggu Konfirmasi
                          @else
                          {{ strtoupper($value->status_booking) }}
                          @endif
                        </td>
                        <td>

                        @if($value->status_booking == null or $value->status_booking == '')
                          <button data-booking="rumah" class="btn btn-danger btn-sm btn-batal" title="Batalkan Booking" data-id="{{ $value->id }}"><i class="fa fa-remove"></i></button>
                        @endif

                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
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

  $(".btn-batal").click(function() {
    
    var id = $(this).data('id');
    var booking = $(this).data('booking');
    if(!confirm('Batalkan booking ini ?')) return false;

      $('#hapus_form').attr('action', "/data-booking/delete/" + booking + "/" + id).submit();

  });
</script>
@endsection