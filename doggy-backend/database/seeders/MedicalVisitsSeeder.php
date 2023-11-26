<?php

namespace Database\Seeders;

use App\Models\Dog;
use App\Models\MedicalVisit;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicalVisitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dogIds = Dog::pluck('id');
        $startDateLimit = now()->startOfWeek()->subWeek();
        $endDateLimit = now()->endOfWeek()->addWeek();

        for ($i = 0; $i < 10; $i++) {
            $randomDate = Carbon::parse(rand($startDateLimit->timestamp, $endDateLimit->timestamp));
            MedicalVisit::create([
                'date' => $randomDate,
                'dog_id' => $dogIds->random(),
            ]);
        }
    }
}
