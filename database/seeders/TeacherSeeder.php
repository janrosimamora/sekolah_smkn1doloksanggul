<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $teachers = [
            [
                'nama' => 'Drs. Bambang Siregar, M.Pd',
                'jabatan' => 'Kepala Sekolah',
                'mapel' => 'Pendidikan Agama',
                'foto' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=200'
            ],
            [
                'nama' => 'Dra. Rosida Manurung',
                'jabatan' => 'Wakasek Kurikulum',
                'mapel' => 'Bahasa Indonesia',
                'foto' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=200'
            ],
            [
                'nama' => 'Sulaiman, S.Pd',
                'jabatan' => 'Wakasek Kesiswaan',
                'mapel' => 'Matematika',
                'foto' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=200'
            ],
            [
                'nama' => 'Murni Simanjuntak, S.Kom',
                'jabatan' => 'Ketua Kompetensi TKJ',
                'mapel' => 'Komputer dan Jaringan',
                'foto' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=200'
            ],
                        [
                'nama' => 'Rusliana Sihombing, S.Kom',
                'jabatan' => 'Ketua Kompetensi TKJ',
                'mapel' => 'Komputer dan Jaringan',
                'foto' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=200'
            ],
        ];

        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }
    }
}

