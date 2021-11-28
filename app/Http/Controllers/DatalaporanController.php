<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\DataBookingTempat;

class DatalaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return view('admin.data_laporan.index', compact('rata_rata_pelanggan_datang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
