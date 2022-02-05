<?php

namespace Database\Seeders;

use App\Models\FasilitasKamar;
use Illuminate\Database\Seeder;

class FasilitasKamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FasilitasKamar::create([
            'kamar_id' => 1,
            'nama_fasilitas_kamar' => 'TV'
        ]);
        FasilitasKamar::create([
            'kamar_id' => 1,
            'nama_fasilitas_kamar' => 'AC'
        ]);
        FasilitasKamar::create([
            'kamar_id' => 2,
            'nama_fasilitas_kamar' => 'TV'
        ]);
        FasilitasKamar::create([
            'kamar_id' => 2,
            'nama_fasilitas_kamar' => 'AC'
        ]);
    }
}
