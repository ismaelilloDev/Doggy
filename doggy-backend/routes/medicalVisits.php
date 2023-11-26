<?php

use App\Http\Controllers\MedicalVisitController;
use Illuminate\Support\Facades\Route;

Route::get('medical-visits', [MedicalVisitController::class, 'list'])->name('medical-visits.index');

