<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = ['brown', 'black', 'white', 'gray', 'tan', 'spotted'];

        $data = [];

        foreach ($colors as $color) {
            $data[] = ['name' => $color];
        }

        Color::insert($data);
    }
}
