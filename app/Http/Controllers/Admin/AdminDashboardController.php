<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard view.
     * 
     * @return \Illuminate\View\View
     */
    public function create() {

        return view('admin.admin-dashboard')
                ->with('users', User::all())
                ->with('newestUser', User::latest()->first());;
    }
}
