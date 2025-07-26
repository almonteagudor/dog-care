<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Medicine\StoreMedicineRequest;
use App\Http\Requests\Api\Medicine\UpdateMedicineRequest;
use App\Http\Resources\Api\MedicineResource;
use App\Models\Medicine;
use Illuminate\Http\Response;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();

        return MedicineResource::collection($medicines);
    }

    public function store(StoreMedicineRequest $request)
    {
        $medicine = new Medicine();

        $medicine->name = $request->name;
        $medicine->description = $request->description;

        $medicine->save();

        return new MedicineResource($medicine);
    }

    public function show(Medicine $medicine)
    {
        return new MedicineResource($medicine);
    }

    public function update(UpdateMedicineRequest $request, Medicine $medicine)
    {
        $medicine->name = $request->name;
        $medicine->description = $request->description;

        $medicine->save();

        return new MedicineResource($medicine);
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
