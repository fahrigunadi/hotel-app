<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasKamar extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = [
        'kamar_id',
        'nama_fasilitas_kamar'
    ];
}
