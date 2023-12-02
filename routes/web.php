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

Route::get('pages/sports', function () {
    return view('pages.sports');
});



Route::get('pages/classement', function () {
    return view('pages.classement');
});

Route::get('events/handball', function () {
    return view('events.handball');
});

Route::get('events/sumo', function () {
    return view('events.sumo');
});

Route::get('events/TouchRugby', function () {
    return view('events.TouchRugby');
});

Route::get('events/lazerRun', function () {
    return view('events.lazerRun');
});

Route::get('events/futsal', function () {
    return view('events.futsal');
});

Route::get('events/paletsBretons', function () {
    return view('events.paletsBretons');
});


Route::get('events/badminton', function () {
    return view('events.badminton');
});


Route::get('events/relaisCrossfit', function () {
    return view('events.relaisCrossfit');
});

Route::get('events/volley', function () {
    return view('events.volley');
});

Route::get('events/basket', function () {
    return view('events.basket');
});

Route::get('events/relaisMarathon', function () {
    return view('events.relaisMarathon');
});

Route::get('events/relais', function () {
    return view('events.relais');
});

Route::get('pages/equipes', [App\Http\Controllers\TeamController::class, 'equipes'])->name('pages.equipes');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('home', function () {
        return view('pages.home');
    })->name('home');
});

Route::middleware(['admin_or_organizer'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.dashboard');
});

//Route [verification.notice] not defined.
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/theme/{theme}', function ($theme) {
    session(['theme' => $theme]);
    return back();
})->name('theme.switch');

Route::get('pages/settings', function () {
    return view('pages.settings');
})->middleware(['auth'])->name('pages/settings');

Route::get('/dashboard/usersChartData', [\App\Http\Controllers\DashboardController::class, 'usersChartData']);


Route::middleware(['admin_or_organizer'])->group(function () {
    Route::get('/dashboard/users', [\App\Http\Controllers\UserController::class, 'index'])->name('dashboard.dashboard-users');
});

Route::middleware(['admin_or_organizer'])->group(function () {
    Route::get('/dashboard/teams', [\App\Http\Controllers\TeamController::class, 'index'])->name('dashboard.dashboard-teams');
});



Route::get('/dashboard/events', [App\Http\Controllers\EventController::class, 'index'])->name('dashboard.dashboard-event');
Route::get('/dashboard/events/search', [App\Http\Controllers\EventController::class, 'search'])->name('events.search');
Route::put('/dashboard/events/update/{id}', [App\Http\Controllers\EventController::class, 'update'])->name('events.update');
Route::get('/dashboard/events/create', [App\Http\Controllers\EventController::class, 'create'])->name('events.create');
Route::post('/dashboard/events/destroy-selected', [App\Http\Controllers\EventController::class, 'destroySelected'])->name('events.destroySelected');
Route::post('/dashboard/events/store', [App\Http\Controllers\EventController::class, 'store'])->name('events.store');

Route::get('/dashboard/events/{id}/phase', [App\Http\Controllers\PhaseController::class, 'index'])->name('dashboard.dashboard-phase');
Route::get('/dashboard/events/{id}/phase/create', [App\Http\Controllers\PhaseController::class, 'create_phase'])->name('events.phase.create');
Route::post('/dashboard/events/{id}/phase/store', [App\Http\Controllers\PhaseController::class, 'store'])->name('phase.store');
Route::post('/dashboard/events/{id}/phase/destroy-selected', [App\Http\Controllers\PhaseController::class, 'destroySelected'])->name('phase.destroySelected');



Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

Route::post('/dashboard/users/destroy-selected', [App\Http\Controllers\UserController::class, 'destroySelected'])->name('users.destroySelected');

Route::get('/dashboard/users/search', [App\Http\Controllers\UserController::class, 'search'])->name('users.search');

Route::post('/dashboard/users/reset-profile-photo', [App\Http\Controllers\UserController::class, 'resetProfilePhoto'])->name('users.resetProfilePhoto');

Route::get('/dashboard/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');

Route::post('/dashboard/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');


Route::put('/dashboard/teams/update/{id}', [App\Http\Controllers\TeamController::class, 'update'])->name('teams.update');
Route::get('/dashboard/teams/search', [App\Http\Controllers\TeamController::class, 'search'])->name('teams.search');
//reset  profile photo
Route::post('/dashboard/teams/resetTeamImage', [App\Http\Controllers\TeamController::class, 'resetTeamImage'])->name('teams.resetTeamImage');
// create team
Route::get('/dashboard/teams/create', [App\Http\Controllers\TeamController::class, 'create'])->name('teams.create');
// store team
Route::post('/dashboard/teams/store', [App\Http\Controllers\TeamController::class, 'store'])->name('teams.store');
// destroy team
Route::delete('/dashboard/teams/{team}', [App\Http\Controllers\TeamController::class, 'destroy'])->name('teams.destroy');
// destroy selected team
Route::post('/dashboard/teams/destroy-selected', [App\Http\Controllers\TeamController::class, 'destroySelected'])->name('teams.destroySelected');

//show team 
Route::get('/myteam', [App\Http\Controllers\TeamController::class, 'monequipe'])->name('teams.show');
Route::post('/teams/join', [App\Http\Controllers\TeamController::class, 'joinTeam'])->name('teams.join');
Route::get('/teams/createnew', [App\Http\Controllers\TeamController::class, 'createnew'])->name('teams.createnew');
Route::post('/teams/{team}/leave', [App\Http\Controllers\TeamController::class, 'leaveTeam'])->name('teams.leave');
Route::get('/teams/{team}/edit', [App\Http\Controllers\TeamController::class, 'edit'])->name('teams.edit');



Route::post('/team/{team}/events/{event}/register', [App\Http\Controllers\TeamController::class, 'registerEvent'])->name('team.registerEvent');
Route::delete('/team/{team}/events/{event}/unregister', [App\Http\Controllers\TeamController::class, 'unregisterEvent'])->name('team.unregisterEvent');
Route::post('/team/{team}/events/{event}/increment', [App\Http\Controllers\TeamController::class, 'incrementOrder'])->name('team.incrementOrder');
Route::post('/team/{team}/events/{event}/decrement', [App\Http\Controllers\TeamController::class, 'decrementOrder'])->name('team.decrementOrder');


