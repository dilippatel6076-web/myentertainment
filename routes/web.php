<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::view('/', 'login')->name('login');
Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');

Route::post('/check', [AuthController::class, 'index'])->name('login.check');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
Route::get('/biodata', function () {
    return view('biodata');
});
/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (MIDDLEWARE GROUP)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () { 
        Route::get('/dashboard', function () {
        return view('dashboard');
    });

    /*
    |--------------------------------------------------------------------------
    | MOVIE ROUTES
    |--------------------------------------------------------------------------
    */
    Route::get('/movies', [MovieController::class, 'index']);
    Route::post('/movies/show', [MovieController::class, 'store'])->name('movies.store');
    Route::get('/view/{id}', [MovieController::class, 'view'])->name('view');
    Route::get('/edit/{id}', [MovieController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [MovieController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [MovieController::class, 'delete'])->name('delete');
    Route::get('/add_product', [AddProductController::class, 'index']);
    /*
    |--------------------------------------------------------------------------
    | ARTIST ROUTES
    |--------------------------------------------------------------------------
    */
    Route::get('/artist_list', [ArtistController::class, 'index']);
    Route::get('/add_artist', [ArtistController::class, 'add'])->name('add_artist');
    Route::post('/artist/store', [ArtistController::class, 'store'])->name('artist.store');
    Route::get('/artist_edit/{id}', [ArtistController::class, 'edit'])->name('artist_edit');
    Route::put('/artist_update/{id}', [ArtistController::class, 'update'])->name('artist_update');
    Route::get('/artist_delete/{id}', [ArtistController::class, 'destroy'])->name('artist_delete');

});