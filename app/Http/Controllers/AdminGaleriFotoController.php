<?php

namespace App\Http\Controllers;

use App\Models\GaleriFoto;
use Illuminate\Http\Request;

class AdminGaleriFotoController extends Controller
{
    public function list()
    {
        return response()->json(GaleriFoto::on('oracle')->latest()->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|string|max:500',
            'caption' => 'nullable|string',
        ]);

        $galeri = GaleriFoto::on('oracle')->create([
            'title' => $validated['title'],
            'image' => $validated['image'],
            'caption' => $validated['caption'] ?? null,
        ]);

        return response()->json(['success' => true, 'data' => $galeri]);
    }

    public function update(Request $request, $id)
    {
        $galeri = GaleriFoto::on('oracle')->findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|string|max:500',
            'caption' => 'nullable|string',
        ]);

        $galeri->title = $validated['title'];
        $galeri->image = $validated['image'];
        $galeri->caption = $validated['caption'] ?? null;
        $galeri->save();

        return response()->json(['success' => true, 'data' => $galeri]);
    }

    public function destroy($id)
    {
        $galeri = GaleriFoto::on('oracle')->findOrFail($id);
        $galeri->delete();
        return response()->json(['success' => true]);
    }
}

