<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FixOracleStudentsTable extends Command
{
    protected $signature = 'oracle:fix-students';
    protected $description = 'Fix Oracle students table by adding status column if missing and sync migration tracking';

    public function handle(): int
    {
        // Check if column exists
        $hasStatus = false;
        try {
            $columns = DB::connection('oracle')->select("
                SELECT column_name 
                FROM user_tab_columns 
                WHERE table_name = 'STUDENTS' 
                AND column_name = 'STATUS'
            ");
            $hasStatus = count($columns) > 0;
        } catch (\Exception $e) {
            $this->error('Gagal cek kolom: ' . $e->getMessage());
            return 1;
        }

        if (!$hasStatus) {
            $this->info('Menambahkan kolom STATUS ke tabel STUDENTS...');
            try {
                DB::connection('oracle')->statement("
                    ALTER TABLE STUDENTS ADD (STATUS VARCHAR2(20) DEFAULT 'Aktif')
                ");
                $this->info('Kolom STATUS berhasil ditambahkan!');
            } catch (\Exception $e) {
                $this->error('Gagal tambah kolom: ' . $e->getMessage());
                return 1;
            }
        } else {
            $this->info('Kolom STATUS sudah ada.');
        }

        // Sync migration tracking
        $batch = DB::table('migrations')->max('batch') ?? 0;
        $batch++;

        $migrations = [
            '2024_11_01_000001_create_students_table',
            '2024_11_01_000002_create_teachers_table',
            '2024_11_01_000003_create_majors_table',
            '2026_04_26_150000_add_status_to_students_table',
        ];

        foreach ($migrations as $migration) {
            $exists = DB::table('migrations')->where('migration', $migration)->exists();
            if (!$exists) {
                $maxId = DB::table('migrations')->max('id') ?? 0;
                DB::table('migrations')->insert([
                    'id' => $maxId + 1,
                    'migration' => $migration,
                    'batch' => $batch,
                ]);
                $this->info("Migration {$migration} ditandai sudah dijalankan.");
            }
        }

        $this->info('Selesai! Sekarang coba tambah data siswa via panel admin.');
        return 0;
    }
}
