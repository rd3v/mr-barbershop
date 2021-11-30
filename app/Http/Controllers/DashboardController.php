<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DataBookingTempat;
use App\Models\DataBookingRumah;
use App\Models\User;

use Auth;

class DashboardController extends Controller
{

    public function index()
    {

        switch (Auth::user()->level) {
            case 'admin':
                $jumlah_user = User::where('level', 'pelanggan')->count();
                $jumlah_booking_di_tempat = DataBookingTempat::count();

                $dbk = DataBookingTempat::where('status','!=',2)->count();
                $dbr = DataBookingRumah::where('status_booking',null)->count();

                $dbks = DataBookingTempat::where('status',2)->count();
                $dbrs = DataBookingRumah::where('status_booking', 'selesai')->count();
                $selesai = $dbks + $dbrs;

                $data = [
                    'jumlah_user' => $jumlah_user,
                    'antrian_di_tempat' => $dbk,
                    'antrian_ke_rumah' => $dbr,
                    'selesai' => $selesai
                ];
                break;
            case 'kapster':

                $jumlah_booking_di_tempat = DataBookingTempat::count();

                $orderan_menunggu = DataBookingRumah::where('kapster', Auth::user()->id)->where('status_booking',null)->count();
                $orderan_di_tolak = DataBookingRumah::where('kapster', Auth::user()->id)->where('status_booking','tolak')->count();
                $selesai = DataBookingRumah::where('kapster', Auth::user()->id)->where('status_booking','selesai')->count();

                $data = [
                    'orderan_menunggu' => $orderan_menunggu,
                    'orderan_di_tolak' => $orderan_di_tolak,
                    'selesai' => $selesai
                ];
                break;
            case 'pelanggan':
                $jumlah_booking_ke_rumah = DataBookingRumah::where('users_id', Auth::user()->id)->count();
                $jumlah_booking_di_tempat = DataBookingTempat::where('users_id', Auth::user()->id)->count();

                $data = [
                    'jumlah_booking_ke_rumah' => $jumlah_booking_ke_rumah,
                    'jumlah_booking_di_tempat' => $jumlah_booking_di_tempat
                ];
                break;
            
            default:
                // code...
                break;
        }

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
