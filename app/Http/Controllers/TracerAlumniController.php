<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TracerAlumni;
use Illuminate\View\View;

class TracerAlumniController extends Controller
{
    public function index(): View
    {
        try {
            $tracers = TracerAlumni::on('oracle')->latest()->paginate(10);
        } catch (\Exception $e) {
            $tracers = collect([]);
        }
        return view('tracer.index', compact('tracers'));
    }

    // JSON list untuk kebutuhan admin CRUD
    public function list(Request $request)
    {
        try {
            return response()->json(TracerAlumni::on('oracle')->latest()->get());
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            if (str_contains($msg, 'ORA-00942')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tabel TRACER_ALUMNIS belum ada di Oracle. Jalankan setup/migration Oracle terlebih dahulu.'
                ], 500);
            }
            if (str_contains($msg, 'Unsupported driver') || str_contains($msg, 'could not find driver')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Koneksi Oracle gagal: extension oci8 belum aktif (install Oracle Instant Client & aktifkan oci8 di php.ini).'
                ], 500);
            }

            return response()->json(['success' => false, 'message' => $msg], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:100',
                'angkatan' => 'required|integer|min:1990|max:2100',
                'pekerjaan_kuliah' => 'required|string|max:255',
                'status' => 'required|in:kerja,kuliah,wirausaha',
                'detail' => 'nullable|string',
            ]);

            $tracer = TracerAlumni::on('oracle')->create([
                'nama' => $validated['nama'],
                'angkatan' => $validated['angkatan'],
                'pekerjaan_kuliah' => $validated['pekerjaan_kuliah'],
                'status' => $validated['status'],
                'detail' => $validated['detail'] ?? null,
            ]);

            $request->session()->flash('tracer_success', 'Berhasil menambahkan data alumni tracer.');

            return response()->json(['success' => true, 'data' => $tracer]);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            if (str_contains($msg, 'ORA-00942')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tabel TRACER_ALUMNIS belum ada di Oracle. Jalankan setup/migration Oracle terlebih dahulu.'
                ], 500);
            }
            if (str_contains($msg, 'Unsupported driver') || str_contains($msg, 'could not find driver')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Koneksi Oracle gagal: extension oci8 belum aktif (install Oracle Instant Client & aktifkan oci8 di php.ini).'
                ], 500);
            }

            return response()->json(['success' => false, 'message' => $msg], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:100',
                'angkatan' => 'required|integer|min:1990|max:2100',
                'pekerjaan_kuliah' => 'required|string|max:255',
                'status' => 'required|in:kerja,kuliah,wirausaha',
                'detail' => 'nullable|string',
            ]);

            $tracer = TracerAlumni::on('oracle')->findOrFail($id);

            $tracer->update([
                'nama' => $validated['nama'],
                'angkatan' => $validated['angkatan'],
                'pekerjaan_kuliah' => $validated['pekerjaan_kuliah'],
                'status' => $validated['status'],
                'detail' => $validated['detail'] ?? null,
            ]);

            return response()->json(['success' => true, 'data' => $tracer]);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            if (str_contains($msg, 'ORA-00942')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tabel TRACER_ALUMNIS belum ada di Oracle. Jalankan setup/migration Oracle terlebih dahulu.'
                ], 500);
            }
            if (str_contains($msg, 'Unsupported driver') || str_contains($msg, 'could not find driver')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Koneksi Oracle gagal: extension oci8 belum aktif (install Oracle Instant Client & aktifkan oci8 di php.ini).'
                ], 500);
            }

            return response()->json(['success' => false, 'message' => $msg], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $tracer = TracerAlumni::on('oracle')->findOrFail($id);
            $tracer->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            if (str_contains($msg, 'ORA-00942')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tabel TRACER_ALUMNIS belum ada di Oracle. Jalankan setup/migration Oracle terlebih dahulu.'
                ], 500);
            }
            if (str_contains($msg, 'Unsupported driver') || str_contains($msg, 'could not find driver')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Koneksi Oracle gagal: extension oci8 belum aktif (install Oracle Instant Client & aktifkan oci8 di php.ini).'
                ], 500);
            }

            return response()->json(['success' => false, 'message' => $msg], 500);
        }
    }
}




