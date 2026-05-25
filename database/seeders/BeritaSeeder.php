<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Berita::create([
            'title' => 'Lomba Debat Nasional',
            'slug' => 'lomba-debat-nasional',
            'content' => 'Tim debat TKI juara 1 tingkat provinsi Sumatera Utara.',
            'image' => 'https://images.unsplash.com/photo-1516321310764-9e5d9a6b2b81?w=800',
            'views' => rand(100,500),
        ]);
        \App\Models\Berita::create([
            'title' => 'Workshop Oracle Database',
            'slug' => 'workshop-oracle-database',
            'content' => 'Pelatihan Oracle untuk siswa kelas XII semua jurusan.',
            'image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800',
            'views' => rand(200,800),
        ]);
        \App\Models\Berita::create([
            'title' => 'Pekan Olahraga',
            'slug' => 'pekan-olahraga',
            'content' => 'Futsal putra juara internal school tournament 2024.',
            'image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800',
            'views' => rand(300,1000),
        ]);
    }
}
