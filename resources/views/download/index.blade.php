@extends('layouts.app')
@section('title', 'Download Center - SMKN 1 Dolok Sanggul')

@section('content')
<div class="pt-24 pb-24 bg-gray-50" style="padding-top: 120px;">
<div class="max-w-3xl mx-auto px-4">
<h1 class="text-4xl font-bold text-gray-800 text-center mb-12">Download Center</h1>
<p class="text-lg text-gray-600 text-center mb-16">Materi pelajaran, panduan PPDB, brosur, dan dokumen penting lainnya.</p>
<div class="space-y-6">
<div class="group bg-white p-8 rounded-[30px] shadow-xl hover:shadow-2xl transition-all border border-gray-100">
<div class="flex items-center justify-between">
<div>
<h3 class="text-xl font-bold text-gray-800 mb-2">📄 Brosur PPDB 2025</h3>
<p class="text-gray-600">Informasi jurusan, fasilitas, dan jadwal pendaftaran lengkap.</p>
</div>
<a href="{{ asset('brosur-ppdb.pdf') }}" download class="w-14 h-14 bg-blue-500 text-white rounded-2xl flex items-center justify-center shadow-lg hover:bg-blue-600 transition-all group-hover:scale-110">
<i class="fas fa-download text-xl"></i>
</a>
</div>
</div>
<div class="group bg-white p-8 rounded-[30px] shadow-xl hover:shadow-2xl transition-all border border-gray-100">
<div class="flex items-center justify-between">
<div>
<h3 class="text-xl font-bold text-gray-800 mb-2">📖 Panduan PPDB</h3>
<p class="text-gray-600">Petunjuk lengkap cara daftar PPDB online dan offline.</p>
</div>
<a href="{{ asset('panduan-ppdb.pdf') }}" download class="w-14 h-14 bg-emerald-500 text-white rounded-2xl flex items-center justify-center shadow-lg hover:bg-emerald-600 transition-all group-hover:scale-110">
<i class="fas fa-download text-xl"></i>
</a>
</div>
</div>
</div>
<p class="text-center mt-12 text-sm text-gray-500">Dokumen lain akan ditambahkan secara berkala.</p>
</div>
</div>
@endsection

