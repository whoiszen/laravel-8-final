<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Adoption;
use App\Models\Pet;
use App\Models\Adopter;
use Illuminate\Support\Facades\DB;

class AdoptionSeeder extends Seeder
{
    public function run()
    {
        // We'll create 8 adoptions. Ensure each pet is adopted once and status changes to 'adopted'.
        $availablePets = Pet::where('status', 'available')->inRandomOrder()->take(15)->get();
        $adopters = Adopter::inRandomOrder()->take(15)->get();

        // If fewer adopters than needed, reuse some
        if ($adopters->count() < $availablePets->count()) {
            $extra = Adopter::factory()->count($availablePets->count() - $adopters->count())->create();
            $adopters = $adopters->concat($extra);
        }

        $i = 0;
        foreach ($availablePets as $pet) {
            $adopter = $adopters[$i++] ?? $adopters->random();
            // create adoption
            Adoption::create([
                'pet_id' => $pet->id,
                'adopter_id' => $adopter->id,
                'date_adopted' => now()->subDays(rand(1,300))->toDateString(),
            ]);
            // update pet status
            $pet->update(['status' => 'adopted']);
        }
    }
}
