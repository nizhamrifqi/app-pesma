<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Admin::create([
        'full_name' => 'nizham rifqi',
        'username' => 'nizhamrifqi',
        'password' => Hash::make('12345'),
        'status' => '1'
        ]);
    }
}
