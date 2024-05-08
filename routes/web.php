<?php

use App\Http\Controllers\Frontend\AgentListingController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ProfileController as FrontendProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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




Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'user',
    'as' => 'user.'
], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); //user.dashboard
    Route::get('/profile', [FrontendProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [FrontendProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile-password', [FrontendProfileController::class, 'updatePassword'])->name('profile-password.update');

    // Agent Listing
    Route::resource('/listing', AgentListingController::class);
});

require __DIR__ . '/auth.php';
