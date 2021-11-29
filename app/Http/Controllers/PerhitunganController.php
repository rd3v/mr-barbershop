<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\DataBookingTempat;

class PerhitunganController extends Controller
{
    public function index() {
        $rata_rata = DB::table('booking_di_tempat')
             ->select(DB::raw('count(id) as jumlah, date(created_at) as tanggal'))
             ->groupBy('tanggal')
             ->get();
             // dd($rata_rata_pelanggan_datang);
        $tanggal_tersibuk = "";
        $rata_rata_pelanggan_datang = [
            'jumlah' => 0,
            'tanggal' => ""
        ];
        foreach ($rata_rata as $key => $value) {
            if ($rata_rata_pelanggan_datang['jumlah'] < $value->jumlah) {
                $rata_rata_pelanggan_datang['jumlah'] = $value->jumlah;
                $rata_rata_pelanggan_datang['tanggal'] = $value->tanggal;
            }
        }
        return view('admin.data_perhitungan.index', compact('rata_rata_pelanggan_datang'));        
    }
}
