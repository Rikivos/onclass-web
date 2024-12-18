<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModuleController extends Controller
{
    // Add
    public function create()
    {
        return view('modules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'module_title' => 'required',
            'content' => 'required',
            'course_id' => 'required|exists:courses,course_id',
            'file_path' => 'nullable|file',
        ]);

        $module = new Module();
        $module->module_title = $request->module_title;
        $module->content = $request->content;
        $module->course_id = $request->course_id;

        if ($request->hasFile('file_path')) {
            $filePath = $request->file('file_path')->store('modules');
            $module->file_path = $filePath;
        }

        $module->save();

        return redirect()->route('modules.index')->with('success', 'Modul berhasil ditambahkan');
    }

    // Edit
    public function edit(Module $module)
    {
        // Temukan modul berdasarkan ID
        // return view('modules.edit', compact('module'));
        return view('modules.edit', ['module' => $module]);
    }

    public function update(Request $request, Module $module)
    {
        // Validasi data yang diupdate
        $request->validate([
            'module_title' => 'required',
            'content' => 'required',
            'course_id' => 'required|exists:courses,course_id',
            'file_path' => 'nullable|file',
        ]);

        // Update data modul
        $module->update([
            'module_title' => $request->module_title,
            'content' => $request->content,
            'course_id' => $request->course_id,
        ]);

        // Update file jika ada
        if ($request->hasFile('file_path')) {
            // Hapus file lama jika ada
            if ($module->file_path) {
                Storage::delete($module->file_path);
            }
            // Simpan file baru
            $filePath = $request->file('file_path')->store('modules');
            $module->update(['file_path' => $filePath]);
        }

        return redirect()->route('modules.index')->with('success', 'Modul berhasil diupdate');
    }
}
