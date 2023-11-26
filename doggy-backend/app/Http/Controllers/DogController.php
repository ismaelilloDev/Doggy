<?php

namespace App\Http\Controllers;

use App\Http\Requests\DogFormRequest;
use App\Http\Requests\ListRequest;
use App\Models\Breed;
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

    public function show(Dog $dog): JsonResponse {
        return response()->json([
            'dog' => $dog,
            'breeds' => Breed::all()
        ]);
    }

    public function update(Dog $dog, DogFormRequest $request): JsonResponse {

        $formData = $this->formatUpdateData($request);
        $dog->update($formData);

        if($request->selectedBreeds) {
            $breeds = json_decode($request->selectedBreeds);
            $dog->breeds()->sync($breeds);
        }
        return response()->json([
            'dog' => $dog,
            'breeds' => Breed::all()
        ]);

    }

    public function create(DogFormRequest $request): JsonResponse {

        $formData = $this->formatUpdateData($request);
        $dog = Dog::create($formData);

        if($request->selectedBreeds && $request->selectedBreeds !== '[]') {
            $breeds = json_decode($request->selectedBreeds);
            $dog->breeds()->sync($breeds);
        }

        return response()->json([
            'dog' => $dog,
            'breeds' => Breed::all()
        ]);

    }

    private function formatUpdateData(DogFormRequest $request): array
    {
        $formatedData = [];
        $formatedData['name'] = $request->name;
        $formatedData['size'] = $request->size;
        $formatedData['color'] = $request->color;

        if($request->image) {
            $uploadedFile = $request->file('image');
            $formatedData['image'] = $uploadedFile->store('images', 'public');
        }

        return $formatedData;
    }

}
