<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adopter;

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
}
