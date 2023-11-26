<?php

use App\Http\Controllers\BreedController;
use Illuminate\Support\Facades\Route;

Route::get('breeds', [BreedController::class, 'index'])->name('breeds.index');

