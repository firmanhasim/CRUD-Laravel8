<?php

namespace Database\Seeders;

use App\Models\Pegawai;
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

        // menyesuaikan dengan nama model
        Pegawai::create([
            'nama' => 'firman hasim',
            'jenis_kelamin' => 'laki-laki',
            'no_telepon' => '0987654322'
        ]);
    }
}
