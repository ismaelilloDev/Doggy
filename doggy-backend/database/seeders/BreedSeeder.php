<?php

namespace Database\Seeders;

use App\Models\Breed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $breeds = [
            'Labrador Retriever',
            'Bulldog',
            'Golden Retriever',
            'German Shepherd',
            'Beagle',
            'Poodle',
            'Boxer',
            'Dachshund',
            'Chihuahua',
            'Siberian Husky',
        ];

        $data = [];

        foreach ($breeds as $bred) {
            $data[] = ['name' => $bred];
        }

        Breed::query()->insert($data);
    }
}
