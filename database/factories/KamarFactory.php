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
        return [
            'nama_kamar'=>$this->faker->word(),
            'jum_kamar'=>rand(5,10),
            'harga_kamar'=>$this->faker->numberBetween(300000, 900000),
            'deskripsi_kamar'=>$this->faker->paragraph(),
        ];
    }
}
