<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            $user = Auth::user();


            return response()->json([
                'success' => true,
                'role' => $user->role,
                'csrf_token' => csrf_token(),
                'user' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'role' => $user->role,
                ]
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Username atau password salah.'], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['success' => true]);
    }

    public function registerStudent(Request $request)
    {
        $validated = $request->validate([
            'nisn' => 'required|string|unique:students,nisn',
            'nama' => 'required|string|max:255',
            'gender' => 'required|in:L,P',
            'kelas' => 'required|string|max:10',
            'jurusan' => 'required|in:TKI,BPM,MP,AK,TK,TB,PHP',
            'password' => 'required|string|min:4|confirmed',
        ]);

        $student = Student::create([
            'nisn' => $validated['nisn'],
            'nama' => $validated['nama'],
            'gender' => $validated['gender'],
            'kelas' => $validated['kelas'],
            'jurusan' => $validated['jurusan'],
            'status' => 'Aktif',
        ]);

        $user = User::create([
            'username' => $validated['nisn'],
            'password' => Hash::make($validated['password']),
            'role' => 'student',
            'student_id' => $student->id,
        ]);

        Auth::login($user);

        return response()->json([
            'success' => true,
            'role' => 'student',
            'csrf_token' => csrf_token(),
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
                'role' => $user->role,
            ]
        ]);
    }

    public function registerTeacher(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|string|unique:users,username',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'password' => 'required|string|min:4|confirmed',
        ]);

        $teacher = Teacher::create([
            'nama' => $validated['nama'],
            'jabatan' => $validated['jabatan'],
            'mapel' => $validated['mapel'],
            'foto' => null,
        ]);

        $user = User::create([
            'username' => $validated['nip'],
            'password' => Hash::make($validated['password']),
            'role' => 'teacher',
            'teacher_id' => $teacher->id,
        ]);

        Auth::login($user);

        return response()->json([
            'success' => true,
            'role' => 'teacher',
            'csrf_token' => csrf_token(),
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
                'role' => $user->role,
            ]
        ]);
    }

    public function me()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['authenticated' => false]);
        }
        return response()->json([
            'authenticated' => true,
            'role' => $user->role,
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
                'role' => $user->role,
            ]
        ]);
    }
}

