<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MerchandiseTypeController;
use App\Models\Merchandise;

use Illuminate\Support\Facades\Auth;


Route::view('login', 'login')
        ->name('login');

Route::get('/dashboard', function () {
    // Get merchandise for the logged-in user
    $merchandise = Merchandise::with('merchandiseType')
        ->where('user_id', auth()->id())
        ->get();

    return view('dashboard', compact('merchandise'));
})->middleware(['auth'])->name('dashboard');


Route::view('profile', 'profile')
        ->middleware(['auth'])
        ->name('profile');

Route::get('', function () {
    return view('welcome');
});
Route::view('/', 'welcome');

Route::resource('merchandise', MerchandiseController::class);
Route::resource('events', EventController::class);
Route::resource('merchandise_types', MerchandiseTypeController::class);
Route::middleware('auth')->group(function () {
Route::resource('merchandise', MerchandiseController::class);
});

require __DIR__.'/auth.php';


Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/'); // redirect to homepage after logout
})->name('logout');



