@extends('layouts.app')
@section('title', 'Agenda Akademik - SMKN 1 Dolok Sanggul')

@section('content')
<div class="py-24 bg-gradient-to-br from-indigo-50 to-blue-50">
<div class="max-w-4xl mx-auto px-4">
<h1 class="text-4xl font-bold text-gray-800 mb-12 text-center">Agenda Akademik 2025</h1>
<div class="grid md:grid-cols-2 gap-8 mb-12">
@forelse ($acaras as $acara)
<div class="bg-white rounded-[30px] p-8 shadow-xl hover:shadow-2xl transition-all border">
<div class="bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl p-6 text-white text-center mb-6">
<h3 class="text-2xl font-bold">{{ $acara->title }}</h3>
</div>
<p class="text-gray-700 mb-4">{{ $acara->description }}</p>
<div class="text-3xl font-black text-gray-800 mb-2">{{ \Carbon\Carbon::parse($acara->tanggal)->format('d') }}</div>
<div class="text-sm font-bold uppercase tracking-wider text-gray-500 mb-2">{{ \Carbon\Carbon::parse($acara->tanggal)->translatedFormat('M Y') }}</div>
<img src="{{ $acara->image }}" alt="{{ $acara->title }}" class="w-full h-48 object-cover rounded-2xl mt-4">
</div>
@empty
<div class="col-span-full text-center py-20">
<h3 class="text-2xl font-bold text-gray-500 mb-4">Belum ada agenda</h3>
<p class="text-gray-400">Agenda akan ditambahkan segera.</p>
</div>
@endforelse
</div>
{{ $acaras->links() }}
</div>
</div>
@endsection

