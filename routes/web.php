<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\SocieteController;
use App\Http\Controllers\SearchController;

// ...

Route::get('/search', [SearchController::class, 'search'])->name('search');



// ...

Route::get('/societe/{id}', [SocieteController::class, 'show'])->name('societe.show');





// Définir la route pour la création d'une annonce
Route::post('/annonces', [AnnonceController::class, 'store'])->name('annonces.store');

Route::view('/', 'welcome')->name('welcome');

Route::resource('utilisateurs', UtilisateurController::class);

Route::resource('annonceurs', App\Http\Controllers\AnnonceurController::class);
// routes/web.php
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('annonceurs', function () {
    return view('annonceurs.index');
})->name('annonceurs.index');// routes/web.php