<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adoption;

class AdoptionController extends Controller
{
    public function index()
{
    $adoptions = Adoption::with(['pet', 'adopter'])
        ->orderBy('date_adopted', 'desc')
        ->paginate(10);

    return view('adoptions.index', compact('adoptions'));
}
}
