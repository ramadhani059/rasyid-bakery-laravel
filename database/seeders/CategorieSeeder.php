<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'nama_kategori' => 'Donats',
                'slug' => 'donats',
                'jumlah_product' => '5'
            ],
        ]);
    }
}
