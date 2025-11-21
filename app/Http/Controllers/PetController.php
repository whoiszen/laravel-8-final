<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::with('adoption.adopter')
        ->orderBy('id', 'asc')->orderBy('status')->orderBy('type')
        ->paginate(10);
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'age' => 'nullable|integer|min:0',
            'status' => 'required|in:available,adopted'
        ]);

        Pet::create($data);

        return redirect()->route('pets.index')->with('success', 'Pet created successfully.');
    }

    public function show(Pet $pet)
    {
        return view('pets.show', compact('pet'));
    }

    public function edit(Pet $pet)
    {
        return view('pets.edit', compact('pet'));
    }

    public function update(Request $request, Pet $pet)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'age' => 'nullable|integer|min:0',
            'status' => 'required|in:available,adopted'
        ]);

        $pet->update($data);

        return redirect()->route('pets.show', $pet)->with('success', 'Pet updated.');
    }

    public function destroy(Pet $pet)
    {
        // prevent deleting if adopted (optional)
        if ($pet->status === 'adopted') {
            return redirect()->back()->with('error', 'Cannot delete an adopted pet.');
        }

        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'Pet deleted.');
    }
}
