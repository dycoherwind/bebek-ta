<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'user@gmail.com',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678'),
            'no_hp' => '07345617',
            'alamat' => 'gaysdgasdhas',
        ]);

        User::create([
            'name' => 'admin@gmail.com',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'admin' => true,
            'no_hp' => '08234567',
            'alamat' => 'sggasdassd',
        ]);
    }
}
