<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogbookController extends Controller
{
    // Display all Logbook


    // Logbook by course


    // Add logbook
    public function add(Request $request)
    {
        $request->validate([
            'report_name' => 'required|string|max:255',
            'report_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'end_time' => 'required|date_format:Y-m-d H:i:s|after:start_time',
            'upload_date' => 'required|date',
            'course_id' => 'required|exists:courses,course_id',
            'user_id' => 'required|exists:users,id',
        ]);

        $user = Auth::user();

        // Mendapatkan course_id yang terkait dengan user yang sedang login
        $course = auth()->user->courses()->first(); // Mengambil kursus pertama yang terhubung dengan user
        if (!$course) {
            return redirect()->route('logbook')->with('error', 'Anda belum terdaftar di kursus manapun');
        }

        // Simpan gambar ke storage
        $photoPath = null;
        if ($request->hasFile('report_photo')) {
            $photoPath = $request->file('report_photo')->store('report_photos', 'public');
        }

        // Simpan data ke database
        $report = new Report();
        $report->report_name = $request->input('report_name');
        $report->report_photo = $photoPath;
        $report->description = $request->input('description');
        $report->start_time = $request->input('start_time');
        $report->end_time = $request->input('end_time');
        $report->upload_date = $request->input('upload_date');
        $report->course_id =  $course->course_id;
        $report->user_id = $user->id;
        $report->status = 'pending';
        $report->save();

        // return redirect()->route('logbook')
        //     ->with('success', 'Logbook berhasil ditambahkan');

        return response()->json($user);
    }

    // Edit logbook


    // 
}
