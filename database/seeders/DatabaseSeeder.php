<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //\App\Models\User::factory(10)->create();
        \App\Models\Student::factory(17)->create();
        \App\Models\Room::factory(10)->create();
        // \App\Models\Faculty::factory(10)->create();
        \App\Models\StudentParent::factory(10)->create();
        \App\Models\Admin::factory(5)->create();
        \App\Models\User::create([
        'name' => 'nizham rifqi',
        'email' => 'nizhamrifqi@gmail.com',
        'password' => Hash::make('12345')
        ]);
        \App\Models\Student::create([
        'nim' => 'L200164004',
        'full_name' => 'Muhammad Nizhamuddin Rifqi',
        'gender' => 'male',
        'room_id' => '1',
        'faculty_id' => '1',
        'parent_id' => '1',
        'password' => Hash::make('12345'),
        'phone' => '081327934811'
        ]);

        \App\Models\Permit::create([
            'name_kind' => 'Masuk',
            ]);
        \App\Models\Permit::create([
            'name_kind' => 'Keluar',
            ]);
        \App\Models\Permit::create([
            'name_kind' => 'Pulang Kerumah',
            ]);
    
        $this->call(AdminSeeder::class);
        $this->call(FacultySeeder::class);

    }
}
