<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('Accueil.index');});

// Routes pour l'inscription et la connexion
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [AuthController::class, 'handleSignup'])->name('signup.handle');
Route::get('/signin', [AuthController::class, 'showSigninForm'])->name('signin.form');
Route::post('/signin', [AuthController::class, 'handleSignin'])->name('signin.handle');


// Routes pour les tableaux de bord
Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/client-dashboard', [ClientController::class, 'index'])->name('client.dashboard');