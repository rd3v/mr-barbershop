<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DataBookingTempat;
use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        $jumlah_user = User::where('level', 'pelanggan')->count();
        $jumlah_booking_di_tempat = DataBookingTempat::count();

        $data = [
            'jumlah_user' => $jumlah_user,
            'jumlah_booking_di_tempat' => $jumlah_booking_di_tempat
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