<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    //get mentors
    public function getMentor()
    {
        $mentors = User::where('role', 'mentor')->with('courses')->get();

        // return response()->json($mentors);
        return view('admin.data', compact('mentors'));
    }

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
