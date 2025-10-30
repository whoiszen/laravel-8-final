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
}
