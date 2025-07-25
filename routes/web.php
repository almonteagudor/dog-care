<?php

use App\Http\Controllers\DiseaseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('diseases', DiseaseController::class);
