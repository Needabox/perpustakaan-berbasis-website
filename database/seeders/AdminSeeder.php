<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('users')->insert([
            'name' => 'Admin Perpustakaan',
            'email' => 'Admin_Perpustakaan@mail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
