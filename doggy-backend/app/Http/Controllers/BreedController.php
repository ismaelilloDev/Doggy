<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use Illuminate\Http\JsonResponse;

class BreedController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'breeds' => Breed::all(),
        ]);
    }
}
