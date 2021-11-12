<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\DataLayanan;
use App\Models\User;

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
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function layanan() {
        return $this->hasOne(DataLayanan::class, 'id', 'layanan_id');
    }
}
