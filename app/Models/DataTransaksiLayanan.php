<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\DataBookingTempat;
use App\Models\DataBookingRumah;
use App\Models\DataLayanan;

class DataTransaksiLayanan extends Model
{
    use HasFactory;

    protected $table = 'data_transaksi_layanans';

    protected $fillable = [
        'booking_di_tempat_id', 'booking_ke_rumah_id', 'layanan_id'
    ];

    protected $hidden = [
        'id','created_at', 'updated_at'
    ];

    public function booking_di_tempat() {
        return $this->belongsTo(DataBookingTempat::class, 'booking_di_tempat_id');
    }

    public function booking_ke_rumah() {
        return $this->belongsTo(DataBookingRumah::class,'booking_ke_rumah_id');
    }

    public function layanan() {
        return $this->belongsTo(DataLayanan::class, 'layanan_id');
    }

}
