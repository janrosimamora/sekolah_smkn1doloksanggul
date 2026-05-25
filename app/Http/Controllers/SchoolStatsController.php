<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\TracerAlumni;
use Illuminate\Http\JsonResponse;
use Exception;

class SchoolStatsController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $activeStudents = Student::on('oracle')
                ->where('status', 'Aktif')
                ->count();

            $totalTracer = TracerAlumni::on('oracle')->count();

            $ptnAccepted = TracerAlumni::on('oracle')
                ->where('status', 'kuliah')
                ->count();

            $directJob = TracerAlumni::on('oracle')
                ->where('status', 'kerja')
                ->count();

            $ptnPercent = $totalTracer > 0 ? round(($ptnAccepted / $totalTracer) * 100, 0) : 0;
            $jobPercent = $totalTracer > 0 ? round(($directJob / $totalTracer) * 100, 0) : 0;

            return response()->json([
                'success' => true,
                'data' => [
                    'active_students' => $activeStudents,
                    'juara_lomba_nasional' => 0, // belum diminta berdasarkan data khusus; diset 0 agar tidak misleading
                    'ptn_percent' => (int)$ptnPercent,
                    'job_percent' => (int)$jobPercent,
                    'total_tracer' => (int)$totalTracer,
                ]
            ]);
        } catch (Exception $e) {
            $msg = $e->getMessage();
            return response()->json([
                'success' => false,
                'message' => $msg,
            ], 500);
        }
    }
}

