<?php

namespace Database\Seeders;

use App\Models\{User, Skema, Peserta};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
        $jwd = Skema::create([
            'kode_skema' => 'JWD',
            'nama_skema' => 'Junior Web Developer',
            'deskripsi' => 'Skema untuk Junior Web Developer',
        ]);
        Skema::create([
            'kode_skema' => 'JMD',
            'nama_skema' => 'Junior Mobile Developer',
            'deskripsi' => 'Skema untuk Junior Mobile Developer',
        ]);
        Peserta::create([
            'no_peserta' => 'P001',
            'nama' => 'Satria Henggar Yoselino',
            'email' => 'satria@gmail.com',
            'no_telepon' => '085716700904',
            'alamat' => 'Jakarta',
            'tanggal_lahir' => '2009-20-05',
            'skema_id' => $jwd->id,
        ]); 
    }
}
