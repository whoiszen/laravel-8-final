<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adopter extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'contact_number'];

    // An adopter can adopt many pets => hasMany Adoption
    public function adoptions()
    {
        return $this->hasMany(Adoption::class);
    }

    // direct pets via adoptions
    public function pets()
    {
        return $this->hasManyThrough(Pet::class, Adoption::class, 'adopter_id', 'id', 'id', 'pet_id');
    }
}
