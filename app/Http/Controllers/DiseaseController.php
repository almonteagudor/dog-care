<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\Disease\StoreDiseaseRequest;
use App\Http\Requests\Api\Disease\UpdateDiseaseRequest;
use App\Models\Disease;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DiseaseController extends Controller
{
    public function index(): View
    {
        $diseases = Disease::all();

        return view('disease.index', compact('diseases'));
    }

    public function create(): View
    {
        return view('disease.create');
    }

    public function store(StoreDiseaseRequest $request)
    {
        $disease = new Disease;

        $disease->name = $request->name;
        $disease->description = $request->description;

        $disease->save();

        return redirect('/diseases');
    }

    /**
     * Display the specified resource.
     */
    public function show(Disease $disease)
    {
        return view('disease.show', compact('disease'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disease $disease)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiseaseRequest $request, Disease $disease)
    {
        //
    }

    public function destroy(Disease $disease): RedirectResponse
    {
        $disease->delete();

        return redirect()->route('diseases.index')->with('success', 'Elemento eliminado correctamente');

    }
}
