<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            [
                'name' => 'Pratama Ramadhani Wijaya',
                'email' => 'pratamaramadhani059@gmail.com',
                'subject' => 'Pesan Donat Coklat Keju 50 Porsi',
                'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tempor ornare ipsum eget fermentum. Aliquam rutrum ultrices malesuada. Fusce dapibus gravida ex, eu gravida tellus imperdiet id. Proin lacus sapien, tincidunt ut imperdiet ac, cursus id nunc. Curabitur ullamcorper tempus erat, quis lacinia est facilisis id. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nunc imperdiet laoreet nunc. Vestibulum eu diam interdum, pretium justo vel, efficitur massa. Donec ut posuere velit. Donec aliquet, dolor viverra pharetra imperdiet, tellus eros ultricies justo, at faucibus lorem leo sed sem. Proin placerat rutrum justo, vel sollicitudin nibh ultricies ac. Ut varius mauris a magna blandit mollis.',
            ],
        ]);
    }
}
