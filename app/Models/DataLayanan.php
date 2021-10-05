<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLayanan extends Model
{
    use HasFactory;

    protected $table = 'data_layanan';

    protected $fillable = [
        'id',
        'jenis_layanan',
        'harga_layanan'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
