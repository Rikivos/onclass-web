<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $totalClasses = Course::count();
        $totalMentees = User::where('role', 'mente')->count();
        $totalMentors = User::where('role', 'mentor')->count();

        return view('admin.dashboard', compact('totalClasses', 'totalMentees', 'totalMentors'));
    }
}
