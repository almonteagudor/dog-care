<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use Illuminate\Http\JsonResponse;

class DiseaseController extends Controller
{
    public function index(): JsonResponse
    {
        $diseases = Disease::paginate();

        return Response()->json($diseases);
    }
}
