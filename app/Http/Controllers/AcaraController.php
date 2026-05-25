<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acara;
use Illuminate\View\View;

class AcaraController extends Controller
{
    public function index(): View
    {
        try {
            $acaras = Acara::orderBy('tanggal')->paginate(10);
        } catch (\Exception $e) {
            $acaras = collect([]);
        }
        return view('agenda.index', compact('acaras'));
    }
}

