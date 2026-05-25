<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            ['nisn' => '0023456781', 'nama' => 'Ahmad Fauzi', 'gender' => 'L', 'kelas' => 'XII', 'jurusan' => 'TKI'],
            ['nisn' => '0023456782', 'nama' => 'Siti Aminah', 'gender' => 'P', 'kelas' => 'XII', 'jurusan' => 'BPM'],
            ['nisn' => '0023456783', 'nama' => 'Budi Santoso', 'gender' => 'L', 'kelas' => 'XI', 'jurusan' => 'MP'],
            ['nisn' => '0023456784', 'nama' => 'Dewi Lestari', 'gender' => 'P', 'kelas' => 'XI', 'jurusan' => 'AK'],
            ['nisn' => '0023456785', 'nama' => 'Eko Prasetyo', 'gender' => 'L', 'kelas' => 'X', 'jurusan' => 'TK'],
            ['nisn' => '0023456786', 'nama' => 'Fitriani', 'gender' => 'P', 'kelas' => 'X', 'jurusan' => 'TB'],
            ['nisn' => '0023456787', 'nama' => 'Gilang Ramadhan', 'gender' => 'L', 'kelas' => 'XII', 'jurusan' => 'PHP'],
            ['nisn' => '0023456788', 'nama' => 'Hani Susanti', 'gender' => 'P', 'kelas' => 'XI', 'jurusan' => 'TKI'],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}

