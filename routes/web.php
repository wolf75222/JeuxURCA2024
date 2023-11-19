<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/sports', function () {
    return view('sports');
});



Route::get('/classement', function () {
    return view('classement');
});

Route::get('/handball', function () {
    return view('handball');
});

Route::get('/sumo', function () {
    return view('sumo');
});

Route::get('/TouchRugby', function () {
    return view('TouchRugby');
});

Route::get('/lazerRun', function () {
    return view('lazerRun');
});

Route::get('/futsal', function () {
    return view('futsal');
});

Route::get('/paletsBretons', function () {
    return view('paletsBretons');
});


Route::get('/badminton', function () {
    return view('badminton');
});


Route::get('/relaisCrossfit', function () {
    return view('relaisCrossfit');
});

Route::get('/volley', function () {
    return view('volley');
});

Route::get('/basket', function () {
    return view('basket');
});

Route::get('/relaisMarathon', function () {
    return view('relaisMarathon');
});

Route::get('/relais', function () {
    return view('relais');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('home', function () {
        return view('home');
    })->name('home');
});

Route::middleware(['admin_or_organizer'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Route [verification.notice] not defined.
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/theme/{theme}', function ($theme) {
    session(['theme' => $theme]);
    return back();
})->name('theme.switch');

Route::get('/settings', function () {
    return view('settings');
})->middleware(['auth'])->name('settings');