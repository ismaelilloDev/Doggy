<?php

namespace Database\Seeders;

use App\Enums\Size;
use App\Models\Breed;
use App\Models\Color;
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
            $bornDate = Carbon::now()->subYears(rand(1, 10))->subDays(rand(1, 365));

            $dog = Dog::create([
                'name'      => 'Perro ' . $i,
                'born_date' => $bornDate,
                'size'      => $sizes[array_rand($sizes)],
            ]);

            $breeds = Breed::inRandomOrder()->limit(rand(1, 2))->get();
            $dog->breeds()->attach($breeds->pluck('id')->toArray());

            $colors = Color::inRandomOrder()->limit(rand(1, 2))->get();
            $dog->colors()->attach($colors->pluck('id')->toArray());
        }
    }
}
