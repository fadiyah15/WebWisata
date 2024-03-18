<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use App\Models\User;
use App\Models\Karyawan;
use App\Models\KategoriWisata;
use App\Models\KategoriBerita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'level' => 'admin',
            'aktif' => 1
        ]);
        User::create([
            'email' => 'bendahara@bendahara.com',
            'password' => bcrypt('12345678'),
            'level' => 'bendahara',
            'aktif' => 1
        ]);
        User::create([
            'email' => 'pemilik@pemilik.com',
            'password' => bcrypt('12345678'),
            'level' => 'pemilik',
            'aktif' => 1
        ]);

        Pelanggan::factory(10)->create();
        Karyawan::factory(10)->create();
        KategoriWisata::factory(10)->create();
        KategoriBerita::factory(10)->create();
    }
}