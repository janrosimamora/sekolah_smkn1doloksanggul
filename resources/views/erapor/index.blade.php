@extends('layouts.app')
@section('title', 'E-Rapor - SMKN 1 Dolok Sanggul')

@section('content')
<div class="py-24 bg-gradient-to-r from-blue-50 to-indigo-50">
<div class="max-w-7xl mx-auto px-4">
<h1 class="text-4xl font-bold text-gray-800 mb-12 text-center">E-Rapor & Nilai Siswa</h1>
<div class="grid lg:grid-cols-2 gap-12">
<div>
<h2 class="text-2xl font-bold text-gray-800 mb-8">Daftar Siswa</h2>
@forelse ($students as $student)
<div class="bg-white p-6 rounded-2xl shadow-lg mb-4 hover:shadow-xl transition">
<div class="flex items-center">
<div class="w-12 h-12 bg-primary rounded-xl flex items-center justify-center text-white font-bold text-sm">{{ substr($student->nama, 0, 1) }}</div>
<div class="ml-4">
<h3 class="font-bold text-lg">{{ $student->nama }}</h3>
<p class="text-gray-600">{{ $student->jurusan }} - {{ $student->kelas }}</p>
</div>
</div>
</div>
@empty
<p class="text-gray-500">Belum ada data siswa.</p>
@endforelse
</div>
<div>
<h2 class="text-2xl font-bold text-gray-800 mb-8">Nilai Terbaru</h2>
<div class="space-y-4">
@forelse ($rapors as $rapor)
<div class="bg-white p-6 rounded-2xl shadow-lg flex justify-between items-center">
<div>
<strong>{{ $rapor->student->nama ?? 'N/A' }}</strong> - {{ $rapor->mapel }}
</div>
<div class="text-2xl font-black text-emerald-600">{{ number_format($rapor->nilai,1) }}</div>
</div>
@empty
<p class="text-gray-500">Belum ada data nilai.</p>
@endforelse
</div>
</div>
</div>
{{ $rapors->appends(request()->query())->links() }}
</div>
</div>
@endsection

