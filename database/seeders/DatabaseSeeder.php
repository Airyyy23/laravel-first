<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Student::factory(20)->create();
        \App\Models\Guru::factory(4)->create();

        Kelas::create([
            'nama' => '10 PPLG 1',
            'guru_id' => 1
        ]);

        Kelas::create([
            'nama' => '10 PPLG 2',
            'guru_id' => 2
        ]);

        Kelas::create([
            'nama' => '11 PPLG 1',
            'guru_id' => 3
        ]);

        Kelas::create([
            'nama' => '11 PPLG 2',
            'guru_id' => 4
        ]);
    }
}
