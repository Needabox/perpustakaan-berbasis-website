<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            [
                'name' => 'Novel',
            ],
            [
                'name' => 'Komik',
            ],
            [
                'name' => 'Majalah',
            ],
            [
                'name' => 'Pelajaran',
            ],
            [
                'name' => 'Kamus',
            ],
            [
                'name' => 'Ensiklopedia',
            ],
            [
                'name' => 'Biografi',
            ],
            [
                'name' => 'Buku Anak',
            ],
        ];

        foreach ($category as $key => $value) {
            \App\Models\Backsite\Operational\Category::create($value);
        }
    }
}
