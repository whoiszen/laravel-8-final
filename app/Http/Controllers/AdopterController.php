<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adopter;
use Illuminate\Http\RedirectResponse;

class AdopterController extends Controller
{
    public function index()
    {
        // load adopters with their adoptions and adopted pets
        // only show adopters who have at least one adoption and paginate results
        $perPage = 10; // adjust as needed
        $adopters = Adopter::has('adoptions')
            ->with('adoptions.pet')
            ->orderBy('id', 'asc')
            ->paginate($perPage);
        return view('adopters.index', compact('adopters'));
    }

    public function create()
    {
        return view('adopters.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:50'
        ]);

        Adopter::create($data);

        return redirect()->route('adopters.index')->with('success', 'Adopter created.');
    }

    public function show(Adopter $adopter)
    {
        return view('adopters.show', compact('adopter'));
    }

    public function edit(Adopter $adopter)
    {
        return view('adopters.edit', compact('adopter'));
    }

    public function update(Request $request, Adopter $adopter)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'nullable|string|max:50'
        ]);

        $adopter->update($data);

        return redirect()->route('adopters.show', $adopter)->with('success', 'Adopter updated.');
    }

    public function destroy(Adopter $adopter)
    {
        // allow delete only if adopter has no adoptions
        if ($adopter->adoptions()->exists()) {
            return redirect()->back()->with('error', 'Cannot delete adopter with adoption records.');
        }

        $adopter->delete();
        return redirect()->route('adopters.index')->with('success', 'Adopter deleted.');
    }
}
