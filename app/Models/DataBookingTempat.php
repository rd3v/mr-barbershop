<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBookingTempat extends Model
{
    use HasFactory;

    protected $table = 'booking_di_tempat';

    protected $fillable = [
        'id', 'users_id', 'layanan_id', 'waktu_tunggu', 'status',
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function transaksi() {
        return $this->belongsTo('App\Models\DataTransaksi');
    }

    public function pelanggan() {
        return $this->belongsTo(User::class);
    }

    public function layanan() {
        return $this->belongsTo(DataLayanan::class);
    }
}
