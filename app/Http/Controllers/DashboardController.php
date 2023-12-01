<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Team;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $adminCount = User::role('admin')->count(); // Assurez-vous que le rôle 'admin' existe.
        $organizerCount = User::role('organizer')->count(); // Assurez-vous que le rôle 'organizer' existe.
        $teamLeaderCount = User::role('team leader')->count(); // Assurez-vous que le rôle 'team leader' existe.
        // derniers utilisateurs inscrit created_at
        $lastUsers = User::orderBy('created_at', 'desc')->take(3)->get();

        //role des derniers utilisateurs inscrit
        $roles = Role::all();

        $teams = Team::all();

        // Envoyez toutes les données à la vue
        return view('dashboard.dashboard', compact('userCount', 'adminCount', 'organizerCount', 'teamLeaderCount', 'lastUsers' , 'roles' , 'teams'));
    }

    public function usersChartData()
    {
        $usersData = User::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as users'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return response()->json($usersData);
    }

    public function prepareUsersChartData()
    {
        $chartData = $this->usersChartData();

        $userData = [
            'data' => $chartData->pluck('users'),
            'categories' => $chartData->pluck('date'),
        ];

        return view('dashboard', compact('userData'));
    }

    public function countUsers()
    {
        $userCount = User::count();
        return $userCount;
    }

    public function countAdmins()
    {
        $adminCount = User::role('admin')->count(); 
        return $adminCount;
    }

    public function countOrganizers()
    {
        $organizerCount = User::role('organizer')->count(); 
        return $organizerCount;
    }

    public function countTeamLeaders()
    {
        $teamLeaderCount = User::role('team leader')->count(); 
        return $teamLeaderCount;
    }

    // Utilisateurs connectés
/*     public function countConnectedUsers()
    {
        $connectedUsers = User::where('last_login_at', '>=', now()->subMinutes(5))->count();
        return $connectedUsers;
    }
 */
}
