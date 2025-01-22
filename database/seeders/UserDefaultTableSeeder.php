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
            'name' => 'Administrator',
            'email' => 'administrator@gmail.com',
            'password' => \Hash::make('12345678'),
            'role' => 'Administrator',
        ]);
        User::create([
            'name' => 'Kepala Produksi',
            'email' => 'kepalaproduksi@gmail.com',
            'password' => \Hash::make('12345678'),
            'role' => 'Kepala Produksi'
        ]);
    }
}
