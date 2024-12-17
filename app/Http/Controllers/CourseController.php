<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    // Method to add the authenticated user to a course
    public function enroll($courseId)
    {
        $user = Auth::user();

        $course = Course::find($courseId);

        if (!$course) {
            return redirect()->back()->with('error', 'Course not found.');
        }

        if ($user->courses->contains($courseId)) {
            return redirect()->back()->with('message', 'You are already enrolled in this course.');
        }

        $user->courses->attach($courseId);

        return redirect()->route('courses.show', $courseId)->with('message', 'Successfully enrolled in the course!');
    }

    // Method to display all courses with names and mentor names
    public function index()
    {
        $courses = Course::with('mentor:id,name')->get();

        return view('home', compact('courses'));
    }

    // Method to display course details
    public function show($slug)
    {
        $course = Course::where('course_slug', $slug)->firstOrFail();
        return view('mentoring', compact('course'));  
    }


    // Method to search
    public function search($slug)
    {
        $course = Course::where('course_slug', $slug)->first();

        if (!$course) {
            return redirect()->back()->with('error', 'Kelas tidak ditemukan.');
        }

        return view('courses.show', compact('course'));
    }
}
