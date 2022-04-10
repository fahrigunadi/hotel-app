<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KamarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $jum = rand(5,10);
        return [
            'nama_kamar'=>$this->faker->word(),
            'jum_kamar'=>$jum,
            'jum_kamar_kosong'=>$jum,
            'harga_kamar'=>$this->faker->numberBetween(300000, 900000),
            'deskripsi_kamar'=>$this->faker->paragraph(),
        ];
    }
}
