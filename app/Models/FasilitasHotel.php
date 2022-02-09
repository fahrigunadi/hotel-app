<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasHotel extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'nama_fasilitas_hotel',
        'foto_fasilitas_hotel',
        'deskripsi_fasilitas_hotel'
    ];
}
