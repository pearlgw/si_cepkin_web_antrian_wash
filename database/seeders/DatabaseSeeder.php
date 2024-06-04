<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Antrian;
use App\Models\JenisLayanan;
use App\Models\PersediaanBarang;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Role::create([
            'role_name' => 'admin',
        ]);

        Role::create([
            'role_name' => 'customer',
        ]);

        User::create([
            'name' => 'asep',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'no_telp' => '089728282727',
            'role_id' => 1,
        ]);
        User::create([
            'name' => 'ratu',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('password'),
            'no_telp' => '089728282727',
            'role_id' => 2,
        ]);

        JenisLayanan::create([
            'nama_layanan' => 'Cuci Motor Standar',
            'deskripsi_layanan' => 'Pembersihan luar dan dalam motor, termasuk cuci, lap, dan semir ban.',
            'harga_layanan' => 20000,
        ]);

        JenisLayanan::create([
            'nama_layanan' => 'Cuci Motor Premium',
            'deskripsi_layanan' => 'Pembersihan menyeluruh, termasuk cuci, lap, semir ban, dan pelindung cat.',
            'harga_layanan' => 35000,
        ]);

        JenisLayanan::create([
            'nama_layanan' => 'Cuci Mobil Standar',
            'deskripsi_layanan' => 'Pembersihan luar dan dalam mobil, termasuk cuci, lap, vakum interior, dan semir ban.',
            'harga_layanan' => 50000,
        ]);

        JenisLayanan::create([
            'nama_layanan' => 'Cuci Mobil Premium',
            'deskripsi_layanan' => 'Pembersihan menyeluruh, termasuk cuci, lap, vakum interior, semir ban, pelindung cat, dan pengharum kabin.',
            'harga_layanan' => 80000,
        ]);

        PersediaanBarang::create([
            'nama_barang' => 'shampoo',
            'stok' => 24,
            'harga_beli' => 50000,
        ]);

        PersediaanBarang::create([
            'nama_barang' => 'alat cuci',
            'stok' => 5,
            'harga_beli' => 100000,
        ]);

        // Antrian::create([
        //     'user_id' => 2,
        //     'jenis_layanan_id' => mt_rand(1, 4),
        //     'mobil' => 'avanza',
        //     'deskripsi' => 'nyucinya pelan pelan',
        // ]);

        // Antrian::create([
        //     'user_id' => 2,
        //     'jenis_layanan_id' => mt_rand(1, 4),
        //     'mobil' => 'terios',
        //     'deskripsi' => 'hati hati dan pelan pelan',
        // ]);
    }
}