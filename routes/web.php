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



Route::get('pages/classement', [App\Http\Controllers\TeamController::class, 'classement'])->name('pages.classement');

Route::get('/events/badminton', [App\Http\Controllers\SportController::class, 'badminton'])->name('events.badminton');


Route::get('/events/basket', [App\Http\Controllers\SportController::class, 'basket'])->name('events.basket');


Route::get('/events/futsal', [App\Http\Controllers\SportController::class, 'futsal'])->name('events.futsal');


Route::get('/events/handball', [App\Http\Controllers\SportController::class, 'handball'])->name('events.handball');


Route::get('/events/laserRun', [App\Http\Controllers\SportController::class, 'laserRun'])->name('events.laserRun');


//sumo 
Route::get('/events/sumo', [App\Http\Controllers\SportController::class, 'sumo'])->name('events.sumo');

//TouchRugby
Route::get('/events/TouchRugby', [App\Http\Controllers\SportController::class, 'touchRugby'])->name('events.TouchRugby');

//Volley
Route::get('/events/volley', [App\Http\Controllers\SportController::class, 'volley'])->name('events.volley');

//paletsBretons
Route::get('/events/paletsBretons', [App\Http\Controllers\SportController::class, 'paletsBretons'])->name('events.paletsBretons');

//relaisCrossfit
Route::get('/events/relaisCrossfit', [App\Http\Controllers\SportController::class, 'relaisCrossfit'])->name('events.relaisCrossfit');

//relaisMarathon
Route::get('/events/relaisMarathon', [App\Http\Controllers\SportController::class, 'relaisMarathon'])->name('events.relaisMarathon');

//relais

Route::get('/events/relais', [App\Http\Controllers\SportController::class, 'relais'])->name('events.relais');

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


//events

Route::delete('/events/delete/{event_id}', [PhaseController::class, 'delete_event'])->name('delete.event');
Route::delete('/events/destroySelected', [PhaseController::class, 'destroySelected'])->name('destroySelected.event');


//phases
Route::get('/dashboard/phases', [App\Http\Controllers\PhaseController::class, 'index'])->name('dashboard.dashboard-phases');
// search 
Route::get('/dashboard/phases/search', [App\Http\Controllers\PhaseController::class, 'search'])->name('phases.search');
// update
Route::put('/dashboard/phases/update/{id}', [App\Http\Controllers\PhaseController::class, 'update'])->name('phases.update');
// Create
Route::get('/dashboard/phases/create', [App\Http\Controllers\PhaseController::class, 'create_phasenew'])->name('phases.create_phasenew');
// create_phase post
Route::post('/dashboard/phases/store', [App\Http\Controllers\PhaseController::class, 'store'])->name('phases.store');
//destroySelectedPhases
Route::post('/dashboard/phases/destroySelectedPhases', [App\Http\Controllers\PhaseController::class, 'destroySelectedPhases'])->name('phases.destroySelectedPhases');


//groups 
Route::get('/dashboard/groups', [App\Http\Controllers\PhaseController::class, 'index_groups'])->name('dashboard.dashboard-groups');
// search_groups
Route::get('/dashboard/groups/search', [App\Http\Controllers\PhaseController::class, 'search_groups'])->name('groups.search_groups');
// update_groups
Route::put('/dashboard/groups/update/{id}', [App\Http\Controllers\PhaseController::class, 'update_groups'])->name('groups.update_groups');
// create_groupnew
Route::get('/dashboard/groups/create', [App\Http\Controllers\PhaseController::class, 'create_groupnew'])->name('groups.create_groupnew');
// destroySelectedGroups
Route::post('/dashboard/groups/destroySelected', [App\Http\Controllers\PhaseController::class, 'destroySelectedGroups'])->name('groups.destroySelected');
// store_groups
Route::post('/dashboard/groups/store', [App\Http\Controllers\PhaseController::class, 'store_groups'])->name('groups.store_groups');

///dashboard/matches
Route::get('/dashboard/matches', [App\Http\Controllers\PhaseController::class, 'index_matches'])->name('dashboard.dashboard-matches');
// search_matches
Route::get('/dashboard/matches/search', [App\Http\Controllers\PhaseController::class, 'search_matches'])->name('matches.search_matches');
// update_matches
Route::put('/dashboard/matches/update/{id}', [App\Http\Controllers\PhaseController::class, 'update_matches'])->name('matches.update_matches');
// create_matchenew
Route::get('/dashboard/matches/create', [App\Http\Controllers\PhaseController::class, 'create_matchenew'])->name('matches.create_matchenew');
// store_matches
Route::post('/dashboard/matches/store', [App\Http\Controllers\PhaseController::class, 'store_matches'])->name('matches.store_matches');
// destroySelectedMatches
Route::post('/dashboard/matches/destroySelected', [App\Http\Controllers\PhaseController::class, 'destroySelectedMatches'])->name('matches.destroySelectedmatches');

Route::get('/dashboard/events/{id}/phase/create', [App\Http\Controllers\PhaseController::class, 'create_phase'])->name('events.phase.create');
Route::post('/dashboard/events/{id}/phase/store', [App\Http\Controllers\PhaseController::class, 'store'])->name('phase.store');
Route::post('/dashboard/events/{id}/phase/destroy-selected', [App\Http\Controllers\PhaseController::class, 'destroySelected'])->name('phase.destroySelected');







// saisie 
Route::get('/dashboard/saisie', [App\Http\Controllers\SaisieController::class, 'index'])->name('dashboard.dashboard-saisie');
// store points
Route::post('/dashboard/saisie/store', [App\Http\Controllers\SaisieController::class, 'storePoints'])->name('matches.store_points');



Route::get('/api/phases/{eventId}',[App\Http\Controllers\SaisieController::class, 'getPhasesByEvent']);
Route::get('/api/matches/{phaseId}', [App\Http\Controllers\SaisieController::class, 'getMatchesByPhase']);



Route::post('/team/{team}/events/{event}/register', [App\Http\Controllers\TeamController::class, 'registerEvent'])->name('team.registerEvent');
Route::delete('/team/{team}/events/{event}/unregister', [App\Http\Controllers\TeamController::class, 'unregisterEvent'])->name('team.unregisterEvent');
Route::post('/team/{team}/events/{event}/increment', [App\Http\Controllers\TeamController::class, 'incrementOrder'])->name('team.incrementOrder');
Route::post('/team/{team}/events/{event}/decrement', [App\Http\Controllers\TeamController::class, 'decrementOrder'])->name('team.decrementOrder');


