<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Major;

class MajorSeeder extends Seeder
{
    public function run(): void
    {
        $majors = [
            [
                'kode' => 'TKI',
                'nama' => 'Teknik Komputer dan Informatika (TKI)',
                'deskripsi' => 'Jurusan TKI mempelajari tentang instalasi jaringan komputer, troubleshooting hardware dan software, pemrograman, serta administrasi sistem jaringan.',
                'prospek' => 'Network Administrator, IT Support, Teknisi Komputer, Web Developer, Programmer',
                'icon' => 'fa-laptop-code',
                'color' => 'blue'
            ],
            [
                'kode' => 'BPM',
                'nama' => 'Bisnis dan Pemasaran (BPM)',
                'deskripsi' => 'Jurusan BPM mempelajari tentang strategi pemasaran, penjualan, manajemen bisnis, dan kewirausahaan.',
                'prospek' => 'Marketing Specialist, Sales Manager, Entrepreneur, Business Consultant',
                'icon' => 'fa-bullhorn',
                'color' => 'pink'
            ],
            [
                'kode' => 'MP',
                'nama' => 'Manajemen Perkantoran (MP)',
                'deskripsi' => 'Jurusan MP mempelajari tentang administrasi perkantoran modern, manajemen dokumen, korespondensi bisnis, dan tata kelola kantor.',
                'prospek' => 'Secretary, Admin Officer, Customer Service, Office Manager',
                'icon' => 'fa-briefcase',
                'color' => 'amber'
            ],
            [
                'kode' => 'AK',
                'nama' => 'Akuntansi dan Keuangan (AK)',
                'deskripsi' => 'Jurusan AK mempelajari tentang pembukuan, penyusunan laporan keuangan, pengelolaan pajak, dan administrasi keuangan perusahaan.',
                'prospek' => 'Staff Accounting, Tax Officer, Financial Analyst, Auditor',
                'icon' => 'fa-calculator',
                'color' => 'green'
            ],
            [
                'kode' => 'TK',
                'nama' => 'Tata Kecantikan (TK)',
                'deskripsi' => 'Jurusan Tata Kecantikan mempelajari tentang perawatan kulit, rambut, rias pengantin, dan manajemen salon kecantikan.',
                'prospek' => 'Beautician, Salon Manager, Makeup Artist, Spa Therapist',
                'icon' => 'fa-spa',
                'color' => 'purple'
            ],
            [
                'kode' => 'TB',
                'nama' => 'Tata Busana (TB)',
                'deskripsi' => 'Jurusan Tata Busana mempelajari tentang desain pakaian, pembuatan pola, menjahit, dan manajemen industri fashion.',
                'prospek' => 'Fashion Designer, Tailor, Boutique Manager, Textile Entrepreneur',
                'icon' => 'fa-tshirt',
                'color' => 'orange'
            ],
            [
                'kode' => 'PHP',
                'nama' => 'Perhotelan dan Jasa Pariwisata (PHP)',
                'deskripsi' => 'Jurusan PHP mempelajari tentang layanan perhotelan, tata boga, front office, dan manajemen pariwisata.',
                'prospek' => 'Hotel Staff, Front Desk Officer, Tour Guide, Restoran Manager',
                'icon' => 'fa-hotel',
                'color' => 'cyan'
            ],
        ];

        foreach ($majors as $major) {
            Major::create($major);
        }
    }
}

