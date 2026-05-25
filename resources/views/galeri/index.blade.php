@extends('layouts.app')
@section('title', 'Galeri Foto - SMKN 1 Dolok Sanggul')

@section('content')
<div class="py-24 bg-gray-50">
<div class="max-w-7xl mx-auto px-4">
<h1 class="text-4xl font-bold text-gray-800 mb-12 text-center">Galeri Foto & Video</h1>
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
@forelse ($galeris as $galeri)
<div class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all cursor-pointer">
<img src="{{ $galeri->image }}" alt="{{ $galeri->title }}" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
<div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent opacity-0 group-hover:opacity-100 transition-opacity p-6 flex flex-col justify-end">
<h3 class="text-white font-bold text-lg mb-2">{{ Str::limit($galeri->title, 30) }}</h3>
<p class="text-white/90 text-sm">{{ Str::limit($galeri->caption, 80) }}</p>
</div>
</div>
@empty
<div class="col-span-full text-center py-20">
<h3 class="text-2xl font-bold text-gray-500 mb-4">Belum ada galeri</h3>
<p class="text-gray-400">Foto kegiatan akan ditambahkan segera.</p>
</div>
@endforelse
</div>
{{ $galeris->links() }}
</div>
</div>
@endsection

