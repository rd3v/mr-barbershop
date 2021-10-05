<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBookingRumah extends Model
{
    use HasFactory;

    protected $table = 'booking_ke_rumah';

    protected $fillable = [
        'id', 'users_id', 'layanan_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function transaksi() {
        return $this->belongsTo('App\Models\DataTransaksi');
    }

    public function pelanggan() {
        return $this->hasOne(User::class);
    }

    public function layanan() {
        return $this->hasOne(DataLayanan::class);
    }
}
