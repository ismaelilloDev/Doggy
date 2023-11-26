<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Models\MedicalVisit;
use Illuminate\Http\JsonResponse;

class MedicalVisitController extends Controller
{
    public function list(ListRequest $request): JsonResponse {
        return response()->json([
            'medical_visits' => MedicalVisit::query()
                ->when($request->search, function ($query) use ($request) {
                     return $query->search($request->search);
                })
                ->when(($request->field && $request->orderDirection), function ($query) use ($request) {
                    return $query->orderBy($request->field, $request->orderDirection);
               })->paginate(2)
        ]);
    }
}
