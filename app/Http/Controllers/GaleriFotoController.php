<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GaleriFoto;
use Illuminate\View\View;

class GaleriFotoController extends Controller
{
    public function index(): View
    {
        try {
            $galeris = GaleriFoto::latest()->paginate(12);
        } catch (\Exception $e) {
            $galeris = collect([]);
        }
        return view('galeri.index', compact('galeris'));
    }
}

