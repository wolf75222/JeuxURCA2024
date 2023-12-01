<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\AjaxController;
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

Route::post('/ajax/getTeams', [AjaxController::class, 'getTeams']);

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/resultats', [GroupController::class, 'showGroup'])->name('resultats');

Route::get('/epreuves', function () {
    return view('epreuves');
})->name('epreuves');

Route::get('/actualites', function () {
    return view('news');
})->name('actualites');

Route::get('/connection', function () {
    return view('connection');
})->name('connection');

use App\Http\Controllers\PhaseController;
Route::post('/phases/{event_id}/create', [PhaseController::class, 'store'])->name('create.phase');
Route::delete('/phases/delete/{phase_id}', [PhaseController::class, 'delete'])->name('delete.phase');

Route::post('/events/create', [PhaseController::class, 'create_event'])->name('create.event');
Route::delete('/events/delete/{event_id}', [PhaseController::class, 'delete_event'])->name('delete.event');


Route::post('/phases/{phase_id}/create/group', [PhaseController::class, 'create_group'])->name('create.group');
Route::delete('/phase/{group_id}/delete/group', [PhaseController::class, 'delete_group'])->name('delete.group');
Route::post('/phases/{group_id}/add/team/to/group', [PhaseController::class, 'add_team_to_group'])->name('add.team.to.group');
Route::delete('/phases/{group_id}/{team_id}/remove/team/to/group', [PhaseController::class, 'remove_team_to_group'])->name('remove.team.to.group');
Route::post('/phases/update/groups/points', [PhaseController::class, 'update_groups_points'])->name('update.groups.points');
Route::post('/phases/update/matches/results', [PhaseController::class, 'update_matches_results'])->name('update.matches.results');
Route::post('/phases/update/score', [PhaseController::class, 'update_score_phase'])->name('update.score.phase');


Route::post('/phases/{phase_id}/create/match', [PhaseController::class, 'create_match'])->name('create.match');
Route::delete('/phase/{match_id}/delete/match', [PhaseController::class, 'delete_match'])->name('delete.match');


use App\Http\Controllers\TeamController;
Route::get('/monequipe', [TeamController::class, 'monequipe'])->name('monequipe');
Route::post('/teams/{team}/join', [TeamController::class, 'joinTeam'])->name('join.team');
Route::post('/teams/create', [TeamController::class, 'store'])->name('create.team');
Route::put('/teams/update/{id}', [TeamController::class, 'update'])->name('update.team');
Route::post('/teams/{team}/leave', [TeamController::class, 'leaveTeam'])->name('leave.team');
Route::post('/teams/score', [TeamController::class, 'update_score'])->name('update.score.teams');

Route::post('/team/{team}/events/{event}/register', [TeamController::class, 'registerEvent'])->name('team.registerEvent');
Route::delete('/team/{team}/events/{event}/unregister', [TeamController::class, 'unregisterEvent'])->name('team.unregisterEvent');
Route::post('/team/{team}/events/{event}/increment', [TeamController::class, 'incrementOrder'])->name('team.incrementOrder');
Route::post('/team/{team}/events/{event}/decrement', [TeamController::class, 'decrementOrder'])->name('team.decrementOrder');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['permission:create staff & edit staff & delete staff']], function () {
    Route::get('/staff/management', [\App\Http\Controllers\StaffManagement::class, 'index'])->name('staff.management');
    Route::delete('/staff/{user}', [\App\Http\Controllers\StaffManagement::class, 'delete'])->name('staff.delete');
});

require __DIR__.'/auth.php';
