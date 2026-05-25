<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiRaporSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = \App\Models\Student::take(5)->get();
        if ($students->isNotEmpty()) {
            foreach ($students as $student) {
                \App\Models\NilaiRapor::create([
                    'student_id' => $student->id,
                    'semester' => '1',
                    'mapel' => 'Matematika',
                    'nilai' => rand(80,100)/10,
                ]);
                \App\Models\NilaiRapor::create([
                    'student_id' => $student->id,
                    'semester' => '1',
                    'mapel' => 'Bahasa Indonesia',
                    'nilai' => rand(80,100)/10,
                ]);
            }
        }
    }
}
