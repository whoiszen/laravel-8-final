<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Adopter;
use App\Models\Adoption;

class HomeController extends Controller
{
    public function index()
    {
        // Gather dashboard stats and featured pets
        $totalPets = Pet::count();
        $availablePets = Pet::where('status', 'available')->count();
        $adoptedPets = Pet::where('status', 'adopted')->count();
        $pendingPets = Pet::where('status', 'pending')->count();

        $totalAdopters = Adopter::count();

        $recentAdoptions = Adoption::with(['pet','adopter'])->latest('date_adopted')->take(5)->get();

        $featured = Pet::where('status','available')->inRandomOrder()->take(6)->get();

        return view('home.index', compact('featured','totalPets','availablePets','adoptedPets','pendingPets','totalAdopters','recentAdoptions'));
    }
}
