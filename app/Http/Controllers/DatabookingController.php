<?php

namespace App\Http\Controllers;

use App\Models\DataBookingTempat;
use App\Models\DataBookingRumah;
use App\Models\DataLayanan;
use App\Models\DataTransaksiLayanan;
use App\Models\User;

use App\Services\TelegramMessage;

use Illuminate\Http\Request;
use Auth;

class DatabookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $data_booking_tempat = null;
        $data_booking_rumah = null;

        switch (Auth::user()->level) {
            case 'admin':
                $data_booking_tempat = DataBookingTempat::with('data_transaksi_layanan')->orderBy('id','asc')->where('status', '!=', 2)->get();
                $data_booking_rumah = DataBookingRumah::with('pelanggan','layanan')->orderBy('id','desc')->get();            
                $view = 'admin.data_booking.index';
                break;
            case 'kapster':
                $view = 'admin.data_booking.kapster_index';
                $data_booking_rumah = DataBookingRumah::with('pelanggan','layanan')->where('kapster', Auth::user()->id)->orderBy('id', 'desc')->get();
                break;
            case 'pelanggan':
                $data_booking_tempat = DataBookingTempat::with('data_transaksi_layanan')->where('users_id', Auth::user()->id)->orderBy('id','desc')->get();
                $data_booking_rumah = DataBookingRumah::with('pelanggan','layanan')->where('users_id', Auth::user()->id)->orderBy('id','desc')->get();            
                $view = 'admin.data_booking.pelanggan_index';
                break;
            
            default:
                $view = 'admin.data_booking.index';
                break;
        }

        return view($view, [
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

        $level = Auth::user()->level;

        if ($level == 'admin') {

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

            $data_layanan = DataLayanan::select('id','jenis_layanan','harga_layanan')->get();
            $data = ['layanan' => $data_layanan];

        } else if($level == 'pelanggan') {

            switch ($kode) {
                case 'tempat':
                    $view = 'admin.data_booking.pelanggan_add_booking_tempat';
                    $data_layanan = DataLayanan::select('id','jenis_layanan','harga_layanan')->get();
                    $data = ['layanan' => $data_layanan];
                    break;
                case 'rumah':
                    $view = 'admin.data_booking.pelanggan_add_booking_rumah';
                    $data_layanan = DataLayanan::where('jenis_layanan','Potong Rambut')->first();
                    $kapster = User::where('level', 'kapster')->get();
                    $data = [
                        'layanan' => $data_layanan,
                        'kapster' => $kapster
                    ];
                    break;
                default:
                    $view = 'admin.data_booking.pelanggan_add_booking_tempat';
                    break;
            }

        }

        return view($view, [
            'data' => $data
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

                $level = Auth::user()->level;
                if ($level == 'pelanggan') {
                    $booking->users_id = Auth::user()->id;
                }

                $booking->nama = $request->nama;
                $booking->no_hp = $request->no_hp;
                $booking->alamat = $request->alamat;
                $booking->status = 0;

                if ($booking->save()) {

                    $data_layanan_transaksi_data = [];
                    for ($i=0; $i < count($request->layanan_id); $i++) { 

                        $data_layanan_transaksi_data[] = [
                            'booking_di_tempat_id' => $booking->id,
                            'layanan_id' => $request->layanan_id[$i]
                        ];

                    }
                                        
                    DataTransaksiLayanan::insert($data_layanan_transaksi_data);

                    if ($level == 'pelanggan') {
                        $message = "Booking di tempat berhasil, silahkan menuju ke Mr.Barber untuk mendapatkan layanan anda";
                    } else if($level == 'admin') {
                        $message = "Layanan di tempat atas nama ".ucwords($request->nama)." telah di tambahkan!";
                    }

                    return redirect('/data-booking')->with(['success' => $message]);
                 } else {
                    $message = "Gagal menambahkan Booking di Tempat";
                    return back()->with(['errors' => $message]);
                 }

            break;
            case 'rumah':
                $booking = new DataBookingRumah;
                $booking->users_id = Auth::user()->id;
                $booking->alamat = $request->alamat;
                $booking->layanan_id = $request->layanan_id;
                $booking->jumlah_orang = $request->jumlah_orang;
                $booking->kapster = $request->kapster_id;
                $booking->lat = $request->lat;
                $booking->lng = $request->lng;

                $no_antrian = DataBookingRumah::max('no_antrian');
                if ($no_antrian == null) {
                    $booking->no_antrian = 1;
                } else {
                    $booking->no_antrian = ($no_antrian + 1);
                }

                if ($booking->save()) {
                    $kapster = User::find($request->kapster_id);
                    $message = "Booking di rumah telah di tambahkan!. Silahkan menunggu konfirmasi dari kapster ".ucwords($kapster->name).", terima kasih ";

                    if ($kapster->telegram_chat_id != null and $kapster->telegram_chat_id != "") {

                        // kirim notifikasi ke Kapster dan Admin
                         $telegram_detail_booking = [
                            'chat_id' => $kapster->telegram_chat_id,
                            'text' => "Halo ".ucwords($kapster->name).",\nada booking ke rumah dengan detail sebagai berikut:\n\nNama Pemesan : ".ucwords(Auth::user()->name)."\nAlamat : ".ucwords($request->alamat)."\nJenis Layanan : ".ucwords($booking->layanan->jenis_layanan)."\nJumlah Orang : ".$request->jumlah_orang."\nNo.HP : ".$request->no_hp."\nTotal Bayar : Rp".number_format($booking->layanan->harga_layanan * $request->jumlah_orang)."\n\nSilahkan konfirmasi booking dengan cara klik atau copy & paste link ini di browser : ".url('/data-booking'),
                        ];
                        $telegram_detail_booking_location = [
                            'chat_id' => $kapster->telegram_chat_id,
                            'latitude' => $request->lat,
                            'longitude' => $request->lng,
                        ];

                        $admin = User::where('level', 'admin')->first();
                         $telegram_admin = [
                            'chat_id' => $admin->telegram_chat_id,
                            'text' => "Halo ".ucwords($kapster->name).",\nada booking ke rumah dengan detail sebagai berikut:\n\nNama Pemesan : ".ucwords(Auth::user()->name)."\nAlamat : ".ucwords($request->alamat)."\nJenis Layanan : ".ucwords($booking->layanan->jenis_layanan)."\nJumlah Orang : ".$request->jumlah_orang."\nNo.HP : ".$request->no_hp."\nTotal Bayar : Rp".number_format($booking->layanan->harga_layanan * $request->jumlah_orang)."\n\nSilahkan konfirmasi booking dengan cara klik atau copy & paste link ini di browser : ".url('/data-booking'),
                        ];
                        $telegram_detail_booking_location_admin = [
                            'chat_id' => $admin->telegram_chat_id,
                            'latitude' => $request->lat,
                            'longitude' => $request->lng,
                        ];

                        $telegramMessage = new TelegramMessage();

                        $telegramMessage->sendMessage($telegram_detail_booking);
                        $telegramMessage->sendLocation($telegram_detail_booking_location);

                        $telegramMessage->sendMessage($telegram_admin);
                        $telegramMessage->sendLocation($telegram_detail_booking_location_admin);
                    }

                    return redirect('/data-booking')->with(['success' => $message]);
                } else {
                    $message = "Gagal menambahkan data booking. Silahkan coba lagi atau kontak admin Mr.Barber, terima kasih";
                    return back()->with(['errors' => $message]);
                }

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

        $layanan = DataLayanan::select('id','jenis_layanan','harga_layanan')->get();        
        switch($booking) {
            case 'tempat':
                $data_booking = DataBookingTempat::with('data_transaksi_layanan')->find($id);
                $view = 'admin.data_booking.edit_booking_tempat';
            break;
            case 'rumah':
                $data_booking = DataBookingRumah::with('data_transaksi_layanan')->find($id);
                $view = 'admin.data_booking.edit_booking_rumah';
            break;
        }

        return view($view, compact('data_booking', 'layanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataBooking  $dataBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        switch($request->booking) {
            case 'tempat':
                $booking = DataBookingTempat::find($id);
                $booking->nama = $request->nama;
                $booking->no_hp = $request->no_hp;
                $booking->alamat = $request->alamat;
                $booking->status = $request->status;

                if ($booking->save()) {


                    if (isset($request->layanan_id)) {
                        $DataTransaksiLayanan = DataTransaksiLayanan::where('booking_di_tempat_id', $id)->get();

                        // check if layanan not match then drop and re-insert data 
                        if (count($DataTransaksiLayanan) != count($request->layanan_id)) {

                            for ($i=0; $i < count($DataTransaksiLayanan); $i++) { 
                                $DataTransaksiLayanan[$i]->delete();
                             } 

                            $data_layanan_transaksi_data = [];
                            for ($i=0; $i < count($request->layanan_id); $i++) { 
                                $data_layanan_transaksi_data[] = [
                                    'booking_di_tempat_id' => $booking->id,
                                    'layanan_id' => $request->layanan_id[$i]
                                ];
                            }
        
                            DataTransaksiLayanan::insert($data_layanan_transaksi_data);
                        }
                    }

                    $message = "Booking di tempat atas nama ".ucwords($request->nama)." telah di update!";
                    return redirect('/data-booking')->with(['success' => $message]);
                 } else {
                    $message = "Gagal mengupdate Booking di Tempat";
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

            $kapster = User::find($booking_rumah->kapster);
            if ($kapster->telegram_chat_id != null and $kapster->telegram_chat_id != "") {

                // kirim notifikasi ke Kapster dan Admin
                 $telegram_detail_booking = [
                    'chat_id' => $kapster->telegram_chat_id,
                    'text' => "Halo ".ucwords($kapster->name).",\npelanggan atas nama ".ucwords($booking_rumah->pelanggan->name)." telah membatalkan pesanan nya.\n\nHarap melakukan konfirmasi ulang kepada pelanggan. Terima kasih",
                ];

                $admin = User::where('level', 'admin')->first();
                $telegram_admin = [
                    'chat_id' => $admin->telegram_chat_id,
                    'text' => "Halo ".ucwords($kapster->name).",\npelanggan atas nama ".ucwords($booking_rumah->pelanggan->name)." telah membatalkan pesanan nya.\n\nHarap melakukan konfirmasi ulang kepada pelanggan. Terima kasih",
                ];

                $telegramMessage = new TelegramMessage();
                
                $telegramMessage->sendMessage($telegram_detail_booking);
                $telegramMessage->sendMessage($telegram_admin);

            }


            return back();
        }
    }

    public function denied_booking($id) {

        $booking_rumah = DataBookingRumah::find($id);

        $booking_rumah->status_booking = 'tolak';
        $booking_rumah->no_antrian = null;
        if ($booking_rumah->save()) {
    
            $telegramMessage = new TelegramMessage();

            $telegram_kapster = [
                'chat_id' => $booking_rumah->pelanggan->telegram_chat_id,
                'text' => "Halo ".ucwords($booking_rumah->pelanggan->name).",\nkapster ".ucwords(Auth::user()->name)." tidak dapat menerima permintaan booking anda, silahkan mencoba pilih kapster lain. terima kasih",
            ];
            
            $telegramMessage->sendMessage($telegram_kapster);

            return back();

        } else {
            return back()->with('errors','Terjadi kesalahan, silahkan ulangi lagi atau hubungi admin, terima kasih');
        }

    }

    public function accept_booking($id) {

        $booking_rumah = DataBookingRumah::find($id);

        $booking_rumah->status_booking = 'terima';
        if ($booking_rumah->save()) {
    
            $telegramMessage = new TelegramMessage();

            $telegram_kapster = [
                'chat_id' => $booking_rumah->pelanggan->telegram_chat_id,
                'text' => "Halo ".ucwords($booking_rumah->pelanggan->name).",\nkapster ".ucwords(Auth::user()->name)." telah menerima permintaan layanan anda dan segera menuju ke rumah anda.\nHarap menunggu, terima kasih",
            ];
            
            $telegramMessage->sendMessage($telegram_kapster);

            return back()->with('success', 'Anda telah menerima order booking, harap segera menuju ke rumah pelanggan, terima kasih');

        } else {
            return back()->with('errors','Terjadi kesalahan, silahkan ulangi lagi atau hubungi admin, terima kasih');
        }
    }

    public function finish_booking($id) {
        $booking_rumah = DataBookingRumah::find($id);

        $booking_rumah->status_booking = 'selesai';
        $booking_rumah->no_antrian = null;
        if ($booking_rumah->save()) {
    
            $telegramMessage = new TelegramMessage();

            $telegram_kapster = [
                'chat_id' => $booking_rumah->pelanggan->telegram_chat_id,
                'text' => "Halo ".ucwords($booking_rumah->pelanggan->name).",\nkapster ".ucwords(Auth::user()->name)." telah selesai melayani anda, semoga anda suka dengan pelayanan kapster ".ucwords(Auth::user()->name).". terima kasih",
            ];
            
            $telegramMessage->sendMessage($telegram_kapster);

            return back();

        } else {
            return back()->with('errors','Terjadi kesalahan, silahkan ulangi lagi atau hubungi admin, terima kasih');
        }        
    }

}
