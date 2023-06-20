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


        // Jabatan
        \DB::table('jabatan')->insert([
            'nama_jabatan' => "Admin",
        ]);
        \DB::table('jabatan')->insert([
            'nama_jabatan' => "Kasir",
        ]);

        // Pegawai
        \DB::table('pegawai')->insert([
            'nomor_pegawai' => "12345678",
            'nama_pegawai' => "Si Admin",
            'id_jabatan' => 1,
            'password_akun' => \Hash::make("12344321"),
        ]);

        \DB::table('pegawai')->insert([
            'nomor_pegawai' => "3010000001",
            'nama_pegawai' => "Si Kasir",
            'gaji_pokok' => 4000000,
            'id_jabatan' => 2,
            'password_akun' => \Hash::make("kasir123"),
        ]);


        // Bonus
        \DB::table('jenis_bonus')->insert([
            'nama_jenis_bonus' => "Tunjangan Hari Raya",
        ]);
        \DB::table('jenis_bonus')->insert([
            'nama_jenis_bonus' => "Lembur",
        ]);
        \DB::table('jenis_bonus')->insert([
            'nama_jenis_bonus' => "Target Penjualan",
        ]);

        // Supplier
        \DB::select(\DB::raw("INSERT INTO supplier (nama_supplier, alamat, kontak)
        VALUES
            ('ElectroTech', 'Jl. Elektronik No. 123', '081234567890'),
            ('GadgetZone', 'Jl. Gadget No. 456', '087654321098'),
            ('DigitalSolutions', 'Jl. Digital No. 789', '082345678901'),
            ('TechHub', 'Jl. Tech No. 234', '089012345678'),
            ('ElectroWorld', 'Jl. Electro No. 567', '085678901234');
        "));

        // Produk Kategori
        \DB::select(\DB::raw("INSERT INTO produk_kategori (nama_produk_kategori)
        VALUES
            ('Televisi'),
            ('Smartphone'),
            ('Laptop'),
            ('Tablet'),
            ('Kamera Digital'),
            ('Konsol Permainan'),
            ('Pemutar Musik'),
            ('Speaker'),
            ('Perangkat Penyimpanan Data'),
            ('Printer');
        "));

        // Produk
        \DB::select(\DB::raw("INSERT INTO produk (nama_produk, barcode, stok, id_produk_kategori, harga)
        VALUES
            ('TV LED 55 Inci', '123456789', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Televisi'), 5000000),
            ('iPhone 12', '987654321', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Smartphone'), 12000000),
            ('Laptop ASUS ROG', '456789123', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Laptop'), 15000000),
            ('iPad Air', '789123456', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Tablet'), 8000000),
            ('Kamera Canon EOS', '321654987', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Kamera Digital'), 10000000),
            ('Konsol PlayStation 5', '654789321', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Konsol Permainan'), 6000000),
            ('iPod Shuffle', '159753468', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Pemutar Musik'), 500000),
            ('Speaker JBL Flip', '864209753', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Speaker'), 1500000),
            ('Flash Drive 64GB', '753420986', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Perangkat Penyimpanan Data'), 200000),
            ('Printer Epson', '369852147', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Printer'), 3000000),
            ('TV LED 42 Inci', '987654322', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Televisi'), 4000000),
            ('Samsung Galaxy S21', '456789124', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Smartphone'), 10000000),
            ('Laptop Dell XPS 13', '789123457', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Laptop'), 18000000),
            ('iPad Pro', '321654988', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Tablet'), 9000000),
            ('Kamera Sony Alpha', '654789322', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Kamera Digital'), 8000000),
            ('Nintendo Switch', '159753469', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Konsol Permainan'), 5500000),
            ('MP3 Player', '864209754', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Pemutar Musik'), 400000),
            ('Speaker Bose', '753420987', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Speaker'), 2500000),
            ('Hard Disk 1TB', '369852148', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Perangkat Penyimpanan Data'), 300000),
            ('Printer Canon', '753420988', 0, (SELECT id_produk_kategori FROM produk_kategori WHERE nama_produk_kategori = 'Printer'), 2500000);"));

        // Produk Supplier
        \DB::select(\DB::raw("INSERT INTO produk_supplier (id_produk,id_supplier)
        VALUES
            ((SELECT id_produk FROM produk WHERE nama_produk = 'TV LED 55 Inci'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'ElectroTech')),
            ((SELECT id_produk FROM produk WHERE nama_produk = 'TV LED 42 Inci'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'ElectroTech')),
            ((SELECT id_produk FROM produk WHERE nama_produk = 'iPhone 12'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'GadgetZone')),
            ((SELECT id_produk FROM produk WHERE nama_produk = 'Samsung Galaxy S21'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'GadgetZone')),
            ((SELECT id_produk FROM produk WHERE nama_produk = 'Laptop ASUS ROG'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'DigitalSolutions')),
            ((SELECT id_produk FROM produk WHERE nama_produk = 'Laptop Dell XPS 13'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'DigitalSolutions')),
            ((SELECT id_produk FROM produk WHERE nama_produk = 'iPad Air'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'DigitalSolutions')),
            ((SELECT id_produk FROM produk WHERE nama_produk = 'iPad Pro'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'DigitalSolutions')),
            ((SELECT id_produk FROM produk WHERE nama_produk = 'Kamera Canon EOS'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'ElectroTech')),
            ((SELECT id_produk FROM produk WHERE nama_produk = 'Kamera Sony Alpha'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'ElectroTech')),
            ((SELECT id_produk FROM produk WHERE nama_produk = 'Konsol PlayStation 5'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'TechHub')),
            ((SELECT id_produk FROM produk WHERE nama_produk = 'Nintendo Switch'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'TechHub')),
            ((SELECT id_produk FROM produk WHERE nama_produk = 'iPod Shuffle'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'GadgetZone')),
            ((SELECT id_produk FROM produk WHERE nama_produk = 'MP3 Player'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'GadgetZone')),
            ((SELECT id_produk FROM produk WHERE nama_produk = 'Speaker JBL Flip'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'DigitalSolutions')),
            ((SELECT id_produk FROM produk WHERE nama_produk = 'Speaker Bose'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'DigitalSolutions')),
            ((SELECT id_produk FROM produk WHERE nama_produk = 'Flash Drive 64GB'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'ElectroWorld')),
            ((SELECT id_produk FROM produk WHERE nama_produk = 'Hard Disk 1TB'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'ElectroWorld')),
            ((SELECT id_produk FROM produk WHERE nama_produk = 'Printer Epson'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'ElectroWorld')),
            ((SELECT id_produk FROM produk WHERE nama_produk = 'Printer Canon'),(SELECT id_supplier FROM supplier WHERE nama_supplier = 'ElectroWorld'));
        "));



    }
}
