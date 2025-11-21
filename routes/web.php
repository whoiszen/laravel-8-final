<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AdopterController;
use App\Http\Controllers\AdoptionController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('pets', PetController::class);
Route::resource('adopters', AdopterController::class);
Route::resource('adoptions', AdoptionController::class)->only(['index','create','store','destroy']);
