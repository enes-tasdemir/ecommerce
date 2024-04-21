<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
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
            'name'      => 'Enes Taşdemir',
            'email'     => 'enstasdemir@gmail.com',
            'password'  => Hash::make('123456'),
        ]);
    }
}
