<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        try {
            // Untuk konsistensi dengan data yang disimpan ke Oracle saat PPDB/admin
            $students = Student::on('oracle')->latest()->get();

        } catch (\Exception $e) {
            $students = collect([]);
            $msg = $e->getMessage();
            // ORA-00942 = tabel belum dibuat (bukan error koneksi)
            if (str_contains($msg, 'ORA-00942')) {
                // Silakan jalankan: php artisan migrate:fresh --seed
            } elseif (str_contains($msg, 'Unsupported driver') || str_contains($msg, 'could not find driver')) {
                session(['oracle_error' => 'Extension PHP oci8 belum aktif. Install Oracle Instant Client & aktifkan oci8 di php.ini.']);
            } else {
                session(['oracle_error' => $msg]);
            }
        }
        $tracers = collect([]);

        try {
            // Ambil tracer alumni dari Oracle agar bisa ditampilkan di halaman utama (beranda)
            $tracers = \App\Models\TracerAlumni::on('oracle')->latest()->paginate(10);
        } catch (\Exception $e) {
            $tracers = collect([]);
        }

        return view('landing', compact('students', 'tracers'));
    }

    public function list()
    {
        // Untuk konsistensi dengan penyimpanan PPDB/admin (disimpan ke Oracle)
        return response()->json(Student::on('oracle')->latest()->get());
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn' => 'required|string|unique:students,nisn',
            'nama' => 'required|string|max:255',
            'gender' => 'required|in:L,P',
            'kelas' => 'required|string|max:10',
            'jurusan' => 'required|in:TKI,BPM,MP,AK,TK,TB,PHP',
        ]);

        $validated['status'] = 'Aktif';
        $student = Student::on('oracle')->create($validated);
        return response()->json(['success' => true, 'data' => $student]);
    }

    // Endpoint publik untuk PPDB Online
    public function storePpdb(Request $request)
    {
        try {
            $validated = $request->validate([
                'nisn' => 'required|string|max:20',
                'nama' => 'required|string|max:255',
                'gender' => 'required|in:L,P',
                'kelas' => 'required|string|max:10',
                'jurusan' => 'required|in:TKI,BPM,MP,AK,TK,TB,PHP',
            ]);

            // Cek unique di Oracle secara manual agar validasi unique tidak tergantung driver.
            $exists = Student::on('oracle')->where('nisn', $validated['nisn'])->exists();
            if ($exists) {
                return response()->json([
                    'success' => false,
                    'message' => 'NISN sudah terdaftar. Silakan gunakan NISN lain.'
                ], 422);
            }

            $validated['status'] = 'Aktif';
            $student = Student::on('oracle')->create($validated);

            return response()->json(['success' => true, 'data' => $student]);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            if (str_contains($msg, 'ORA-00942')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tabel STUDENTS belum ada di Oracle. Jalankan setup/migration Oracle terlebih dahulu.'
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
        $student = Student::findOrFail($id);
        $validated = $request->validate([
            'nisn' => 'required|string|unique:students,nisn,' . $student->id,
            'nama' => 'required|string|max:255',
            'gender' => 'required|in:L,P',
            'kelas' => 'required|string|max:10',
            'jurusan' => 'required|in:TKI,BPM,MP,AK,TK,TB,PHP',
        ]);

        $student->update($validated);
        return response()->json(['success' => true, 'data' => $student]);
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json(['success' => true]);
    }
}
