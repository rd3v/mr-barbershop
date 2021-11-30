<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTransaksi extends Model
{
    use HasFactory;

    protected $table = 'data_transaksi';

    protected $fillable = [
        'id', 'booking_tempat_id', 'booking_rumah_id', 'total', 'created_at'
    ];

    protected $hidden = [
        'updated_at'
    ];

    public function booking_di_tempat() {
        return $this->hasMany(DataBookingTempat::class, 'booking_tempat_id');
    }

    public function booking_ke_rumah() {
        return $this->hasMany(DataBookingRumah::class, 'booking_rumah_id');
    }

}
