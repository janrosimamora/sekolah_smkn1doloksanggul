<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GaleriFotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title'   => 'Kegiatan Upacara Bendera',
                'image'   => 'upacara.jpg',
                'caption' => 'Pelaksanaan upacara bendera hari Senin di lapangan utama.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title'   => 'Lomba 17 Agustus',
                'image'   => 'lomba.jpg',
                'caption' => 'Keseruan siswa mengikuti lomba balap karung.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title'   => 'Kunjungan Industri',
                'image'   => 'kunjungan.jpg',
                'caption' => 'Siswa kelas XII melakukan kunjungan ke perusahaan teknologi.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title'   => 'Rapat Orang Tua Murid',
                'image'   => 'rapat.jpg',
                'caption' => 'Diskusi perkembangan kurikulum baru bersama wali murid.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('galeri_fotos')->insert($data);
    }
}