<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function users()
    {
        $users = User::all();
        return view('admin.users.users', compact('users'));
    }

    public function user_view()
    {
        // dd('good');
        $user_view = User::all()->first();
        // dd($user_view);
        return view('admin.users.user_view', compact('user_view'));
    }
}
