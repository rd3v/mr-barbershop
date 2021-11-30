<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DataBookingTempat;
use App\Models\DataBookingRumah;
use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        $jumlah_user = User::where('level', 'pelanggan')->count();
        $jumlah_booking_di_tempat = DataBookingTempat::count();

        $dbk = DataBookingTempat::where('status','!=',2)->count();
        $dbr = DataBookingRumah::where('status_booking',null)->count();
        $selesai = $dbk + $dbr;

        $data = [
            'jumlah_user' => $jumlah_user,
            'antrian_di_tempat' => $dbk,
            'antrian_ke_rumah' => $dbr,
            'selesai' => $selesai
        ];
        return view('admin.dashboard', ['data' => $data]);
    }

    public function profile() {
        return view('admin.profile');
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
