<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\Admin\ListingImageGalleryController;
use App\Http\Controllers\Admin\ListingScheduleController;
use App\Http\Controllers\Admin\ListingVideoGalleryController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

// Admin route
Route::get('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login')->middleware('guest');

Route::get('/admin/forget-password', [AdminAuthController::class, 'passwordRequest'])
    ->name('admin.password.request');


Route::group([
    'middleware' => ['auth', 'user.type:admin'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    // Menambahkan prefix admin di url dan juga admin. di view
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dasboard.index');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile-password', [ProfileController::class, 'updatePassword'])->name('profile-password.update');

    // Hero Routes
    Route::get('/hero', [HeroController::class, 'index'])->name('hero.index');
    Route::put('/hero', [HeroController::class, 'update'])->name('hero.update');

    // Category Routes
    Route::resource('/category', CategoryController::class);

    // Location Routes
    Route::resource('/location', LocationController::class);

    // Amenity Routes
    Route::resource('/amenity', AmenityController::class);

    // Listing Routes
    Route::resource('/listing', ListingController::class);

    // Listing Image Gallery
    Route::resource('/listing-image-gallery', ListingImageGalleryController::class);

    // Listing Video Gallery
    Route::resource('/listing-video-gallery', ListingVideoGalleryController::class);

    // Listing Schedule
    Route::get('/listing-schedule/{listing_id}', [ListingScheduleController::class, 'index'])->name('listing-schedule.index');
    // Create
    Route::get('/listing-schedule/{listing_id}/create', [ListingScheduleController::class, 'create'])->name('listing-schedule.create');
    // Store
    Route::post('/listing-schedule/{listing_id}', [ListingScheduleController::class, 'store'])->name('listing-schedule.store');
    // Edit
    Route::get('/listing-schedule/{id}/edit', [ListingScheduleController::class, 'edit'])->name('listing-schedule.edit');
    // update
    Route::put('/listing-schedule/{id}', [ListingScheduleController::class, 'update'])->name('listing-schedule.update');
    // Delete
    Route::delete('/listing-schedule/{id}', [ListingScheduleController::class, 'destroy'])->name('listing-schedule.destroy');
});
