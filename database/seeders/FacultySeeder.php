<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Faculty::create(['name_faculty' => 'Pendidikan Akuntansi', 'short' => 'FKIP']);
        \App\Models\Faculty::create(['name_faculty' => 'Pendidikan Pancasila dan Kewarganegaraan', 'short' => 'FKIP']);
        \App\Models\Faculty::create(['name_faculty' => 'Manajemen', 'short' => 'FEB']);
        \App\Models\Faculty::create(['name_faculty' => 'Akuntansi', 'short' => 'FEB']);
        \App\Models\Faculty::create(['name_faculty' => 'Teknik Informatika', 'short' => 'FKI']);
        \App\Models\Faculty::create(['name_faculty' => 'Ilmu Komunikasi', 'short' => 'FKI']);
        \App\Models\Faculty::create(['name_faculty' => 'Pendidikan Agama Islam', 'short' => 'FAI']);
        \App\Models\Faculty::create(['name_faculty' => 'Hukum Ekonomi Syariah', 'short' => 'HES']);
        \App\Models\Faculty::create(['name_faculty' => 'Teknik Sipil', 'short' => 'FT']);
            
    }
}
