<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\GaleriFoto;

class AdminApiController extends Controller
{
    public function beritas()
    {
        return response()->json(Berita::on('oracle')->latest()->get());
    }

    public function galeriFotos()
    {
        return response()->json(GaleriFoto::on('oracle')->latest()->get());
    }
}

