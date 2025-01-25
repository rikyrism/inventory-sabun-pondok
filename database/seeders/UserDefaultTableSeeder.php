<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserDefaultTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama_user' => 'Administrator',
            'username' => 'administrator',
            'password' => \Hash::make('12345678'),
            'hak_akses' => 'Administrator',
        ]);
        User::create([
            'nama_user' => 'Kepala Produksi',
            'username' => 'kepalaproduksi',
            'password' => \Hash::make('12345678'),
            'hak_akses' => 'Kepala Produksi'
        ]);
    }
}
