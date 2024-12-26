<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DataController extends Controller
{
    //get mentors and Course
    public function getMentor()
    {
        //mentors
        $mentors = User::where('role', 'mentor')->with('courses')->get();

        //Course
        $courses = Course::with(['mentor'])
            ->withCount('users')
            ->get();

        return view('admin.data', compact('mentors', 'courses'));
    }

    // Start Mentor
    //add mentor
    public function addMentor(Request $request)
    {
        $request->validate([
            'nim' => 'required',
        ]);

        try {
            $user = User::findOrFail($request->nim);

            if ($user->role === 'mentor') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User is already a mentor.',
                ], 400);
            }

            $user->role = 'mentor';
            $user->save();

            return response()->json([
                'status' => 'success',
                'message' => 'User role updated to mentor successfully.',
                'data' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while updating the user role.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    //Delete Mentor
    public function deleteMentor(Request $request)
    {
        $request->validate([
            'nim' => 'required',
        ]);

        try {
            $user = User::findOrFail($request->user_id);

            if ($user->role !== 'mentor') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'The user is not a mentor.',
                ], 400);
            }

            $user->role = 'mente';
            $user->save();

            return response()->json([
                'status' => 'success',
                'message' => 'The mentor role has been removed successfully.',
                'data' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while removing the mentor role.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    //End Mentor

    //Start Course
    //Add course
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_title' => 'required|string|max:255',
            'mentor_nim' => 'required|string|exists:users,nim',
        ]);

        $mentor = User::where('nim', $validated['mentor_nim'])->where('role', 'mentor')->first();

        if (!$mentor) {
            return response()->json([
                'message' => 'Mentor dengan NIM tersebut tidak ditemukan atau bukan seorang mentor.',
            ], 404);
        }

        $course_slug = Str::slug($validated['course_title'], '-');

        $course = Course::create([
            'course_title' => $validated['course_title'],
            'course_slug' => $course_slug,
            'mentor_id' => $mentor->id,
        ]);

        return response()->json([
            'message' => 'Course berhasil ditambahkan!',
            'course' => $course,
        ], 201);
    }

    //Show Edit
    public function edit($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect()->route('courses.index')->with('error', 'Course tidak ditemukan.');
        }

        return view('admin.edit_course', compact('course'));
    }


    //Update Course
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'course_title' => 'required|string|max:255',
            'mentor_nim' => 'required|string|exists:users,nim',
        ]);

        $course = Course::find($id);

        if (!$course) {
            return response()->json([
                'message' => 'Course tidak ditemukan.',
            ], 404);
        }

        $mentor = User::where('nim', $validated['mentor_nim'])->where('role', 'mentor')->first();

        if (!$mentor) {
            return response()->json([
                'message' => 'Mentor dengan NIM tersebut tidak ditemukan atau bukan seorang mentor.',
            ], 404);
        }

        $course->update([
            'course_title' => $validated['course_title'],
            'course_slug' => Str::slug($validated['course_title'], '-'),
            'mentor_id' => $mentor->id,
        ]);

        return response()->json([
            'message' => 'Course berhasil diperbarui!',
            'course' => $course,
        ]);
    }

    //Delete Course
    public function destroy($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json([
                'message' => 'Course tidak ditemukan.',
            ], 404);
        }

        $course->delete();

        return response()->json([
            'message' => 'Course berhasil dihapus.',
        ]);
    }


    //End Course
}
