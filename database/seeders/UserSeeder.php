<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'ramadhani059',
                'name' => 'Pratama Ramadhani Wijaya',
                'email' => 'pratamaramadhani059@gmail.com',
                'password' => bcrypt('12345678'),
                'position' => 'Owner',
            ],
        ]);
    }
}
