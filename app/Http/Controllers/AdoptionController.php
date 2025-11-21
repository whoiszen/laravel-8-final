<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adoption;
use App\Models\Pet;
use App\Models\Adopter as AdopterModel;

class AdoptionController extends Controller
{
    public function index()
{
    $adoptions = Adoption::with(['pet', 'adopter'])
        ->orderBy('date_adopted', 'desc')
        ->paginate(10);

    return view('adoptions.index', compact('adoptions'));
}

    public function create()
    {
        $pets = Pet::where('status', 'available')->get();
        $adopters = AdopterModel::all();
        return view('adoptions.create', compact('pets', 'adopters'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'adopter_id' => 'required|exists:adopters,id',
            'date_adopted' => 'required|date'
        ]);

        // create adoption and mark pet adopted
        $adoption = Adoption::create($data);

        $pet = Pet::find($data['pet_id']);
        if ($pet) {
            $pet->update(['status' => 'adopted']);
        }

        return redirect()->route('adoptions.index')->with('success', 'Adoption recorded.');
    }

    public function destroy(Adoption $adoption)
    {
        // mark pet available again
        $pet = $adoption->pet;
        if ($pet) {
            $pet->update(['status' => 'available']);
        }

        $adoption->delete();

        return redirect()->route('adoptions.index')->with('success', 'Adoption removed.');
    }
}
