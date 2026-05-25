<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function list()
    {
        return response()->json(Teacher::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'foto' => 'nullable|string|max:500',
        ]);

        $teacher = Teacher::create($validated);
        return response()->json(['success' => true, 'data' => $teacher]);
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'foto' => 'nullable|string|max:500',
        ]);

        $teacher->update($validated);
        return response()->json(['success' => true, 'data' => $teacher]);
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return response()->json(['success' => true]);
    }
}

