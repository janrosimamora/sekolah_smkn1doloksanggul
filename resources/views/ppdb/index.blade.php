@extends('layouts.app')
@section('title', 'PPDB Online - SMKN 1 Dolok Sanggul')

@section('content')
<div class="pt-24 pb-24 bg-gradient-to-br from-purple-50 to-pink-50" style="padding-top: 120px;">
<div class="max-w-7xl mx-auto px-4">
<h1 class="text-5xl font-bold text-center bg-gradient-to-r from-purple-800 to-pink-600 bg-clip-text text-transparent mb-8">PPDB Online 2025</h1>
<p class="text-xl text-gray-600 text-center mb-12 max-w-3xl mx-auto">Daftar langsung dari website. Form pendaftaran mudah dan cepat.</p>
<div class="max-w-md mx-auto bg-white rounded-[40px] p-12 shadow-2xl border">
<h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Form Pendaftaran</h2>
<form id="ppdbForm" class="space-y-6" onsubmit="handlePpdbSubmit(event)" method="POST" action="{{ route('ppdb.store') }}">
<input type="text" name="nisn" id="ppdb_nisn" placeholder="NISN" class="w-full p-4 border border-gray-200 rounded-2xl focus:border-purple-500 focus:ring-2 focus:ring-purple-100" required>
<input type="text" name="nama" id="ppdb_nama" placeholder="Nama Lengkap" class="w-full p-4 border border-gray-200 rounded-2xl focus:border-purple-500 focus:ring-2 focus:ring-purple-100" required>
<select name="gender" id="ppdb_gender" class="w-full p-4 border border-gray-200 rounded-2xl focus:border-purple-500" required>
<option value="">Pilih Gender</option>
<option value="L">Laki-laki</option>
<option value="P">Perempuan</option>
</select>
<select name="jurusan" id="ppdb_jurusan" class="w-full p-4 border border-gray-200 rounded-2xl focus:border-purple-500" required>
<option value="">Pilih Jurusan</option>
<option value="TKI">TKI - Teknik Komputer Informatika</option>
<option value="BPM">BPM - Bisnis Pemasaran</option>
<option value="AK">AK - Akuntansi</option>
<option value="TK">TK - Tata Kecantikan</option>
</select>
<select name="kelas" id="ppdb_kelas" class="w-full p-4 border border-gray-200 rounded-2xl focus:border-purple-500" required>
<option value="">Pilih Kelas</option>
<option value="X">X</option>
<option value="XI">XI</option>
<option value="XII">XII</option>
</select>
<button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white py-4 rounded-2xl font-bold text-lg shadow-xl hover:shadow-2xl transition-all">DAFTAR PPDB</button>
</form>

<p class="text-center mt-6 text-sm text-gray-500">Sudah punya akun? <button onclick="openLoginModal()" class="text-primary font-bold">Login</button></p>
</div>
</div>
</div>
@endsection

