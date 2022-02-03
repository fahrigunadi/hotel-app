<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'nama'     => 'Administrator',
            'username'    => 'admin',
            'role'    => 'admin',
            'password' => bcrypt('1234'),
        ]);

        Admin::create([
            'nama'     => 'Resepsionis',
            'username'    => 'resepsionis',
            'role'    => 'resepsionis',
            'password' => bcrypt('1234'),
        ]);

        Admin::create([
            'nama'     => 'Jilong',
            'username'    => 'jilong',
            'role'    => 'resepsionis',
            'password' => bcrypt('1234'),
        ]);
    }
}
