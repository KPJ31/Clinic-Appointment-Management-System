<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function index()
    {
        $specializations = Specialization::all();

        return view('specializations.index', compact('specializations'));
    }

    public function create()
    {
        return view('specializations.create');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        Specialization::create($validated);

        return redirect()->route('specialIndex')->with('success', 'Specialization Created Successfully');
    }

    public function show(Specialization $specialization)
    {
        return view('specializations.show', compact('specialization'));
    }

    public function edit(Specialization $specialization)
    {
        return view('specializations.edit', compact('specialization'));
    }

    public function update(Request $request, Specialization $specialization)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $specialization->update($validated);

        return redirect()->route('specialIndex')->with('success', 'Specialization Updated Successfully');
    }

    public function delete(Specialization $specialization)
    {
        $specialization->delete();

        return redirect()->route('specialIndex')->with('success', 'Specialization Deleted Successfully');
    }
}
