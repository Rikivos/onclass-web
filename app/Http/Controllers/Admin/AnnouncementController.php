<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    //Add Announcement
    public function upload(Request $request)
    {
        $request->validate([
            'announcement' => 'required|mimes:pdf|max:10240',
        ]);

        $file = $request->file('announcement');
        $filePath = $file->store('announcements', 'public');

        Announcement::create([
            'title' => $request->input('title'),
            'file_path' => $filePath,
        ]);

        return response()->json([
            'message' => 'Announcement uploaded successfully!',
            'file_path' => Storage::url($filePath),
        ], 201);
    }

    public function download($fileName)
    {
        $filePath = storage_path('app/public/announcements/' . $fileName);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return response()->json(['message' => 'File not found.'], 404);
    }
}
