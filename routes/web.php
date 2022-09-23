<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function() {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('preferences', PreferenceController::class)->except(['index', 'show', 'destroy']);
    Route::resource('users', UserController::class)->only(['edit', 'update']);
});


Route::get('/auth/redirect', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
 
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('google.callback');

require __DIR__.'/auth.php';
