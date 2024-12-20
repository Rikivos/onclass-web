<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LogbookController extends Controller
{
    // Display all Logbook


    // Logbook by course
    public function indexByCourse()
    {
        $user = Auth::user();

        if (empty($user)) {
            return redirect()->route('login');
        }

        if (!in_array($user->role, ['admin', 'mentor'])) {
            return redirect()->route('courses.index');
        }

        $courses = Course::where('mentor_id', $user->id)->firstOrFail();

        $reports = Report::where('user_id', $user->id)
            ->where('course_id', $courses->course_id)
            ->get();

        $data = [
            'mentor_id' => $user->id,
            'course_id' => $courses->course_id,
            'reports' => $reports
        ];

        return view('logbook', compact('data'));
    }


    // Add logbook
    public function add(Request $request)
    {
        $validatedData =  $request->validate([
            'report_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'end_time' => 'required|date_format:Y-m-d H:i:s|after:start_time',
            'upload_date' => 'required|date',
        ]);

        Log::info('Data setelah validasi:', $validatedData);

        $user = Auth::user();
        Log::info('Data user yang login:', ['user' => $user]);

        // Mendapatkan course_id yang terkait dengan user yang sedang login
        $course = $user->courses->first();
        if (!$course) {
            return redirect()->back()->with('error', 'Anda belum terdaftar di kursus manapun');
        }

        Log::info('Kursus pertama yang ditemukan:', ['course' => $course]);

        // Simpan data ke database
        $report = new Report();
        $report->report_name = $request->input('report_name');
        $report->report_photo = 'default_photo.jpg';
        $report->description = $request->input('description');
        $report->start_time = $request->input('start_time');
        $report->end_time = $request->input('end_time');
        $report->upload_date = $request->input('upload_date');
        $report->course_id = $course->course_id;
        $report->user_id = $user->id;
        $report->status = 'pending';
        $report->save();

        return response()->json([
            'validated_data' => $validatedData,
            'user' => $user,
            'course' => $course,
            'saved_report' => $report,
        ]);


        // return redirect()->route('logbook')->with('success', 'Logbook berhasil ditambahkan');
    }


    // Edit logbook


    // 
}
