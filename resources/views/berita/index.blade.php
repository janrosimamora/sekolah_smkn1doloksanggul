@extends('layouts.app')
@section('title', 'Berita & Kegiatan - SMKN 1 Dolok Sanggul')

@section('content')
<div class="pt-24 pb-24 bg-white">
<div class="max-w-7xl mx-auto px-4">
<h1 class="text-4xl font-bold text-gray-800 mb-12 text-center">Berita & Kegiatan Terbaru</h1>
<div class="grid md:grid-cols-3 gap-8 mb-12">
@forelse ($beritas as $berita)
<div class="group cursor-pointer bg-gradient-to-br from-blue-500 to-blue-600 rounded-[30px] p-8 text-white shadow-2xl hover:shadow-3xl hover:-translate-y-4 transition-all overflow-hidden">
<div class="w-24 h-24 bg-white/20 rounded-2xl mb-6 mx-auto flex items-center justify-center text-2xl opacity-80 group-hover:opacity-100">
<img src="{{ $berita->image }}" alt="{{ $berita->title }}" class="w-full h-full rounded-2xl object-cover">
</div>
<h3 class="text-xl font-bold mb-4">{{ Str::limit($berita->title, 40) }}</h3>
<p class="opacity-90 mb-6">{{ Str::limit($berita->content, 100) }}</p>
<div class="flex items-center justify-between">
<span class="text-blue-200 text-sm uppercase tracking-wider">{{ $berita->views }} views</span>
<a href="#" class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center group-hover:rotate-90 transition">
<i class="fas fa-arrow-right"></i>
</a>
</div>
</div>
@empty
<div class="col-span-full text-center py-20">
<h3 class="text-2xl font-bold text-gray-500 mb-4">Belum ada berita</h3>
<p class="text-gray-400">Berita akan ditambahkan segera.</p>
</div>
@endforelse
</div>
{{ $beritas->links() }}
</div>
</div>
@endsection
@section('title', 'Berita & Kegiatan - SMKN 1 Dolok Sanggul')

@section('content')
<div class="py-24 bg-white">
<div class="max-w-7xl mx-auto px-4">
<h1 class="text-4xl font-bold text-gray-800 mb-12 text-center">Berita & Kegiatan Terbaru</h1>
<div class="grid md:grid-cols-3 gap-8 mb-12">
@forelse ($beritas as $berita)
<div class="group cursor-pointer bg-gradient-to-br from-blue-500 to-blue-600 rounded-[30px] p-8 text-white shadow-2xl hover:shadow-3xl hover:-translate-y-4 transition-all overflow-hidden">
<div class="w-24 h-24 bg-white/20 rounded-2xl mb-6 mx-auto flex items-center justify-center text-2xl opacity-80 group-hover:opacity-100">
<img src="{{ $berita->image }}" alt="{{ $berita->title }}" class="w-full h-full rounded-2xl object-cover">
</div>
<h3 class="text-xl font-bold mb-4">{{ Str::limit($berita->title, 40) }}</h3>
<p class="opacity-90 mb-6">{{ Str::limit($berita->content, 100) }}</p>
<div class="flex items-center justify-between">
<span class="text-blue-200 text-sm uppercase tracking-wider">{{ $berita->views }} views</span>
<a href="#" class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center group-hover:rotate-90 transition">
<i class="fas fa-arrow-right"></i>
</a>
</div>
</div>
@empty
<div class="col-span-full text-center py-20">
<h3 class="text-2xl font-bold text-gray-500 mb-4">Belum ada berita</h3>
<p class="text-gray-400">Berita akan ditambahkan segera.</p>
</div>
@endforelse
</div>
{{ $beritas->links() }}
</div>
</div>
@endsection

