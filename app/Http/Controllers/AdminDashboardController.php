<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\AdminUser;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $eventsCount = Event::count();
        $adminsCount = AdminUser::count();

        return view('admin.dashboard', compact('usersCount', 'eventsCount', 'adminsCount'));
    }
}
