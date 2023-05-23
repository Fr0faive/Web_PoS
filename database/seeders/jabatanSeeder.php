<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class jabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('jabatan')->insert([
            'nama_jabatan' => "Admin",
        ]);
        \DB::table('jabatan')->insert([
            'nama_jabatan' => "Kasir",
        ]);

    }
}
