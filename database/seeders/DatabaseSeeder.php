<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \DB::table('jabatan')->insert([
            'nama_jabatan' => "Admin",
        ]);
        \DB::table('jabatan')->insert([
            'nama_jabatan' => "Kasir",
        ]);

        \DB::table('pegawai')->insert([
            'nomor_pegawai' => "12345678",
            'nama_pegawai' => "Si Admin",
            'id_jabatan' => 1,
            'password_akun' => \Hash::make("12344321"),
        ]);

    }
}
