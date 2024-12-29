<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCourseController extends Controller
{
    //Get my course
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $courseUsers = CourseUser::where('user_id', $user->id)->get();

        if ($courseUsers->isEmpty()) {
            return view('emptyCourse');
        }

        $roles = $user->role;

        $courseId = $courseUsers->first()->course_id;
        $courses = Course::with('mentor:id,name')->whereIn('course_id', $courseUsers->pluck('course_id'))->get();

        return view('mycourse', compact('courses', 'roles'));
    }
}
