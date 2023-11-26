<?php

namespace Database\Seeders;

use App\Enums\Size;
use App\Models\Breed;
use App\Models\Dog;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use ReflectionClass;

class DogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = array_values((new ReflectionClass(Size::class))->getConstants());

        for ($i = 1; $i <= 20; $i++) {

            $dog = Dog::create([
                'name'      => 'Perro ' . $i,
                'size'      => $sizes[array_rand($sizes)],
                'color'     => 'white'
            ]);

            $breeds = Breed::inRandomOrder()->limit(rand(1, 2))->get();
            $dog->breeds()->attach($breeds->pluck('id')->toArray());

        }
    }
}
