<?php

use App\Http\Controllers\DogController;
use Illuminate\Support\Facades\Route;

Route::get('dogs', [DogController::class, 'list'])->name('dogs.index');
Route::post('dog/update/{dog}', [DogController::class, 'update'])->name('dogs.update');
Route::post('dog/create', [DogController::class, 'create'])->name('dogs.create');
Route::get('dog/{dog}', [DogController::class, 'show'])->name('dogs.show');

