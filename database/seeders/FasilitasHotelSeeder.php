<?php

namespace Database\Seeders;

use App\Models\FasilitasHotel;
use Illuminate\Database\Seeder;

class FasilitasHotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FasilitasHotel::create([
            'nama_fasilitas_hotel'=>'Kolam Renang',
            'foto_fasilitas_hotel'=>null,
            'deskripsi_fasilitas_hotel'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni vitae soluta modi. Ea veniam esse atque iusto labore eum facilis velit, aut illum doloribus laudantium, temporibus mollitia suscipit ullam molestias.'
        ]);
        FasilitasHotel::create([
            'nama_fasilitas_hotel'=>'Restaurant',
            'foto_fasilitas_hotel'=>null,
            'deskripsi_fasilitas_hotel'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni vitae soluta modi. Ea veniam esse atque iusto labore eum facilis velit, aut illum doloribus laudantium, temporibus mollitia suscipit ullam molestias.'
        ]);
        FasilitasHotel::create([
            'nama_fasilitas_hotel'=>'Studio Music',
            'foto_fasilitas_hotel'=>null,
            'deskripsi_fasilitas_hotel'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni vitae soluta modi. Ea veniam esse atque iusto labore eum facilis velit, aut illum doloribus laudantium, temporibus mollitia suscipit ullam molestias.'
        ]);
        FasilitasHotel::create([
            'nama_fasilitas_hotel'=>'Hiburan',
            'foto_fasilitas_hotel'=>null,
            'deskripsi_fasilitas_hotel'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni vitae soluta modi. Ea veniam esse atque iusto labore eum facilis velit, aut illum doloribus laudantium, temporibus mollitia suscipit ullam molestias.'
        ]);
    }
}
