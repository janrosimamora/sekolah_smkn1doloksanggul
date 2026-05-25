<nav id="navbar" class="fixed w-full z-50 transition-all duration-300 py-4 bg-white/90 backdrop-blur shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-white">
                <i class="fas fa-graduation-cap text-xl"></i>
            </div>
            <span class="navbar-school-title text-xl font-bold text-primary tracking-tight">SMK NEGERI 1 DOLOK SANGGUL</span>
        </div>

        <div class="navbar-desktop-only hidden md:flex items-center space-x-6 lg:space-x-8 text-gray-600 font-medium relative">
            
            <a href="/" class="hover:text-primary transition border-b-2 border-transparent hover:border-primary py-1">Beranda</a>

            <div class="group relative">
                <button class="hover:text-primary transition font-semibold flex items-center gap-1 py-1 border-b-2 border-transparent group-hover:border-primary">
                    Profil
                    <i class="fas fa-chevron-down text-xs group-hover:rotate-180 transition-transform"></i>
                </button>
                <div class="absolute top-full left-0 mt-2 w-52 bg-white rounded-2xl shadow-2xl border opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50 py-2">
                    <a href="#tentang" onclick="smoothScroll('#tentang'); return false;" class="block px-6 py-3 hover:bg-gray-50 transition text-left hover:text-primary">Tentang Sekolah</a>
                    <a href="#jurusan" onclick="smoothScroll('#jurusan'); return false;" class="block px-6 py-3 hover:bg-gray-50 transition text-left hover:text-primary">Jurusan</a>
                    <a href="#guru" onclick="smoothScroll('#guru'); return false;" class="block px-6 py-3 hover:bg-gray-50 transition text-left hover:text-primary">Guru &amp; Staf</a>
                </div>
            </div>

            <div class="group relative">
                <button class="hover:text-primary transition font-semibold flex items-center gap-1 py-1 border-b-2 border-transparent group-hover:border-primary">
                    Akademik
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div class="absolute top-full left-0 mt-2 w-56 bg-white rounded-2xl shadow-2xl border opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50 py-2">
                    <a href="#agenda" onclick="smoothScroll('#agenda'); return false;" class="block px-6 py-3 hover:bg-gray-50 transition text-left hover:text-primary">Agenda Kegiatan</a>
                    <a href="/erapor" class="block px-6 py-3 hover:bg-gray-50 transition text-left hover:text-primary">E-Rapor</a>
                    <a href="/download" class="block px-6 py-3 hover:bg-gray-50 transition text-left hover:text-primary">Download Center</a>
                </div>
            </div>

            <div class="group relative">
                <button class="hover:text-primary transition font-semibold flex items-center gap-1 py-1 border-b-2 border-transparent group-hover:border-primary">
                    Informasi
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div class="absolute top-full left-0 mt-2 w-64 bg-white rounded-2xl shadow-2xl border opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50 py-2">
                    <a href="#berita" onclick="smoothScroll('#berita'); return false;" class="block px-6 py-3 hover:bg-gray-50 transition text-left hover:text-primary">Berita &amp; Artikel</a>
                    <a href="#galeri" onclick="smoothScroll('#galeri'); return false;" class="block px-6 py-3 hover:bg-gray-50 transition text-left hover:text-primary">Galeri Foto</a>
                    <a href="/faq" class="block px-6 py-3 hover:bg-gray-50 transition text-left hover:text-primary">FAQ (Tanya Jawab PPDB)</a>
                </div>
            </div>

            {{-- Siswa dropdown --}}
            <div class="group relative">
                <button class="hover:text-primary transition font-semibold flex items-center gap-1 py-1 border-b-2 border-transparent group-hover:border-primary">
                    Siswa
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
                <div class="absolute top-full left-0 mt-2 w-64 bg-white rounded-2xl shadow-2xl border opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50 py-2 overflow-hidden">
                    <div class="px-6 py-3">
                        <p class="text-[11px] font-extrabold uppercase tracking-widest text-gray-500">Utama</p>
                        <a href="/ppdb" class="block mt-2 px-4 py-3 rounded-xl bg-primary text-white font-bold hover:bg-blue-900 transition text-left">
                            <i class="fas fa-clipboard-list mr-2"></i>Portal PPDB
                        </a>
                        <a href="#data-siswa" onclick="openStudentDataTab(); return false;" class="block mt-2 px-4 py-3 rounded-xl hover:bg-gray-50 transition text-left hover:text-primary">
                            <i class="fas fa-users mr-2"></i>Data Siswa
                        </a>
                    </div>
                    <div class="border-t border-gray-100"></div>
                    <div class="px-6 py-3">
                        <p class="text-[11px] font-extrabold uppercase tracking-widest text-gray-500">Pendukung</p>
                        <a href="/tracer" class="block px-4 py-3 hover:bg-gray-50 transition text-left hover:text-primary">Tracer Alumni</a>
                    </div>
                </div>
            </div>

            {{-- Login button paling kanan --}}
            <button type="button" onclick="openLoginModal()" class="bg-primary text-white px-6 py-2 rounded-xl font-bold hover:bg-blue-800 transition border border-transparent hover:border-white/20">
                LOGIN
            </button>
        </div>

        {{-- Mobile layout (<=768px) --}}
        <div class="navbar-mobile-only hidden items-center justify-end gap-3">
            {{-- Buttons: Beranda + Akademik + Hamburger --}}
            <div class="flex items-center gap-2 w-auto">
                <a href="/" class="navbar-mobile-btn navbar-mobile-btn-primary" style="white-space:nowrap;">Beranda</a>
                <a href="/" onclick="return smoothScroll('#agenda');" class="navbar-mobile-btn" style="white-space:nowrap;">Akademik</a>
                <button id="navbarHamburgerBtn" class="navbar-hamburger" type="button" aria-label="Buka menu">
                    <span class="sr-only">Menu</span>
                    <i class="fas fa-bars text-primary" style="font-size:18px"></i>
                </button>
            </div>
        </div>
    </div>
</nav>

        {{-- Mobile overlay menu + accordion (hanya muncul saat hamburger diklik) --}}
<div id="navbarMobileOverlay" class="navbar-overlay" aria-hidden="true">
    <div class="navbar-overlay-panel" role="dialog" aria-modal="true" aria-label="Menu">
        <div class="sr-only" aria-live="polite">Menu HP</div>
        <div class="navbar-menu">
            <button class="navbar-menu-item" data-acc="profil" type="button">
                <span>PROFIL</span>
                <span class="chevron" aria-hidden="true">
                    <i class="fas fa-chevron-down"></i>
                </span>
            </button>
            <div class="accordion-wrap" data-acc-content="profil">
                <div class="accordion-inner">
                    <div class="accordion-lead">Sub Menu</div>
                    <a href="#tentang" onclick="smoothScroll('#tentang'); return false;" class="navbar-menu-link" style="margin-top:6px; border:1px solid rgba(0,0,0,.06);">Tentang Sekolah</a>
                    <a href="#jurusan" onclick="smoothScroll('#jurusan'); return false;" class="navbar-menu-link" style="margin-top:6px; border:1px solid rgba(0,0,0,.06);">Jurusan</a>
                    <a href="#guru" onclick="smoothScroll('#guru'); return false;" class="navbar-menu-link" style="margin-top:6px; border:1px solid rgba(0,0,0,.06);">Guru &amp; Staf</a>
                </div>
            </div>

            <button class="navbar-menu-item" data-acc="info" type="button" style="margin-top:10px;">
                <span>INFORMASI</span>
                <span class="chevron" aria-hidden="true">
                    <i class="fas fa-chevron-down"></i>
                </span>
            </button>
            <div class="accordion-wrap" data-acc-content="info">
                <div class="accordion-inner">
                    <div class="accordion-lead">Sub Menu</div>
                    <a href="#berita" onclick="smoothScroll('#berita'); return false;" class="navbar-menu-link" style="margin-top:6px; border:1px solid rgba(0,0,0,.06);">Berita &amp; Kegiatan</a>
                    <a href="#galeri" onclick="smoothScroll('#galeri'); return false;" class="navbar-menu-link" style="margin-top:6px; border:1px solid rgba(0,0,0,.06);">Galeri Foto</a>
                    <a href="/faq" class="navbar-menu-link" style="margin-top:6px; border:1px solid rgba(0,0,0,.06);">FAQ</a>
                </div>
            </div>
        </div>
    </div>
</div>



