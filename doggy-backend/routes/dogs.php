<?php

use App\Http\Controllers\DogController;
use Illuminate\Support\Facades\Route;

Route::get('dogs', [DogController::class, 'list'])->name('dogs.index');
