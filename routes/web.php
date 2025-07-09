<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// ADMIN
use App\Http\Controllers\Admin\FilmController as AdminFilmController;
use App\Http\Controllers\Admin\SalleController as AdminSalleController;
use App\Http\Controllers\Admin\SeanceController as AdminSeanceController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;

// USER
use App\Http\Controllers\User\FilmController as UserFilmController;
use App\Http\Controllers\User\SeanceController as UserSeanceController;
use App\Http\Controllers\User\ReservationController as UserReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/



Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('/conditions-generales', 'conditions')->name('conditions.generales');

// Redirection après login selon le rôle
Route::get('/redirect', function () {
    return auth()->user()->role === 'admin'
        ? redirect()->route('admin.dashboardA')
        : redirect()->route('user.dashboardU');
})->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Dashboard User
// Route::get('/dashboardU', function () {
//     return view('user.dashboardU');
// })->middleware(['auth'])->name('user.dashboardU');

// Dashboard Admin
// Route::get('/dashboardA', function () {
//     return view('admin.dashboardA');
// })->middleware(['auth'])->name('admin.dashboardA');



//  Interface User
Route::middleware(['auth'])->name('user.')->group(function () {
    // Films
    Route::get('/films', [UserFilmController::class, 'index'])->name('films.index');
    Route::get('/films/{id}', [UserFilmController::class, 'show'])->name('films.show');
    Route::get('/dashboardU', [UserFilmController::class, 'dashboardU'])->name('dashboardU');
    // Réservations
    // Route::resource('reservations', UserReservationController::class)->except('edit', 'update');
    Route::get('/reservations', [UserReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reservations/create/{seance}', [UserReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [UserReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservations/{id}', [UserReservationController::class, 'show'])->name('reservations.show');
    Route::delete('/reservations/{id}', [UserReservationController::class, 'destroy'])->name('reservations.destroy');
    Route::post('/reservations/{id}/payer', [UserReservationController::class, 'payer'])->name('reservations.payer');
});


// Interface Admin
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/dashboardA', [AdminFilmController::class, 'dashboardA'])->name('dashboardA');

    Route::resource('films', AdminFilmController::class);
    Route::resource('salles', AdminSalleController::class);
    Route::resource('seances', AdminSeanceController::class);
    Route::resource('categories', AdminCategoryController::class);

});



Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
