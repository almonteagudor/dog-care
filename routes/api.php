<?php

use App\Http\Controllers\Api\DiseaseController;
use App\Http\Controllers\Api\MedicineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('diseases', DiseaseController::class);
Route::apiResource('medicines', MedicineController::class);
