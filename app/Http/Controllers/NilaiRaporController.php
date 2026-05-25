<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiRapor;
use App\Models\Student;
use Illuminate\View\View;

class NilaiRaporController extends Controller
{
    public function index(): View
    {
        try {
            $rapors = NilaiRapor::with('student')->paginate(20);
        } catch (\Exception $e) {
            $rapors = collect([]);
        }
        try {
            $students = Student::paginate(10);
        } catch (\Exception $e) {
            $students = collect([]);
        }
        return view('erapor.index', compact('rapors', 'students'));
    }
}

