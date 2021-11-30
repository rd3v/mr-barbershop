<?php 

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

use Illuminate\Database\Eloquent\Model;
use App\Models\DataBookingRumah;
use App\Models\DataBookingTempat;
use App\Models\DataTransaksi;

class LaporanController extends Controller {

	public function getLaporan(Request $request) {

		$tanggal_mulai = Carbon::createFromFormat('Y-m-d', $request->tanggal_mulai)->toDateTimeString();
		$tanggal_akhir = Carbon::createFromFormat('Y-m-d', $request->tanggal_akhir)->toDateTimeString();

		$data_transaksi = DataTransaksi::select(DB::raw("date(created_at) as tanggal, count(*) as jumlah_transaksi, sum(total) as total"))->whereDate('created_at', '>=', $tanggal_mulai)->whereDate('created_at', '<=', $tanggal_akhir)->groupBy("tanggal")->get();

		// $data_booking_tempat = DataBookingTempat::whereDate('created_at','>=', $tanggal_mulai)->whereDate('created_at', '<=', $tanggal_akhir)->where('status',2)->get();
		// $data_booking_rumah = DataBookingRumah::whereDate('created_at','>=', $tanggal_mulai)->whereDate('created_at', '<=', $tanggal_akhir)->where('status_booking', 'selesai')->get();
		
		$laporan = [
			'transaksi' => $data_transaksi
		];

		$response = [
			'status' => 200,
			'data' => [
				'laporan' => $laporan
			],
			'tanggal' => [
				'mulai' => $tanggal_mulai,
				'akhir' => $tanggal_akhir,
			]
		];
		return response()->json(compact('response'));
	}

}

?>