<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminBeritaController extends Controller
{
    public function list()
    {
        return response()->json(Berita::on('oracle')->latest()->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:beritas,slug',
            'content' => 'required|string',
            'image' => 'nullable|string|max:500',
        ]);

        $berita = Berita::on('oracle')->create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'content' => $validated['content'],
            'image' => $validated['image'] ?? null,
            'views' => 0,
        ]);

        return response()->json(['success' => true, 'data' => $berita]);
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::on('oracle')->findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|string|max:500',
        ]);

        $berita->title = $validated['title'];
        $berita->slug = $validated['slug'];
        $berita->content = $validated['content'];
        $berita->image = $validated['image'] ?? null;
        $berita->save();

        return response()->json(['success' => true, 'data' => $berita]);
    }

    public function destroy($id)
    {
        $berita = Berita::on('oracle')->findOrFail($id);
        $berita->delete();
        return response()->json(['success' => true]);
    }
}

