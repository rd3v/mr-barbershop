<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataInformasi extends Model
{
    use HasFactory;

    protected $table = 'data_informasi';

    protected $fillable = [
        'id', 'text'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
