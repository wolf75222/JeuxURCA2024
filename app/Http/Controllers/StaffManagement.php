<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StaffManagement extends Controller
{
    public function index() {
        $users = User::all();
        return view('staff-management', compact('users'));
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('staff.index')->with('success', 'User has been deleted.');
    }
}
