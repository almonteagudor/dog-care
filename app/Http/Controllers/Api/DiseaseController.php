<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Disease\StoreDiseaseRequest;
use App\Http\Requests\Api\Disease\UpdateDiseaseRequest;
use App\Http\Resources\Api\DiseaseResource;
use App\Models\Disease;
use Illuminate\Http\Response;

class DiseaseController extends Controller
{
    public function index()
    {
        $diseases = Disease::all();

        return DiseaseResource::collection($diseases);
    }

    public function store(StoreDiseaseRequest $request)
    {
        $disease = new Disease();

        $disease->name = $request->name;
        $disease->description = $request->description;

        $disease->save();

        return new DiseaseResource($disease);
    }

    public function show(Disease $disease)
    {
        return new DiseaseResource($disease);
    }

    public function update(UpdateDiseaseRequest $request, Disease $disease)
    {
        $disease->name = $request->name;
        $disease->description = $request->description;

        $disease->save();

        return new DiseaseResource($disease);
    }

    public function destroy(Disease $disease)
    {
        $disease->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
