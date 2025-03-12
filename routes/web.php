<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index']);

Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);

Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');

Route::middleware('guest')->group(function () {

    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);

});

Route::middleware('auth')->group(function () {
    // View profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    // Edit profile Name
    Route::get('/profile/editName', [ProfileController::class, 'editName'])->name('profile.editName');
    Route::put('/profile/updateName', [ProfileController::class, 'updateName'])->name('profile.updateName');

    // Edit profile Email
    Route::get('/profile/editEmail', [ProfileController::class, 'editEmail'])->name('profile.editEmail');
    Route::put('/profile/updateEmail', [ProfileController::class, 'updateEmail'])->name('profile.updateEmail');

    // Edit profile Password
    Route::get('/profile/editPassword', [ProfileController::class, 'editPassword'])->name('profile.editPassword');
    Route::put('/profile/updatePassword', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

    // Edit profile Password
    Route::post('/profile/update-logo', [ProfileController::class, 'updateLogo'])->name('profile.updateLogo');

});



Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');



