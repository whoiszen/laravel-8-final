<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AdopterController;
use App\Http\Controllers\AdoptionController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pets', [PetController::class, 'index'])->name('pets.index');
Route::get('/adopters', [AdopterController::class, 'index'])->name('adopters.index');
Route::get('/adoptions', [AdoptionController::class, 'index'])->name('adoptions.index');
