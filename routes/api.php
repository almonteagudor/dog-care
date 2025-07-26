<?php

use App\Http\Controllers\Api\AllergyController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DiseaseController;
use App\Http\Controllers\Api\MedicineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/user', fn(Request $request) => $request->user());

    Route::apiResource('allergies', AllergyController::class);
    Route::apiResource('diseases', DiseaseController::class);
    Route::apiResource('medicines', MedicineController::class);
});
