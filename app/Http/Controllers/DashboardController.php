<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard() {
        $currentUser = Auth::user();

        if($currentUser->isAdmin()) {
            $userList = User::all();
            return view('dashboard', ['userList' => $userList]);
        } else {
            if(!$currentUser->isDetailsUpdated()) {
                return redirect()->route('users.edit', $currentUser);
            } elseif(empty($currentUser->preference)) {
                return redirect()->route('preferences.create');
            } else {
                return view('user-dashboard');
            }
        }
    }
}
