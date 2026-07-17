<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('servies.index', compact('services'));
    }

    public function create()
    {
        return view('servies.create');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'fee' => 'required|numeric|min:0',
        ]);

        Service::create($validated);

        return redirect()->route('serviceIndex')->with('success', 'Service Created Successfully');
    }

    public function show(Service $service)
    {
        return view('servies.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('servies.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'fee' => 'required|numeric|min:0',
        ]);

        $service->update($validated);

        return redirect()->route('serviceIndex')->with('success', 'Service Updated Successfully');
    }

    public function delete(Service $service)
    {
        $service->doctors()->sync([]);
        $service->delete();

        return redirect()->route('serviceIndex')->with('success', 'Service Deleted Successfully');
    }
}
