<?php

namespace Database\Seeders;

use App\Models\FasilitasHotel;
use App\Models\Pemesanan;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            AdminSeeder::class,
            KamarSeeder::class,
            FasilitasKamarSeeder::class,
            FasilitasHotelSeeder::class,
            PemesananSeeder::class
        ]);
    }
}
