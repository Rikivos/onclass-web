<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class DataMentorController extends Controller
{
    //get all mentors
    public function getMentor()
    {
        $mentors = User::where('role', 'mentor')->with('courses')->get();

        return view('admin.mentor', compact('mentors'));
    }

    //add mentor
    public function addMentor(Request $request)
    {
        $request->validate([
            'nim' => 'required',
        ]);

        try {
            $user = User::where('nim', $request->nim)->firstOrFail();

            if ($user->role === 'mentor') {
                return back()->withErrors(['error' => 'User is already a mentor.']);
            }

            $user->role = 'mentor';
            $user->save();

            return redirect()->back()->with('success', 'User role updated to mentor successfully.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->withErrors(['error' => 'User with the specified NIM was not found.']);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
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
}
