<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPelanggan extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [

    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
