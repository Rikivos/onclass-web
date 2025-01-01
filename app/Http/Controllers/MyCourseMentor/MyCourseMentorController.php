<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;

class MyCourseMentorController extends Controller
{
    // Add new module
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'module_title' => 'required|string|max:255',
            'content' => 'required|string',
            'course_id' => 'required|exists:courses,course_id',
            'file_path' => 'nullable|file',
        ]);

        if ($request->hasFile('file_path')) {
            $validatedData['file_path'] = $request->file('file_path')->store('modules', 'public');
        }

        $module = Module::create($validatedData);

        return response()->json([
            'message' => 'Module successfully created.',
            'data' => $module,
        ], 201);
    }
}
