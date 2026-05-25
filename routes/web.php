<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolStatsController;


// Halaman Utama
Route::get('/', [StudentController::class, 'index'])->name('home');

// API Public
Route::get('/api/students', [StudentController::class, 'list'])->name('students.list');
Route::get('/api/teachers', [TeacherController::class, 'list'])->name('teachers.list');

// School stats (realtime)
Route::get('/api/school-stats', [SchoolStatsController::class, 'index']);

// New Features Routes

Route::get('/ppdb', function () {
    return view('ppdb.index');
})->name('ppdb.index');
Route::get('/berita', [\App\Http\Controllers\BeritaController::class, 'index'])->name('berita.index');
Route::get('/galeri', [\App\Http\Controllers\GaleriFotoController::class, 'index'])->name('galeri.index');
Route::get('/download', function () {
    return view('download.index');
})->name('download.index');
Route::get('/agenda', [\App\Http\Controllers\AcaraController::class, 'index'])->name('agenda.index');
Route::get('/erapor', [\App\Http\Controllers\NilaiRaporController::class, 'index'])->name('erapor.index');
Route::get('/tracer', [\App\Http\Controllers\TracerAlumniController::class, 'index'])->name('tracer.index');

// API Auth
Route::middleware(['web'])->post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware(['web'])->post('/register-student', [AuthController::class, 'registerStudent'])->name('register.student');
Route::middleware(['web'])->post('/register-teacher', [AuthController::class, 'registerTeacher'])->name('register.teacher');
Route::middleware(['web'])->post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware(['web'])->get('/api/me', [AuthController::class, 'me'])->name('auth.me');
Route::middleware(['web'])->get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
})->name('csrf.token');

// Admin realtime API (Berita & Galeri)
Route::middleware(['web'])->get('/api/beritas', [\App\Http\Controllers\AdminApiController::class, 'beritas']);
Route::middleware(['web'])->get('/api/galeri-fotos', [\App\Http\Controllers\AdminApiController::class, 'galeriFotos']);



// API/Route untuk CRUD Admin
Route::prefix('admin')->group(function () {
    Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
    Route::post('/students/update/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/delete/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

    Route::post('/teachers/store', [TeacherController::class, 'store'])->name('teachers.store');
    Route::post('/teachers/update/{id}', [TeacherController::class, 'update'])->name('teachers.update');
    Route::delete('/teachers/delete/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

    // Admin CRUD: Berita
    Route::post('/beritas/store', [\App\Http\Controllers\AdminBeritaController::class, 'store'])->name('beritas.store');
    Route::post('/beritas/update/{id}', [\App\Http\Controllers\AdminBeritaController::class, 'update'])->name('beritas.update');
    Route::delete('/beritas/delete/{id}', [\App\Http\Controllers\AdminBeritaController::class, 'destroy'])->name('beritas.destroy');

    // Admin CRUD: Galeri
    Route::post('/galeri-fotos/store', [\App\Http\Controllers\AdminGaleriFotoController::class, 'store'])->name('galeri_fotos.store');
    Route::post('/galeri-fotos/update/{id}', [\App\Http\Controllers\AdminGaleriFotoController::class, 'update'])->name('galeri_fotos.update');
    Route::delete('/galeri-fotos/delete/{id}', [\App\Http\Controllers\AdminGaleriFotoController::class, 'destroy'])->name('galeri_fotos.destroy');
});

// Submit PPDB & Tracer Alumni (ke database Oracle)
Route::post('/ppdb/store', [StudentController::class, 'storePpdb'])->name('ppdb.store');
Route::post('/tracer/store', [\App\Http\Controllers\TracerAlumniController::class, 'store'])->name('tracer.store');

// Admin Tracer CRUD
Route::prefix('admin')->group(function () {
    Route::get('/tracer', [\App\Http\Controllers\TracerAlumniController::class, 'list'])->name('admin.tracer.list');
    Route::post('/tracer/update/{id}', [\App\Http\Controllers\TracerAlumniController::class, 'update'])->name('admin.tracer.update');
    Route::delete('/tracer/delete/{id}', [\App\Http\Controllers\TracerAlumniController::class, 'destroy'])->name('admin.tracer.destroy');
});


// FAQ
Route::get('/faq', function () {
    return view('faq.index');
})->name('faq.index');


