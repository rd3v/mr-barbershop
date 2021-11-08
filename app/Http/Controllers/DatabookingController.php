<?php

namespace App\Http\Controllers;

use App\Models\DataBookingTempat;
use App\Models\DataBookingRumah;
use App\Models\DataLayanan;
use App\Models\DataTransaksiLayanan;

use Illuminate\Http\Request;

class DatabookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_booking_tempat = DataBookingTempat::with('data_transaksi_layanan')->orderBy('id','desc')->get();
        $data_booking_rumah = DataBookingRumah::orderBy('id','desc')->get();

        return view('admin.data_booking.index', [
            'data' => [
                'booking_rumah' => $data_booking_rumah,
                'booking_tempat' => $data_booking_tempat,
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($kode)
    {

        $data_layanan = DataLayanan::select('id','jenis_layanan','harga_layanan')->get();

        switch ($kode) {
            case 'tempat':
                $view = 'admin.data_booking.add_booking_tempat';
                break;
            case 'rumah':
                $view = 'admin.data_booking.add_booking_rumah';
                break;
            default:
                $view = 'admin.data_booking.add_booking_tempat';
                break;
        }
        return view($view, [
            'data' => ['layanan' => $data_layanan]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        switch($request->booking) {
            case 'tempat':
                $booking = new DataBookingTempat;
                if ($request->member == 1) {
                    $booking->users_id = $request->users_id;

                } else if($request->member == 0) {
                    $booking->nama = $request->nama;
                    $booking->no_hp = $request->no_hp;
                    $booking->alamat = $request->alamat;
                }

                $booking->status = 0;
                $booking->waktu_tunggu = date('H:i:s', strtotime('now'));
                $booking->member = $request->member;

                if ($booking->save()) {

                    $data_layanan_transaksi_data = [];
                    for ($i=0; $i < count($request->layanan_id); $i++) { 

                        $data_layanan_transaksi_data[] = [
                            'booking_di_tempat_id' => $booking->id,
                            'layanan_id' => $request->layanan_id[$i]
                        ];

                    }

                    DataTransaksiLayanan::insert($data_layanan_transaksi_data);

                    $message = "Booking di tempat atas nama ".ucwords($request->nama)." telah di tambahkan!";
                    return redirect('/data-booking')->with(['success' => $message]);
                 } else {
                    $message = "Gagal menambahkan Booking di Tempat";
                    return back()->with(['errors' => $message]);
                 }

            break;
            case 'rumah':

            break;
            default:

            break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataBooking  $dataBooking
     * @return \Illuminate\Http\Response
     */
    public function show(DataBooking $dataBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataBooking  $dataBooking
     * @return \Illuminate\Http\Response
     */
    public function edit($booking, $id)
    {
        switch($booking) {
            case 'tempat':
                $data_booking = DataBookingTempat::find($id);
                $view = 'admin.data_booking.edit_booking_tempat';
            break;
            case 'rumah':
                $data_booking = DataBookingRumah::find($id);
                $view = 'admin.data_booking.edit_booking_rumah';
            break;
        }
        return view($view, compact('data_booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataBooking  $dataBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataBooking $dataBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataBooking  $dataBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy($booking, $id)
    {
        if ($booking == "tempat") {
            $booking_tempat = DataBookingTempat::find($id);
            $booking_tempat->delete();

            $data_transaksi_layanan = DataTransaksiLayanan::where('booking_di_tempat_id',$booking_tempat->id)->delete();

            return back();
        } else if($booking == "rumah") {
            $booking_rumah = DataBookingRumah::find($id);
            $booking_rumah->delete();
            return back();
        }
    }
}
