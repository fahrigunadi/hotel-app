<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PemesananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $checkin = $this->faker->dateTimeBetween('-1 week', '+1 week');

        $checkout = date('Y-m-d', strtotime('+ '.rand(1,3).' days', strtotime( $checkin->format('Y-m-d'))));
        $create = date('Y-m-d H:i:s', strtotime('- '.rand(1,3).' days', strtotime( $checkin->format('Y-m-d'))));


        return [
            'kamar_id'=>rand(1,3),
            'tgl_checkin'=>$checkin,
            'tgl_checkout'=>$checkout,
            'jum_kamar_dipesan'=>rand(1,2),
            'nama_pemesan'=>$this->faker->name(),
            'email_pemesan'=>$this->faker->freeEmail(),
            'no_hp'=>$this->faker->phoneNumber(),
            'nama_tamu'=>$this->faker->name(),
            'status'=>'pesan',
            'created_at'=>$create,
            'updated_at'=>$create,
        ];
    }
}
