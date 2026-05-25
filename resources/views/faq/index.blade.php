@extends('layouts.app')
@section('title', 'FAQ PPDB - SMKN 1 Dolok Sanggul')

@section('content')
<div class="pt-24 pb-24 bg-white">
  <div class="max-w-4xl mx-auto px-4">
    <h1 class="text-4xl font-bold text-gray-800 mb-4 text-center">FAQ (Tanya Jawab PPDB)</h1>
    <p class="text-gray-500 text-center mb-12">Klik pertanyaan untuk melihat jawaban.</p>

    <div class="space-y-4">
      <div class="border border-gray-200 rounded-2xl overflow-hidden">
        <button type="button" class="faq-accordion w-full px-6 py-5 flex items-center justify-between gap-4 text-left bg-white hover:bg-gray-50">
          <span class="font-bold text-gray-800">
            Pendaftaran (PPDB) — Bagaimana cara mendaftar sebagai siswa baru di SMK N 1 Dolok Sanggul?
          </span>
          <span class="faq-icon w-9 h-9 rounded-xl flex items-center justify-center bg-primary/10 text-primary font-black">+</span>
        </button>
        <div class="faq-panel max-h-0 overflow-hidden transition-[max-height] duration-500 ease-in-out" style="max-height:0px">
          <div class="px-6 pb-6">
            Pendaftaran dapat dilakukan secara online melalui menu <b>Siswa > Portal PPDB</b> di website ini atau datang langsung ke ruang sekretariat pendaftaran pada jam kerja dengan membawa dokumen persyaratan.
          </div>
        </div>
      </div>

      <div class="border border-gray-200 rounded-2xl overflow-hidden">
        <button type="button" class="faq-accordion w-full px-6 py-5 flex items-center justify-between gap-4 text-left bg-white hover:bg-gray-50">
          <span class="font-bold text-gray-800">
            Pendaftaran (PPDB) — Apa saja syarat dokumen yang harus disiapkan?
          </span>
          <span class="faq-icon w-9 h-9 rounded-xl flex items-center justify-center bg-primary/10 text-primary font-black">+</span>
        </button>
        <div class="faq-panel max-h-0 overflow-hidden transition-[max-height] duration-500 ease-in-out" style="max-height:0px">
          <div class="px-6 pb-6">
            Fotokopi Ijazah/SKL SMP, Kartu Keluarga, Akta Kelahiran, Pas Foto 3x4, dan KIP (jika ada).
          </div>
        </div>
      </div>

      <div class="border border-gray-200 rounded-2xl overflow-hidden">
        <button type="button" class="faq-accordion w-full px-6 py-5 flex items-center justify-between gap-4 text-left bg-white hover:bg-gray-50">
          <span class="font-bold text-gray-800">
            Pendaftaran (PPDB) — Apakah ada biaya pendaftaran?
          </span>
          <span class="faq-icon w-9 h-9 rounded-xl flex items-center justify-center bg-primary/10 text-primary font-black">+</span>
        </button>
        <div class="faq-panel max-h-0 overflow-hidden transition-[max-height] duration-500 ease-in-out" style="max-height:0px">
          <div class="px-6 pb-6">
            Pendaftaran siswa baru (PPDB) di SMK Negeri 1 Dolok Sanggul tidak dipungut biaya (Gratis).
          </div>
        </div>
      </div>

      <div class="border border-gray-200 rounded-2xl overflow-hidden">
        <button type="button" class="faq-accordion w-full px-6 py-5 flex items-center justify-between gap-4 text-left bg-white hover:bg-gray-50">
          <span class="font-bold text-gray-800">
            Jurusan & Pembelajaran — Jurusan apa saja yang tersedia di SMK N 1 Dolok Sanggul?
          </span>
          <span class="faq-icon w-9 h-9 rounded-xl flex items-center justify-center bg-primary/10 text-primary font-black">+</span>
        </button>
        <div class="faq-panel max-h-0 overflow-hidden transition-[max-height] duration-500 ease-in-out" style="max-height:0px">
          <div class="px-6 pb-6">
            Kami memiliki beberapa kompetensi keahlian unggulan, di antaranya: Teknik Komputer &amp; Informatika (TKI), Akuntansi (AK), Manajemen Perkantoran (MP), Bisnis &amp; Pemasaran (BPM), dan lainnya.
          </div>
        </div>
      </div>

      <div class="border border-gray-200 rounded-2xl overflow-hidden">
        <button type="button" class="faq-accordion w-full px-6 py-5 flex items-center justify-between gap-4 text-left bg-white hover:bg-gray-50">
          <span class="font-bold text-gray-800">
            Jurusan & Pembelajaran — Apakah siswa akan mendapatkan bantuan prakerin (magang)?
          </span>
          <span class="faq-icon w-9 h-9 rounded-xl flex items-center justify-center bg-primary/10 text-primary font-black">+</span>
        </button>
        <div class="faq-panel max-h-0 overflow-hidden transition-[max-height] duration-500 ease-in-out" style="max-height:0px">
          <div class="px-6 pb-6">
            Ya, sekolah bekerja sama dengan berbagai instansi dan dunia industri untuk menempatkan siswa dalam program Praktik Kerja Industri (Prakerin) sesuai jurusan masing-masing.
          </div>
        </div>
      </div>

      <div class="border border-gray-200 rounded-2xl overflow-hidden">
        <button type="button" class="faq-accordion w-full px-6 py-5 flex items-center justify-between gap-4 text-left bg-white hover:bg-gray-50">
          <span class="font-bold text-gray-800">
            Fasilitas — Apakah sekolah menyediakan asrama atau beasiswa?
          </span>
          <span class="faq-icon w-9 h-9 rounded-xl flex items-center justify-center bg-primary/10 text-primary font-black">+</span>
        </button>
        <div class="faq-panel max-h-0 overflow-hidden transition-[max-height] duration-500 ease-in-out" style="max-height:0px">
          <div class="px-6 pb-6">
            Sekolah menyediakan berbagai jalur beasiswa seperti PIP/KIP dan beasiswa prestasi bagi siswa yang memenuhi syarat. Untuk informasi asrama, silakan hubungi admin melalui tombol WhatsApp.
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  function setupFaqAccordion(){
    const accordions = document.querySelectorAll('.faq-accordion');
    accordions.forEach(btn=>{
      btn.addEventListener('click', ()=>{
        const panel = btn.nextElementSibling;
        const icon = btn.querySelector('.faq-icon');
        const isOpen = panel && panel.style.maxHeight && panel.style.maxHeight !== '0px';

        // close all
        document.querySelectorAll('.faq-panel').forEach(p=>{
          if(p) p.style.maxHeight = '0px';
        });
        document.querySelectorAll('.faq-icon').forEach(i=>{
          if(i) i.textContent = '+';
        });

        if(!panel) return;
        if(isOpen) return;

        panel.style.maxHeight = panel.scrollHeight + 'px';
        if(icon) icon.textContent = '-';
      });
    });
  }
  document.addEventListener('DOMContentLoaded', setupFaqAccordion);
</script>
@endpush

