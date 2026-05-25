<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
$this->call([
            StudentSeeder::class,
            TeacherSeeder::class,
            MajorSeeder::class,
            BeritaSeeder::class,
            AcaraSeeder::class,
            GaleriFotoSeeder::class,
            NilaiRaporSeeder::class,
        ]);

        // Default admin
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            'student_id' => null,
            'teacher_id' => null,
        ]);
    }
}

