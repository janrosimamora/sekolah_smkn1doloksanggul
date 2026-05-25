@extends('layouts.app')
@section('content')
<div id="main-content" class="fade-in">
  <div id="public-content">



<section id="beranda" class="relative pt-32 pb-20 min-h-screen flex items-center bg-gradient-to-br from-blue-900 via-blue-800 to-blue-600 overflow-hidden text-white">
<div class="absolute top-20 right-20 w-64 h-64 bg-white opacity-5 rounded-full blur-3xl"></div>
<div class="absolute bottom-20 left-20 w-96 h-96 bg-accent opacity-10 rounded-full blur-3xl"></div>
<div class="max-w-7xl mx-auto px-4 z-10 grid md:grid-cols-2 gap-12 items-center">
<div class="fade-in">
<div class="inline-block bg-accent text-blue-900 px-4 py-1 rounded-full text-sm font-bold mb-4 shadow-lg"><i class="fas fa-star mr-2"></i>Sekolah Unggulan</div>
<h1 class="text-5xl md:text-7xl font-bold leading-tight mb-6 italic">SMK NEGERI 1<br><span class="text-accent">DOLOK SANGGUL</span></h1>
<p class="text-lg md:text-xl mb-8 text-blue-100 leading-relaxed max-w-lg">Mencetak generasi unggul, kompeten, dan berkarakter dengan dukungan sistem basis data Oracle yang terintegrasi.</p>
<div class="flex flex-wrap gap-4">

<a href="#tentang" class="bg-white/10 backdrop-blur-md border-2 border-white/30 px-10 py-4 rounded-2xl font-bold hover:bg-white hover:text-blue-900 transition">PROFIL SEKOLAH</a>
</div>
</div>
<div class="hidden md:block">
<div class="bg-white/10 backdrop-blur-xl p-8 rounded-[40px] border border-white/20 shadow-2xl">
<div class="flex items-center justify-between mb-8">
<h3 class="font-bold text-xl">Statistik DATA</h3>

</div>
<div class="grid grid-cols-1 gap-6">
<div class="bg-white/5 p-6 rounded-3xl flex items-center space-x-6 border border-white/5">
<div class="bg-accent text-blue-900 w-16 h-16 rounded-2xl flex items-center justify-center text-3xl shadow-lg"><i class="fas fa-users"></i></div>
<div>
<p class="text-blue-200 text-sm">Total Siswa Terdaftar</p>
<div class="text-4xl font-black" id="hero-student-count">{{ count($students) }}</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

{{-- TENTANG --}}
<section id="tentang" class="py-24 bg-white relative">
<div class="max-w-7xl mx-auto px-4">
<h2 class="text-4xl font-bold text-primary mb-2 text-center">Profil Sekolah</h2>
<p class="text-gray-500 text-center mb-12">SMK Negeri 1 Dolok Sanggul — Unggul, Kompeten, Berkarakter</p>

<div class="grid lg:grid-cols-2 gap-10 mb-14">
{{-- Visi & Misi --}}
<div class="bg-primary rounded-[40px] p-10 text-white shadow-2xl relative overflow-hidden">
<div class="absolute top-0 right-0 w-40 h-40 bg-white opacity-5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
<h3 class="text-2xl font-bold mb-4 italic text-accent"><i class="fas fa-bullseye mr-2"></i>Visi & Misi</h3>
<p class="text-lg italic leading-relaxed mb-6">"Menjadi pusat pendidikan kejuruan yang menghasilkan lulusan berstandar global, berjiwa wirausaha, dan berakhlak mulia."</p>
<div class="flex items-center space-x-3 mb-6">
<div class="w-10 h-1 bg-accent rounded-full"></div>
<span class="font-bold uppercase tracking-widest text-xs">Terakreditasi A</span>
</div>
<p class="text-blue-100 text-sm leading-relaxed">Berdiri sejak tahun 1985, SMK Negeri 1 Dolok Sanggul terus berkomitmen memajukan kualitas SDM di Kabupaten Humbang Hasundutan melalui pendidikan vokasi yang relevan dengan dunia industri.</p>
</div>

{{-- Identitas & Kontak --}}
<div class="bg-gray-50 rounded-[40px] p-10 border border-gray-100 shadow-xl">
<h3 class="text-2xl font-bold text-primary mb-6"><i class="fas fa-id-card mr-2"></i>Identitas & Kontak</h3>
<div class="space-y-4">
<div class="flex items-start space-x-4">
<div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center text-primary flex-shrink-0"><i class="fas fa-user-tie"></i></div>
<div>
<p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Kepala Sekolah</p>
<p class="text-gray-800 font-bold">Togar Halomoan Nainggolan</p>
</div>
</div>
<div class="flex items-start space-x-4">
<div class="w-10 h-10 bg-pink-100 rounded-xl flex items-center justify-center text-pink-600 flex-shrink-0"><i class="fas fa-user-cog"></i></div>
<div>
<p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Operator</p>
<p class="text-gray-800 font-bold">Ervina Juliarta Silaban</p>
</div>
</div>
<div class="flex items-start space-x-4">
<div class="w-10 h-10 bg-yellow-100 rounded-xl flex items-center justify-center text-yellow-600 flex-shrink-0"><i class="fas fa-award"></i></div>
<div>
<p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Akreditasi / NPSN</p>
<p class="text-gray-800 font-bold">A — 10208704</p>
</div>
</div>
<div class="flex items-start space-x-4">
<div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center text-green-600 flex-shrink-0"><i class="fas fa-envelope"></i></div>
<div>
<p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Email</p>
<p class="text-gray-800 font-bold text-sm">Smkn1dolsa_14@yahoo.co.id</p>
</div>
</div>
<div class="flex items-start space-x-4">
<div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center text-red-600 flex-shrink-0"><i class="fas fa-phone-alt"></i></div>
<div>
<p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Telepon</p>
<p class="text-gray-800 font-bold">0633</p>
</div>
</div>
</div>
</div>
</div>

{{-- Data Statistik (Sembunyikan saat panel admin aktif) --}}
<div class="bg-gradient-to-br from-emerald-600 via-emerald-500 to-green-600 rounded-[40px] p-10 text-white shadow-2xl mb-14 relative overflow-hidden admin-hide-on-public">


<div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent"></div>
<h3 class="text-3xl font-bold mb-4 text-center relative z-10 italic text-yellow-300 drop-shadow-lg">Prestasi &<br>Keunggulan Sekolah</h3>
<p class="text-emerald-100 text-center text-lg mb-10 relative z-10 leading-relaxed max-w-2xl mx-auto">Fokus pada pencapaian siswa dan kualitas lulusan untuk meyakinkan calon siswa & orang tua</p>
<div class="grid grid-cols-2 lg:grid-cols-4 gap-6 relative z-10">
<div class="group cursor-pointer bg-white/20 backdrop-blur-xl rounded-3xl p-8 text-center border border-white/30 hover:bg-white/30 hover:scale-105 transition-all duration-500 shadow-2xl hover:shadow-3xl" onclick="scrollToPrestasi()">
<div class="w-20 h-20 bg-yellow-300 rounded-3xl mx-auto mb-6 flex items-center justify-center text-emerald-900 text-3xl shadow-2xl group-hover:rotate-12 transition-transform duration-500">
<i class="fas fa-users"></i>
</div>
<div class="text-4xl lg:text-5xl font-black mb-2 text-yellow-300" id="stat-active-students" data-target="{{ count($students) }}">{{ count($students) }}</div>
<p class="text-sm font-bold uppercase tracking-wider text-emerald-100 group-hover:text-yellow-300 transition">Total Siswa Aktif</p>

</div>
<div class="group cursor-pointer bg-white/20 backdrop-blur-xl rounded-3xl p-8 text-center border border-white/30 hover:bg-white/30 hover:scale-105 transition-all duration-500 shadow-2xl hover:shadow-3xl" onclick="openPrestasiModal()">
<div class="w-20 h-20 bg-orange-400 rounded-3xl mx-auto mb-6 flex items-center justify-center text-white text-3xl shadow-2xl group-hover:rotate-12 transition-transform duration-500">
<i class="fas fa-trophy"></i>
</div>
<div class="text-4xl lg:text-5xl font-black mb-2 text-orange-300" id="stat-ptn-percent" data-target="0">0</div>
<p class="text-sm font-bold uppercase tracking-wider text-emerald-100 group-hover:text-orange-300 transition">Lulusan Masuk PTN</p>

<div class="mt-3 text-xs text-emerald-200 opacity-0 group-hover:opacity-100 transition-opacity">Lihat Prestasi →</div>
</div>
<div class="group cursor-pointer bg-white/20 backdrop-blur-xl rounded-3xl p-8 text-center border border-white/30 hover:bg-white/30 hover:scale-105 transition-all duration-500 shadow-2xl hover:shadow-3xl" onclick="openPtModal()">
<div class="w-20 h-20 bg-purple-400 rounded-3xl mx-auto mb-6 flex items-center justify-center text-white text-3xl shadow-2xl group-hover:rotate-12 transition-transform duration-500">
<i class="fas fa-university"></i>
</div>
<div class="text-4xl lg:text-5xl font-black mb-2 text-purple-300" id="stat-ptn-percent" data-target="0">0</div>
<p class="text-sm font-bold uppercase tracking-wider text-emerald-100 group-hover:text-purple-300 transition">Lulusan Masuk PTN</p>
<div class="mt-3 text-xs text-emerald-200 opacity-0 group-hover:opacity-100 transition-opacity"><span id="stat-ptn-percent-label">0</span>% Tingkat →</div>
</div>
<div class="group cursor-pointer bg-white/20 backdrop-blur-xl rounded-3xl p-8 text-center border border-white/30 hover:bg-white/30 hover:scale-105 transition-all duration-500 shadow-2xl hover:shadow-3xl" onclick="openKerjaModal()">
<div class="w-20 h-20 bg-blue-400 rounded-3xl mx-auto mb-6 flex items-center justify-center text-white text-3xl shadow-2xl group-hover:rotate-12 transition-transform duration-500">
<i class="fas fa-briefcase"></i>
</div>
<div class="text-4xl lg:text-5xl font-black mb-2 text-blue-300" data-target="92">0</div>
<p class="text-sm font-bold uppercase tracking-wider text-emerald-100 group-hover:text-blue-300 transition">Langsung Kerja</p>
<div class="mt-3 text-xs text-emerald-200 opacity-0 group-hover:opacity-100 transition-opacity">92% Penempatan →</div>
</div>
</div>
<div class="absolute -bottom-20 right-20 w-40 h-40 bg-yellow-300 opacity-20 rounded-full blur-3xl animate-pulse"></div>
</div>

{{-- Lokasi --}}
<div class="grid md:grid-cols-3 gap-8 items-stretch">
<div class="md:col-span-1 bg-gray-50 rounded-[40px] p-8 border border-gray-100 shadow-xl flex flex-col justify-center">
<h3 class="text-xl font-bold text-primary mb-4"><i class="fas fa-map-marker-alt mr-2 text-red-500"></i>Lokasi Sekolah</h3>
<div class="space-y-3 text-sm">
<div>
<p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Alamat</p>
<p class="text-gray-700 font-medium leading-relaxed">JL. Bonan Dolok Km. 2,5 Doloksanggul, Kec. Doloksanggul, Kab. Humbang Hasundutan, Prov. Sumatera Utara</p>
</div>
<div class="grid grid-cols-2 gap-3">
<div>
<p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Lintang</p>
<p class="text-gray-800 font-bold font-mono">2.2435</p>
</div>
<div>
<p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Bujur</p>
<p class="text-gray-800 font-bold font-mono">98.7425</p>
</div>
</div>
<a href="https://www.google.com/maps?q=2.2435,98.7425" target="_blank" class="inline-flex items-center justify-center w-full mt-2 bg-primary text-white py-3 rounded-xl font-bold text-sm hover:bg-blue-800 transition shadow-lg">
<i class="fas fa-external-link-alt mr-2"></i> Buka di Google Maps
</a>
</div>
</div>
<div class="md:col-span-2 rounded-[40px] overflow-hidden shadow-2xl border border-gray-200 h-80 md:h-auto">
<iframe
src="https://www.google.com/maps?q=2.2435,98.7425&z=16&output=embed"
width="100%"
height="100%"
style="border:0; min-height: 320px;"
allowfullscreen=""
loading="lazy"
referrerpolicy="no-referrer-when-downgrade"
title="Lokasi SMK Negeri 1 Dolok Sanggul"
></iframe>
</div>
</div>

</div>
</section>

{{-- JURUSAN --}}
<section id="jurusan" class="py-24 bg-gray-50">
<div class="max-w-7xl mx-auto px-4">
<div class="text-center mb-16">
<h2 class="text-4xl font-bold text-primary mb-4">Program Keahlian</h2>
<div class="w-24 h-1.5 bg-accent mx-auto rounded-full"></div>
</div>
<div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6">
<div class="bg-blue-900 p-8 rounded-[40px] text-white shadow-xl hover:shadow-2xl transition transform hover:-translate-y-4"><div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center text-accent text-3xl mb-6 shadow-inner"><i class="fas fa-laptop-code"></i></div><h3 class="text-xl font-bold mb-2">TKI</h3><p class="text-blue-200 text-sm italic">Teknik Komputer & Informatika</p></div>
<div class="bg-pink-600 p-8 rounded-[40px] text-white shadow-xl hover:shadow-2xl transition transform hover:-translate-y-4"><div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center text-white text-3xl mb-6 shadow-inner"><i class="fas fa-bullhorn"></i></div><h3 class="text-xl font-bold mb-2">BPM</h3><p class="text-pink-100 text-sm italic">Bisnis & Pemasaran</p></div>
<div class="bg-yellow-500 p-8 rounded-[40px] text-white shadow-xl hover:shadow-2xl transition transform hover:-translate-y-4"><div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center text-white text-3xl mb-6 shadow-inner"><i class="fas fa-briefcase"></i></div><h3 class="text-xl font-bold mb-2">MP</h3><p class="text-yellow-100 text-sm italic">Manajemen Perkantoran</p></div>
<div class="bg-green-600 p-8 rounded-[40px] text-white shadow-xl hover:shadow-2xl transition transform hover:-translate-y-4"><div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center text-white text-3xl mb-6 shadow-inner"><i class="fas fa-calculator"></i></div><h3 class="text-xl font-bold mb-2">AK</h3><p class="text-green-100 text-sm italic">Akuntansi & Keuangan</p></div>
<div class="bg-purple-600 p-8 rounded-[40px] text-white shadow-xl hover:shadow-2xl transition transform hover:-translate-y-4"><div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center text-white text-3xl mb-6 shadow-inner"><i class="fas fa-spa"></i></div><h3 class="text-xl font-bold mb-2">TK</h3><p class="text-purple-100 text-sm italic">Tata Kecantikan</p></div>
<div class="bg-orange-500 p-8 rounded-[40px] text-white shadow-xl hover:shadow-2xl transition transform hover:-translate-y-4"><div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center text-white text-3xl mb-6 shadow-inner"><i class="fas fa-tshirt"></i></div><h3 class="text-xl font-bold mb-2">TB</h3><p class="text-orange-100 text-sm italic">Tata Busana</p></div>
<div class="bg-cyan-600 p-8 rounded-[40px] text-white shadow-xl hover:shadow-2xl transition transform hover:-translate-y-4 md:col-span-3 lg:col-span-1"><div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center text-white text-3xl mb-6 shadow-inner"><i class="fas fa-hotel"></i></div><h3 class="text-xl font-bold mb-2">PHP</h3><p class="text-cyan-100 text-sm italic">Perhotelan & Jasa Pariwisata</p></div>
</div>

<!-- PPDB ONLINE SECTION -->
<section id="ppdb" class="py-24 bg-gradient-to-br from-purple-50 to-pink-50">
<div class="max-w-7xl mx-auto px-4">
<div class="text-center mb-20">
<h2 class="text-5xl font-bold bg-gradient-to-r from-purple-800 to-pink-600 bg-clip-text text-transparent mb-4">PPDB Online 2025</h2>
<p class="text-xl text-gray-600 max-w-2xl mx-auto">Daftar langsung tanpa antri. Pendaftaran mudah dan cepat melalui website resmi SMK Negeri 1 Dolok Sanggul.</p>
</div>
<div class="grid lg:grid-cols-2 gap-12 items-center">
<div>
<h3 class="text-3xl font-bold text-gray-800 mb-6">Jadwal Pendaftaran</h3>
<div class="space-y-4 mb-12">
<div class="bg-white p-6 rounded-2xl shadow-xl border-l-4 border-accent">
<div class="flex items-center justify-between mb-2">
<span class="text-sm font-bold text-gray-500 uppercase tracking-wide">Gelombang 1</span>
<span class="text-2xl font-black text-accent">20 Jan - 10 Feb</span>
</div>
<p class="text-gray-600">Prestasi Akademik & Non-Akademik</p>
</div>
<div class="bg-white p-6 rounded-2xl shadow-xl border-l-4 border-emerald-500">
<div class="flex items-center justify-between mb-2">
<span class="text-sm font-bold text-gray-500 uppercase tracking-wide">Gelombang 2</span>
<span class="text-2xl font-black text-emerald-500">15 Feb - 28 Feb</span>
</div>
<p class="text-gray-600">Reguler</p>
</div>
</div>
<button onclick="openPpdbModal()" class="w-full lg:w-auto bg-gradient-to-r from-purple-600 to-pink-600 text-white px-12 py-6 rounded-3xl font-bold text-xl shadow-2xl hover:from-purple-700 hover:to-pink-700 hover:shadow-3xl transition-all duration-300 transform hover:-translate-y-2">
<i class="fas fa-clipboard-list mr-3"></i>Daftar Sekarang
</button>
</div>
<div class="bg-white/60 backdrop-blur-xl rounded-[50px] p-12 shadow-2xl border border-white/50">
<div class="grid grid-cols-2 gap-6 mb-8">
<div class="text-center p-6 bg-gradient-to-br from-purple-500 to-pink-400 rounded-2xl text-white">
<div class="text-4xl font-black mb-2">7</div>
<p class="text-sm font-bold uppercase tracking-wider opacity-90">Jurusan Unggulan</p>
</div>
<div class="text-center p-6 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-2xl text-white">
<div class="text-4xl font-black mb-2">36</div>
<p class="text-sm font-bold uppercase tracking-wider opacity-90">Rombel Tersedia</p>
</div>
<div class="text-center p-6 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl text-white">
<div class="text-4xl font-black mb-2">40</div>
<p class="text-sm font-bold uppercase tracking-wider opacity-90">Ruang Kelas Modern</p>
</div>
<div class="text-center p-6 bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl text-white">
<div class="text-4xl font-black mb-2">92%</div>
<p class="text-sm font-bold uppercase tracking-wider opacity-90">Tingkat Kerja</p>
</div>
</div>
<ul class="space-y-3 text-gray-700 font-medium">
<li class="flex items-center"><i class="fas fa-check-circle text-emerald-500 mr-3 text-lg"></i>Pendaftaran Online 24/7</li>
<li class="flex items-center"><i class="fas fa-check-circle text-emerald-500 mr-3 text-lg"></i>Gratis Biaya Pendaftaran</li>
<li class="flex items-center"><i class="fas fa-check-circle text-emerald-500 mr-3 text-lg"></i>Jalur Prestasi & Afirmasi</li>
<li class="flex items-center"><i class="fas fa-check-circle text-emerald-500 mr-3 text-lg"></i>Hasil Pengumuman Online</li>
</ul>
</div>
</div>
</div>
</section>

<!-- BERITA & GALERI -->
<section id="berita" class="py-24 bg-white">
<div class="max-w-7xl mx-auto px-4">
<h2 class="text-4xl font-bold text-center text-gray-800 mb-20">Berita & Kegiatan Terbaru</h2>
<div class="grid md:grid-cols-3 gap-8">
<div class="group cursor-pointer bg-gradient-to-br from-blue-500 to-blue-600 rounded-[30px] p-8 text-white shadow-2xl hover:shadow-3xl hover:-translate-y-4 transition-all duration-500 overflow-hidden" onclick="openBeritaModal()">
<div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
<div class="w-24 h-24 bg-white/20 rounded-2xl mb-6 mx-auto flex items-center justify-center text-2xl opacity-80 group-hover:opacity-100 transition"></div>
<h3 class="text-2xl font-bold mb-4 relative z-10">Lomba Debat Nasional</h3>
<p class="relative z-10 mb-6 opacity-90">Tim debat TKI juara 1 tingkat provinsi Sumatera Utara.</p>
<div class="flex items-center justify-between relative z-10">
<span class="text-blue-200 text-sm font-bold uppercase tracking-wider">2 hari lalu</span>
<div class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center group-hover:rotate-90 transition-transform"></div>
</div>
</div>
<div class="bg-white rounded-[30px] p-8 shadow-2xl border border-gray-100 hover:shadow-3xl hover:-translate-y-4 transition-all duration-500 group cursor-pointer" onclick="openBeritaModal()">
<div class="w-16 h-16 bg-accent rounded-2xl mb-6 mx-auto flex items-center justify-center text-primary text-2xl shadow-lg"></div>
<h3 class="text-xl font-bold text-gray-800 mb-4">Workshop Oracle Database</h3>
<p class="text-gray-600 mb-6">Pelatihan Oracle untuk siswa kelas XII semua jurusan.</p>
<span class="text-accent text-sm font-bold uppercase tracking-wider">1 minggu lalu</span>
</div>
<div class="group cursor-pointer bg-gradient-to-br from-emerald-500 to-teal-600 rounded-[30px] p-8 text-white shadow-2xl hover:shadow-3xl hover:-translate-y-4 transition-all duration-500 overflow-hidden" onclick="openBeritaModal()">
<div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
<div class="w-24 h-24 bg-white/20 rounded-2xl mb-6 mx-auto flex items-center justify-center text-2xl opacity-80 group-hover:opacity-100 transition"></div>
<h3 class="text-2xl font-bold mb-4 relative z-10">Pekan Olahraga</h3>
<p class="relative z-10 mb-6 opacity-90">Futsal putra juara internal school tournament 2024.</p>
<div class="flex items-center justify-between relative z-10">
<span class="text-emerald-200 text-sm font-bold uppercase tracking-wider">3 minggu lalu</span>
<div class="w-8 h-8 bg-white/20 rounded-xl flex items-center justify-center group-hover:rotate-90 transition-transform"></div>
</div>
</div>
</div>
<button onclick="openBeritaModal()" class="mx-auto block mt-12 bg-gradient-to-r from-gray-800 to-gray-900 text-white px-12 py-4 rounded-3xl font-bold text-lg shadow-2xl hover:from-gray-900 hover:to-black hover:shadow-3xl transition-all duration-300">Lihat Semua Berita</button>
</div>
</section>

<!-- GALERI & DOWNLOADS -->
<section id="galeri" class="py-24 bg-gray-50">
<div class="max-w-7xl mx-auto px-4">
<div class="grid md:grid-cols-2 gap-16 mb-20">
<div>
<h2 class="text-4xl font-bold text-gray-800 mb-8">Galeri Kegiatan</h2>
<div class="grid grid-cols-2 md:grid-cols-3 gap-4">
<div class="group cursor-pointer rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-500" onclick="openGalleryModal()">
<img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=400&h=300&fit=crop" alt="Laboratorium" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700">
<div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity p-4 flex items-end">
<span class="text-white font-bold text-lg">Laboratorium TKI</span>
</div>
</div>
<div class="group cursor-pointer rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-500" onclick="openGalleryModal()">
<img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=400&h=300&fit=crop" alt="Lapangan" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700">
<div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity p-4 flex items-end">
<span class="text-white font-bold text-lg">Lapangan Olahraga</span>
</div>
</div>
<!-- More gallery items... -->
</div>
</div>
</div>
</div>
</div>
</section>

<!-- AGENDA -->
<section id="agenda" class="py-24 bg-gradient-to-br from-indigo-50 to-blue-50">
<div class="max-w-7xl mx-auto px-4">
<h2 class="text-4xl font-bold text-center text-gray-800 mb-20">Agenda Akademik 2024/2025</h2>
<div class="grid lg:grid-cols-3 gap-8">
<div class="bg-white rounded-[40px] p-8 shadow-2xl hover:shadow-3xl transition-shadow lg:col-span-1 order-2 lg:order-1">
<div class="grid grid-cols-2 gap-4 mb-8">
<button onclick="openPpdbModal()" class="w-full p-4 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white rounded-2xl font-bold shadow-lg transition-all">
<i class="fas fa-clipboard-list mr-3"></i>PPDB Online
</button>
</div>
<div class="space-y-3">
<a href="#berita" class="block w-full p-4 bg-blue-50 border border-blue-100 rounded-xl text-blue-800 font-bold hover:bg-blue-100 transition text-sm text-center">Lihat Berita Terbaru</a>
<a href="#galeri" class="block w-full p-4 bg-emerald-50 border border-emerald-100 rounded-xl text-emerald-800 font-bold hover:bg-emerald-100 transition text-sm text-center">Galeri Foto</a>
</div>
</div>
<div class="lg:col-span-2 order-1 lg:order-2">
<div class="grid md:grid-cols-2 gap-6">
<div class="bg-gradient-to-br from-orange-500 to-red-500 rounded-[30px] p-8 text-white shadow-2xl relative overflow-hidden">
<div class="absolute inset-0 bg-white/10 backdrop-blur"></div>
<div class="relative z-10">
<h3 class="text-3xl font-bold mb-4">Penjemputan Raport</h3>
<p class="opacity-90 mb-6">Kelas XII Semester 1</p>
<div class="flex items-center text-2xl font-black mb-4">
<span>15</span>
<span class="ml-2 text-yellow-300">Jan</span>
</div>
<span class="block px-4 py-2 bg-white/20 rounded-full text-sm font-bold uppercase tracking-wider">Pukul 08:00</span>
</div>
</div>
<div class="bg-gradient-to-br from-emerald-500 to-teal-500 rounded-[30px] p-8 text-white shadow-2xl relative overflow-hidden">
<div class="absolute inset-0 bg-white/10 backdrop-blur"></div>
<div class="relative z-10">
<h3 class="text-3xl font-bold mb-4">Ujian Tengah Semester</h3>
<p class="opacity-90 mb-6">Semua Kelas</p>
<div class="flex items-center text-2xl font-black mb-4">
<span>20</span>
<span class="ml-2 text-yellow-300">Jan</span>
</div>
<span class="block px-4 py-2 bg-white/20 rounded-full text-sm font-bold uppercase tracking-wider">3 Hari</span>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>

<section id="data-siswa" class="py-24 bg-white hidden min-h-screen">
  <div class="max-w-7xl mx-auto px-4">
    <div class="grid md:grid-cols-2 gap-8 mb-12">
      <div class="bg-white p-6 rounded-3xl shadow-2xl border border-gray-100 h-[300px] max-h-[300px]">
        <canvas id="chartJurusan" class="w-full h-full" style="max-height:300px;"></canvas>
      </div>
      <div class="bg-white p-6 rounded-3xl shadow-2xl border border-gray-100 h-[300px] max-h-[300px]">
        <canvas id="chartGender" class="w-full h-full" style="max-height:300px;"></canvas>
      </div>
    </div>

    <div class="bg-white rounded-[40px] shadow-2xl border border-gray-100 overflow-hidden">
      <div class="p-8 bg-gray-50 border-b flex flex-col lg:flex-row justify-between items-center gap-6">
        <div class="flex-shrink-0">
          <h3 class="font-bold text-primary italic text-xl leading-tight">Data <span class="text-accent uppercase font-black">Siswa</span></h3>
          <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold">SMK Negeri 1 Dolok Sanggul</p>
        </div>
        <div class="flex flex-col md:flex-row items-center gap-4 w-full lg:w-auto">
          <div class="relative w-full md:w-64">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400"><i class="fas fa-search text-sm"></i></span>
            <input type="text" id="searchInput" placeholder="Cari NISN atau Nama..." class="pl-10 pr-4 py-3 bg-white border border-gray-200 rounded-2xl outline-none focus:border-primary shadow-sm w-full text-sm">
          </div>
        </div>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-left">
          <thead class="bg-primary text-white">
            <tr>
              <th class="p-6">NISN</th>
          e    <th class="p-6">NAMA LENGKAP</th>
              <th class="p-6 text-center">GENDER</th>
              <th class="p-6">JURUSAN</th>

              <th class="p-6">KELAS</th>
            </tr>
          </thead>
          <tbody id="studentTableBody" class="divide-y divide-gray-100"></tbody>
        </table>
      </div>

      <div class="p-6 bg-gray-50 border-t flex flex-col sm:flex-row justify-between items-center gap-4">
        <p class="text-sm text-gray-500 font-medium">Menampilkan <span id="pageInfo" class="text-primary font-bold">1 - 5</span> dari <span id="totalInfo" class="text-primary font-bold">0</span> siswa</p>
        <div class="flex items-center gap-2">
          <button id="btnPrev" onclick="changePage(-1)" class="w-10 h-10 rounded-xl bg-white border border-gray-200 text-gray-600 hover:bg-primary hover:text-white hover:border-primary transition flex items-center justify-center shadow-sm disabled:opacity-40 disabled:cursor-not-allowed"><i class="fas fa-chevron-left"></i></button>
          <div id="pageNumbers" class="flex gap-1"></div>
          <button id="btnNext" onclick="changePage(1)" class="w-10 h-10 rounded-xl bg-white border border-gray-200 text-gray-600 hover:bg-primary hover:text-white hover:border-primary transition flex items-center justify-center shadow-sm disabled:opacity-40 disabled:cursor-not-allowed"><i class="fas fa-chevron-right"></i></button>
        </div>
      </div>
    </div>
  </div>
</section>


{{-- GURU --}}
<section id="guru" class="py-24 bg-gray-50 text-center admin-hide-on-public">
<div class="max-w-7xl mx-auto px-4">
  <h2 class="text-4xl font-bold text-primary mb-4">Guru & Staf Pengajar</h2>
  <p class="text-gray-500 mb-8">Tim pengajar profesional SMKN 1 Dolok Sanggul</p>
  <div id="teacherGrid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4"></div>
  <div id="teacherPagination" class="mt-8 flex items-center justify-center gap-2"></div>
</div>
</section>



{{-- Footer Identitas & Statistik (versi ringkas, background biru) --}}
<div class="bg-blue-700/20 py-8 admin-hide-on-public">
  <div class="max-w-7xl mx-auto px-4">
    <div class="grid md:grid-cols-2 gap-10">
      <div>
        <h4 class="text-sm font-bold text-blue-900">SMKN 1</h4>
        <p class="text-sm font-bold text-blue-900">Dolok Sanggul</p>
        <p class="text-xs text-blue-900/80 mt-2 leading-relaxed">Mencetak generasi unggul, kompeten, dan berkarakter sejak tahun 1985.</p>
      </div>

      <div class="grid sm:grid-cols-2 gap-6">
        <div>
          <h5 class="text-xs font-bold text-blue-900">Identitas</h5>
          <p class="text-[11px] text-blue-900/80 leading-6"><span class="font-semibold">NPSN:</span> 10208704</p>
          <p class="text-[11px] text-blue-900/80 leading-6"><span class="font-semibold">Akreditasi:</span> A</p>
          <p class="text-[11px] text-blue-900/80 leading-6"><span class="font-semibold">Kepala Sekolah:</span> Togar Halomoan Nainggolan</p>
          <p class="text-[11px] text-blue-900/80 leading-6"><span class="font-semibold">Operator:</span> Ervina Juliarta Silaban</p>
        </div>

        <div>
          <h5 class="text-xs font-bold text-blue-900">Kontak</h5>
          <p class="text-[11px] text-blue-900/80 leading-6">Smkn1dolsa_14@yahoo.co.id</p>
          <p class="text-[11px] text-blue-900/80 leading-6">0633</p>
          <p class="text-[11px] text-blue-900/80 leading-6">JL. Bonan Dolok Km. 2,5</p>
          <p class="text-[11px] text-blue-900/80 leading-6">Humbang Hasundutan, Sumut</p>
        </div>

        <div class="sm:col-span-2">
          <h5 class="text-xs font-bold text-blue-900">Statistik</h5>
          <div class="grid grid-cols-2 gap-x-6 gap-y-2 mt-2">
            <div class="text-[11px] text-blue-900/80"><span class="font-semibold">Guru</span> <span class="font-bold">71</span></div>
            <div class="text-[11px] text-blue-900/80"><span class="font-semibold">Siswa Laki-laki</span> <span class="font-bold">362</span></div>
            <div class="text-[11px] text-blue-900/80"><span class="font-semibold">Siswa Perempuan</span> <span class="font-bold">792</span></div>
            <div class="text-[11px] text-blue-900/80"><span class="font-semibold">Total Siswa</span> <span class="font-bold">1.154</span></div>
            <div class="text-[11px] text-blue-900/80"><span class="font-semibold">Rombel</span> <span class="font-bold">36</span></div>
            <div class="text-[11px] text-blue-900/80"><span class="font-semibold">Ruang Kelas</span> <span class="font-bold">40</span></div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-6 border-t border-blue-600/20 pt-4">
      <p class="text-[11px] text-blue-900/70 leading-relaxed">&copy; 2026 SMK Negeri 1 Dolok Sanggul. Hak Cipta Dilindungi.</p>
    </div>
  </div>
</div>

{{-- LOGIN MODAL --}}
<div id="loginModal" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-[100] hidden items-center justify-center p-4">
<div class="bg-white w-full max-w-md rounded-[40px] overflow-hidden shadow-2xl scale-in max-h-[85vh] overflow-y-auto">
<div class="bg-primary p-6 text-white text-center">
<div class="w-16 h-16 bg-white/10 rounded-2xl mx-auto mb-3 flex items-center justify-center text-3xl"><i class="fas fa-sign-in-alt"></i></div>
<h3 class="text-2xl font-bold">Masuk ke Akun</h3>
<p class="text-blue-200 text-sm mt-1">Pilih Peran Anda untuk melanjutkan</p>
</div>
<div class="flex border-b">
<button onclick="switchLoginTab('student')" id="tab-student" class="flex-1 py-4 text-sm font-bold text-center transition bg-blue-50 text-primary border-b-2 border-primary"><i class="fas fa-user-graduate mr-2"></i>SISWA</button>
<button onclick="switchLoginTab('teacher')" id="tab-teacher" class="flex-1 py-4 text-sm font-bold text-center transition text-gray-400 hover:text-primary border-b-2 border-transparent"><i class="fas fa-chalkboard-teacher mr-2"></i>GURU/STAF</button>
<button onclick="switchLoginTab('admin')" id="tab-admin" class="flex-1 py-4 text-sm font-bold text-center transition text-gray-400 hover:text-primary border-b-2 border-transparent"><i class="fas fa-user-shield mr-2"></i>ADMIN</button>
</div>
<div id="panel-student" class="p-8">
<div class="flex justify-center mb-6">
<button onclick="toggleAuthMode('student','login')" id="mode-student-login" class="px-4 py-2 rounded-l-xl bg-primary text-white text-sm font-bold">Login</button>
<button onclick="toggleAuthMode('student','register')" id="mode-student-register" class="px-4 py-2 rounded-r-xl bg-gray-200 text-gray-600 text-sm font-bold hover:bg-gray-300">Daftar</button>
</div>
<form id="form-student-login" class="space-y-4" onsubmit="handleAuth(event,'login','student')">
<input type="text" name="username" placeholder="NISN (Username)" class="w-full p-4 bg-gray-50 border rounded-2xl outline-none focus:border-primary" required>
<input type="password" name="password" placeholder="Password" class="w-full p-4 bg-gray-50 border rounded-2xl outline-none focus:border-primary" required>
<button type="submit" class="w-full bg-primary text-white py-4 rounded-2xl font-bold shadow-xl hover:bg-blue-800 transition">MASUK SEBAGAI SISWA</button>
</form>
<form id="form-student-register" class="space-y-3 hidden" onsubmit="handleAuth(event,'register','student')">
<input type="text" name="nisn" placeholder="NISN" class="w-full p-3 bg-gray-50 border rounded-xl outline-none focus:border-primary" required>
<input type="text" name="nama" placeholder="Nama Lengkap" class="w-full p-3 bg-gray-50 border rounded-xl outline-none focus:border-primary" required>
<select name="gender" class="w-full p-3 bg-gray-50 border rounded-xl"><option value="L">Laki-laki</option><option value="P">Perempuan</option></select>
<select name="kelas" class="w-full p-3 bg-gray-50 border rounded-xl"><option value="X">X</option><option value="XI">XI</option><option value="XII">XII</option></select>
<select name="jurusan" class="w-full p-3 bg-gray-50 border rounded-xl"><option value="TKI">TKI - Teknik Komputer & Informatika</option><option value="BPM">BPM - Bisnis & Pemasaran</option><option value="MP">MP - Manajemen Perkantoran</option><option value="AK">AK - Akuntansi & Keuangan</option><option value="TK">TK - Tata Kecantikan</option><option value="TB">TB - Tata Busana</option><option value="PHP">PHP - Perhotelan & Pariwisata</option></select>
<input type="password" name="password" placeholder="Password" class="w-full p-3 bg-gray-50 border rounded-xl outline-none focus:border-primary" required>
<input type="password" name="password_confirmation" placeholder="Konfirmasi Password" class="w-full p-3 bg-gray-50 border rounded-xl outline-none focus:border-primary" required>
<button type="submit" class="w-full bg-green-600 text-white py-3 rounded-2xl font-bold shadow-xl hover:bg-green-700 transition">DAFTAR SEBAGAI SISWA</button>
</form>
</div>
<div id="panel-teacher" class="p-8 hidden">
<div class="flex justify-center mb-6">
<button onclick="toggleAuthMode('teacher','login')" id="mode-teacher-login" class="px-4 py-2 rounded-l-xl bg-primary text-white text-sm font-bold">Login</button>
<button onclick="toggleAuthMode('teacher','register')" id="mode-teacher-register" class="px-4 py-2 rounded-r-xl bg-gray-200 text-gray-600 text-sm font-bold hover:bg-gray-300">Daftar</button>
</div>
<form id="form-teacher-login" class="space-y-4" onsubmit="handleAuth(event,'login','teacher')">
<input type="text" name="username" placeholder="NIP (Username)" class="w-full p-4 bg-gray-50 border rounded-2xl outline-none focus:border-primary" required>
<input type="password" name="password" placeholder="Password" class="w-full p-4 bg-gray-50 border rounded-2xl outline-none focus:border-primary" required>
<button type="submit" class="w-full bg-primary text-white py-4 rounded-2xl font-bold shadow-xl hover:bg-blue-800 transition">MASUK SEBAGAI GURU</button>
</form>
<form id="form-teacher-register" class="space-y-3 hidden" onsubmit="handleAuth(event,'register','teacher')">
<input type="text" name="nip" placeholder="NIP" class="w-full p-3 bg-gray-50 border rounded-xl outline-none focus:border-primary" required>
<input type="text" name="nama" placeholder="Nama Lengkap" class="w-full p-3 bg-gray-50 border rounded-xl outline-none focus:border-primary" required>
<input type="text" name="jabatan" placeholder="Jabatan" class="w-full p-3 bg-gray-50 border rounded-xl outline-none focus:border-primary" required>
<input type="text" name="mapel" placeholder="Mata Pelajaran" class="w-full p-3 bg-gray-50 border rounded-xl outline-none focus:border-primary" required>
<input type="password" name="password" placeholder="Password" class="w-full p-3 bg-gray-50 border rounded-xl outline-none focus:border-primary" required>
<input type="password" name="password_confirmation" placeholder="Konfirmasi Password" class="w-full p-3 bg-gray-50 border rounded-xl outline-none focus:border-primary" required>
<button type="submit" class="w-full bg-green-600 text-white py-3 rounded-2xl font-bold shadow-xl hover:bg-green-700 transition">DAFTAR SEBAGAI GURU</button>
</form>
</div>
<div id="panel-admin" class="p-8 hidden">
<form id="form-admin-login" class="space-y-6" onsubmit="handleAuth(event,'login','admin')">
<input type="text" name="username" placeholder="Username Admin" class="w-full p-4 bg-gray-50 border rounded-2xl outline-none focus:border-primary" required>
<input type="password" name="password" placeholder="Password" class="w-full p-4 bg-gray-50 border rounded-2xl outline-none focus:border-primary" required>
<button type="submit" class="w-full bg-primary text-white py-4 rounded-2xl font-bold shadow-xl hover:bg-blue-800 transition">MASUK SEBAGAI ADMIN</button>
</form>
</div>
<div class="pb-6 text-center">
<button type="button" onclick="closeLoginModal()" class="text-gray-500 font-medium text-sm hover:text-primary">Batalkan</button>
</div>
</div>
</div>

<div id="adminPanel" class="hidden min-h-screen bg-slate-50">
<aside class="fixed left-0 top-0 h-full w-64 bg-primary text-white z-50 flex flex-col shadow-2xl">
<div class="p-6 border-b border-white/10">
<div class="flex items-center space-x-3">
<div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center"><i class="fas fa-graduation-cap text-xl"></i></div>
<span class="text-lg font-bold tracking-tight">SMKN 1 DS</span>
</div>
<p class="text-blue-200 text-xs mt-2">Panel Administrator</p>
</div>
<nav class="flex-1 p-4 space-y-2">
<button onclick="switchAdminTab('dashboard')" id="admin-nav-dashboard" class="w-full text-left px-4 py-3 rounded-xl bg-white/10 font-bold transition hover:bg-white/20 flex items-center"><i class="fas fa-chart-line w-6"></i> Dashboard</button>
<button onclick="switchAdminTab('students')" id="admin-nav-students" class="w-full text-left px-4 py-3 rounded-xl hover:bg-white/10 font-medium transition flex items-center"><i class="fas fa-users w-6"></i> Data Siswa</button>
<button onclick="switchAdminTab('teachers')" id="admin-nav-teachers" class="w-full text-left px-4 py-3 rounded-xl hover:bg-white/10 font-medium transition flex items-center"><i class="fas fa-chalkboard-teacher w-6"></i> Data Guru/Staf</button>
<button onclick="switchAdminTab('tracer')" id="admin-nav-tracer" class="w-full text-left px-4 py-3 rounded-xl hover:bg-white/10 font-medium transition flex items-center"><i class="fas fa-graduation-cap w-6"></i> Tracer Alumni</button>
</nav>
<div class="p-4 border-t border-white/10">
<button onclick="doLogout()" class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-xl font-bold transition flex items-center justify-center"><i class="fas fa-sign-out-alt mr-2"></i> LOGOUT</button>
</div>
</aside>
<div class="ml-64 p-8">
<div id="admin-tab-dashboard" class="hidden">
<div class="flex flex-col gap-8">
<div class="flex-1">
<h2 class="text-3xl font-bold text-gray-800 mb-2">Dashboard</h2>
<p class="text-gray-500 mb-6">Ringkasan data sekolah secara real-time</p>
<div class="grid md:grid-cols-3 gap-6">
<div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100">
<div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center text-primary text-2xl mb-4"><i class="fas fa-users"></i></div>
<p class="text-gray-500 text-sm">Total Siswa</p>
<p class="text-3xl font-black text-primary" id="dash-student-count">0</p>
</div>

<div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100">
<div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center text-green-600 text-2xl mb-4"><i class="fas fa-check-circle"></i></div>
<p class="text-gray-500 text-sm">Status Database</p>
<p class="text-3xl font-black text-green-600">Online</p>
</div>
</div>
</div>

<div class="flex-1">
<div class="bg-white rounded-[40px] shadow-xl border border-gray-100 overflow-hidden">
<div class="p-6 bg-gray-50 border-b">
<p class="text-xs text-gray-500 uppercase tracking-widest font-bold">Profil Sekolah</p>
<h3 class="text-xl font-bold text-primary mt-1">SMK Negeri 1 Dolok Sanggul</h3>
</div>
<div class="p-6 space-y-4">
<div class="flex items-start gap-4">
<div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center text-primary flex-shrink-0"><i class="fas fa-id-card"></i></div>
<div>
<p class="text-xs text-gray-400 uppercase tracking-wider font-bold">NPSN</p>
<p class="text-gray-800 font-bold">10208704</p>
</div>
</div>
<div class="flex items-start gap-4">
<div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center text-green-600 flex-shrink-0"><i class="fas fa-award"></i></div>
<div>
<p class="text-xs text-gray-400 uppercase tracking-wider font-bold">Akreditasi</p>
<p class="text-gray-800 font-bold">A</p>
</div>
</div>
<div class="flex items-start gap-4">
<div class="w-10 h-10 bg-yellow-100 rounded-xl flex items-center justify-center text-yellow-600 flex-shrink-0"><i class="fas fa-user-tie"></i></div>
<div>
<p class="text-xs text-gray-400 uppercase tracking-wider font-bold">Kepala Sekolah</p>
<p class="text-gray-800 font-bold">Togar Halomoan Nainggolan</p>
</div>
</div>

<div class="pt-2">
<p class="text-sm font-bold text-primary">Kontak</p>
<p class="text-sm text-gray-700">Smkn1dolsa_14@yahoo.co.id</p>
<p class="text-sm text-gray-700">0633</p>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="admin-tab-students" class="hidden">
<div class="flex justify-between items-center mb-8 gap-4 flex-col md:flex-row">
<div class="flex-1">
<h2 class="text-3xl font-bold text-gray-800">Data Siswa</h2>
</div>
<div class="flex flex-col md:flex-row items-start md:items-center gap-3 w-full md:w-auto">
<button onclick="openStudentModal()" class="bg-green-600 text-white px-6 py-3 rounded-2xl font-bold shadow-lg hover:bg-green-700 transition flex items-center"><i class="fas fa-plus-circle mr-2"></i> TAMBAH SISWA</button>
</div>
</div>

<div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
<table class="w-full text-left">
<thead class="bg-gray-100 text-gray-600 text-sm">
<tr>
<th class="p-5">NISN</th>
<th class="p-5">NAMA LENGKAP</th>
<th class="p-5 text-center">GENDER</th>
<th class="p-5">JURUSAN</th>
<th class="p-5">KELAS</th>
<th class="p-5 text-center">AKSI</th>
</tr>
</thead>
<tbody id="adminStudentTableBody" class="divide-y"></tbody>
</table>
</div>
</div>
<div id="admin-tab-teachers" class="hidden">
<div class="flex justify-between items-center mb-8">
<div>
<h2 class="text-3xl font-bold text-gray-800">Data Guru & Staf</h2>
<p class="text-gray-500">Kelola data guru dan staf pengajar</p>
</div>
<button onclick="openTeacherModal()" class="bg-green-600 text-white px-6 py-3 rounded-2xl font-bold shadow-lg hover:bg-green-700 transition flex items-center"><i class="fas fa-plus-circle mr-2"></i> TAMBAH GURU</button>
</div>
<div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
<table class="w-full text-left">
<thead class="bg-gray-100 text-gray-600 text-sm">
<tr><th class="p-5">NAMA</th><th class="p-5">JABATAN</th><th class="p-5">MAPEL</th><th class="p-5 text-center">AKSI</th></tr>
</thead>
<tbody id="adminTeacherTableBody" class="divide-y"></tbody>
</table>
</div>
</div>

<div id="admin-tab-tracer" class="hidden">
    <div class="flex justify-between items-center mb-8 gap-4 flex-col md:flex-row">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">Tracer Alumni</h2>
            <p class="text-gray-500">CRUD data alumni tracer</p>
        </div>
        <div class="flex items-center gap-3">
            <button type="button" onclick="openTracerPublicForm()" class="bg-blue-600 text-white px-6 py-3 rounded-2xl font-bold shadow-lg hover:bg-blue-700 transition flex items-center">
                <i class="fas fa-external-link-alt mr-2"></i> LIHAT FORM PUBLIC
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Form tambah/ubah --}}
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="p-8 bg-gray-50 border-b">
                <h3 class="text-2xl font-bold text-gray-800 mb-2" id="tracerCrudTitle">Form Tracer Alumni</h3>
                <p class="text-gray-500">Kirim atau perbarui data alumni tracer</p>
            </div>

            <form id="tracerFormAdmin" class="p-8 space-y-6" onsubmit="handleTracerSubmitAdmin(event)" autocomplete="off">
                @csrf
                <input type="hidden" id="tracerEditId">

                <input type="text" name="nama" id="tracer_nama" placeholder="Nama Lengkap" class="w-full p-4 border border-gray-200 rounded-2xl" required>

                <input type="number" name="angkatan" id="tracer_angkatan" placeholder="Angkatan (Tahun Lulus)" class="w-full p-4 border border-gray-200 rounded-2xl" min="1990" max="2100" required>

                <input type="text" name="pekerjaan_kuliah" id="tracer_pekerjaan" placeholder="Pekerjaan / PTN" class="w-full p-4 border border-gray-200 rounded-2xl" required>

                <select name="status" id="tracer_status" class="w-full p-4 border border-gray-200 rounded-2xl" required>
                    <option value="">Status Saat Ini</option>
                    <option value="kerja">Bekerja</option>
                    <option value="kuliah">Kuliah</option>
                    <option value="wirausaha">Wirausaha</option>
                </select>

                <textarea name="detail" id="tracer_detail" placeholder="Detail (Perusahaan/PTN)" class="w-full p-4 border border-gray-200 rounded-2xl h-32"></textarea>

                <div class="flex gap-3 pt-2">
                    <button type="submit" class="flex-1 bg-emerald-600 text-white py-4 rounded-2xl font-bold text-lg shadow-xl hover:bg-emerald-700">
                        Simpan Data Alumni
                    </button>
                    <button type="button" onclick="resetTracerForm()" class="flex-1 bg-gray-200 text-gray-700 py-4 rounded-2xl font-bold text-lg shadow-xl hover:bg-gray-300">
                        Batal
                    </button>
                </div>
            </form>
        </div>

        {{-- Tabel CRUD --}}
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="p-8 bg-gray-50 border-b flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                <div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Daftar Alumni Tracer</h3>
                    <p class="text-gray-500 text-sm">Kelola data melalui tombol Edit/Hapus</p>
                </div>
                <div class="relative w-full md:w-64">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400"><i class="fas fa-search text-sm"></i></span>
                    <input type="text" id="tracerSearchInput" placeholder="Cari nama/angkatan/status..." class="pl-10 pr-4 py-3 bg-white border border-gray-200 rounded-2xl outline-none focus:border-primary shadow-sm w-full text-sm" />
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="p-5">NAMA</th>
                            <th class="p-5 text-center">ANGKATAN</th>
                            <th class="p-5">PEKERJAAN/PTN</th>
                            <th class="p-5 text-center">STATUS</th>
                            <th class="p-5">DETAIL</th>
                            <th class="p-5 text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="adminTracerTableBody" class="divide-y"></tbody>
                </table>
            </div>

            <div class="p-6 bg-gray-50 border-t text-sm text-gray-600">
                <span class="font-bold" id="adminTracerTotal">0</span> data
            </div>
        </div>
    </div>
</div>

</div>
</div>

{{-- MODAL CRUD SISWA --}}
<div id="studentModal" class="fixed inset-0 bg-black/70 backdrop-blur-sm z-[110] hidden items-center justify-center p-4">
<div class="bg-white w-full max-w-lg rounded-[30px] overflow-hidden shadow-2xl">
<div class="bg-primary p-6 text-white text-center">
<h3 id="studentModalTitle" class="text-xl font-bold italic">Form Data Siswa</h3>
</div>
<form id="studentForm" class="p-8 space-y-4" onsubmit="handleStudentSubmit(event)">
<input type="hidden" id="studentEditId">
<input type="number" id="f_nisn" placeholder="Masukkan NISN" class="w-full p-3 bg-gray-50 border rounded-xl outline-none focus:border-primary" required>
<input type="text" id="f_nama" placeholder="Nama Lengkap" class="w-full p-3 bg-gray-50 border rounded-xl outline-none focus:border-primary" required>
<select id="f_gender" class="w-full p-3 bg-gray-50 border rounded-xl"><option value="L">Laki-laki</option><option value="P">Perempuan</option></select>
<select id="f_kelas" class="w-full p-3 bg-gray-50 border rounded-xl"><option value="X">X</option><option value="XI">XI</option><option value="XII">XII</option></select>
<select id="f_jurusan" class="w-full p-3 bg-gray-50 border rounded-xl"><option value="TKI">TKI - Teknik Komputer & Informatika</option><option value="BPM">BPM - Bisnis & Pemasaran</option><option value="MP">MP - Manajemen Perkantoran</option><option value="AK">AK - Akuntansi & Keuangan</option><option value="TK">TK - Tata Kecantikan</option><option value="TB">TB - Tata Busana</option><option value="PHP">PHP - Perhotelan & Pariwisata</option></select>
<div class="flex gap-3 pt-4">
<button type="submit" class="flex-1 bg-primary text-white py-3 rounded-xl font-bold">SIMPAN DATA</button>
<button type="button" onclick="closeStudentModal()" class="flex-1 bg-gray-200 text-gray-700 py-3 rounded-xl font-bold">BATAL</button>
</div>
</form>
</div>
</div>

<div id="teacherModal" class="fixed inset-0 bg-black/70 backdrop-blur-sm z-[110] hidden items-center justify-center p-4">
<div class="bg-white w-full max-w-lg rounded-[30px] overflow-hidden shadow-2xl">
<div class="bg-primary p-6 text-white text-center">
<h3 id="teacherModalTitle" class="text-xl font-bold italic">Form Data Guru/Staf</h3>
<p class="text-sm text-white/80 mt-2">Kelola data guru dan staf pengajar</p>
</div>
<form id="teacherForm" class="p-8 space-y-4" onsubmit="handleTeacherSubmit(event)">
<input type="hidden" id="teacherEditId">
<input type="text" id="tf_nama" placeholder="Nama Lengkap" class="w-full p-3 bg-gray-50 border rounded-xl outline-none focus:border-primary" required>
<input type="text" id="tf_jabatan" placeholder="Jabatan" class="w-full p-3 bg-gray-50 border rounded-xl outline-none focus:border-primary" required>
<input type="text" id="tf_mapel" placeholder="Mata Pelajaran" class="w-full p-3 bg-gray-50 border rounded-xl outline-none focus:border-primary" required>
<input type="text" id="tf_foto" placeholder="URL Foto (opsional)" class="w-full p-3 bg-gray-50 border rounded-xl outline-none focus:border-primary">
<div class="flex gap-3 pt-4">
<button type="submit" class="flex-1 bg-primary text-white py-3 rounded-xl font-bold">SIMPAN DATA</button>
<button type="button" onclick="closeTeacherModal()" class="flex-1 bg-gray-200 text-gray-700 py-3 rounded-xl font-bold">BATAL</button>
</div>
</form>
</div>
</div>

@endsection

@push('scripts')
<link rel="stylesheet" href="{{ asset('css/admin_public_hide.css') }}">
<script>window.__studentsData=@json($students);</script>
<script src="{{ asset('js/main.js') }}"></script>

@endpush


