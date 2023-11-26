<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Dog;
use Illuminate\Http\JsonResponse;

class DogController extends Controller
{
    public function list(ListRequest $request): JsonResponse {
        return response()->json([
            'dogs' => Dog::query()
                ->when($request->search, function ($query) use ($request) {
                     return $query->search($request->search);
                })
                ->when(($request->field && $request->orderDirection), function ($query) use ($request) {
                    return $query->orderBy($request->field, $request->orderDirection);
               })->paginate(2)
        ]);
    }

}
