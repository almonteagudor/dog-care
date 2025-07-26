<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Allergy\StoreAllergyRequest;
use App\Http\Requests\Api\Allergy\UpdateAllergyRequest;
use App\Http\Resources\Api\AllergyResource;
use App\Models\Allergy;
use Illuminate\Http\Response;

class AllergyController extends Controller
{
    public function index()
    {
        $allergies = Allergy::all();

        return AllergyResource::collection($allergies);
    }

    public function store(StoreAllergyRequest $request)
    {
        $allergy = new Allergy();

        $allergy->name = $request->name;
        $allergy->description = $request->description;

        $allergy->save();

        return new AllergyResource($allergy);
    }

    public function show(Allergy $allergy)
    {
        return new AllergyResource($allergy);
    }

    public function update(UpdateAllergyRequest $request, Allergy $allergy)
    {
        $allergy->name = $request->name;
        $allergy->description = $request->description;

        $allergy->save();

        return new AllergyResource($allergy);
    }

    public function destroy(Allergy $allergy)
    {
        $allergy->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
