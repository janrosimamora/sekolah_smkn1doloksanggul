<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Acara::create([
            'title' => 'Penjemputan Raport',
            'tanggal' => '2025-01-15 08:00:00',
            'description' => 'Kelas XII Semester 1',
            'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800',
        ]);
        \App\Models\Acara::create([
            'title' => 'Ujian Tengah Semester',
            'tanggal' => '2025-01-20 00:00:00',
            'description' => 'Semua Kelas',
            'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=800',
        ]);
    }
}
