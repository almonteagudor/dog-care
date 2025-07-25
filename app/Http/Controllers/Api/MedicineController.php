<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use Illuminate\Http\JsonResponse;

class MedicineController extends Controller
{
    public function index(): JsonResponse
    {
        $medicines = Medicine::paginate();

        return Response()->json($medicines);
    }
}
