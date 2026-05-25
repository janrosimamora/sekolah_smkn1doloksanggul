<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TracerAlumni extends Model
{
    /** @use HasFactory<\Database\Factories\TracerAlumniFactory> */
    use HasFactory;

    protected $fillable = [
        'nama',
        'angkatan',
        'pekerjaan_kuliah',
        'status',
        'detail',
    ];
}

