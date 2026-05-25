<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\View\View;

class BeritaController extends Controller
{
    public function index(): View
    {
        try {
            $beritas = Berita::latest()->paginate(9);
        } catch (\Exception $e) {
            $beritas = collect([]);
        }
        return view('berita.index', compact('beritas'));
    }
}

