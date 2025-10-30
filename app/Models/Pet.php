<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'age', 'status'];

    // A pet can be adopted once => hasOne Adoption
    public function adoption()
    {
        return $this->hasOne(Adoption::class);
    }

    // Through relationship: adopter (nullable)
    public function adopter()
    {
        return $this->hasOneThrough(Adopter::class, Adoption::class, 'pet_id', 'id', 'id', 'adopter_id');
    }
}
