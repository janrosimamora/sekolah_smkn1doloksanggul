<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 1 DOLOK SANGGUL</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/navbar-responsive.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'sans-serif'] },
                    colors: { primary: '#1e3a8a', accent: '#f59e0b' }
                }
            }
        }
    </script>
<style>
        .gradient-text { @apply bg-clip-text text-transparent bg-gradient-to-r from-blue-900 to-blue-600; }
        .fade-in { animation: fadeIn 0.8s ease-in; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        .dark { 
            color-scheme: dark;
            background-color: #0f172a;
            color: white;
        }
        .dark * { 
            color: white !important;
        }
        .dark .bg-white { background-color: #1e293b !important; }
        .dark .bg-gray-50 { background-color: #1e1e1e !important; }
        .dark .bg-primary { background-color: #1e40af !important; }
        .dark .text-gray-800 { color: #f1f5f9 !important; }
        .dark .text-primary { color: #60a5fa !important; }
        .dark .border-gray-100 { border-color: #334155 !important; }
        .dark input, .dark select, .dark textarea { 
            background-color: #1e293b !important;
            border-color: #475569 !important;
            color: white !important;
        }
        .dark .bg-gray-100 { background-color: #334155 !important; }
        .admin-active #main-content,
        .admin-active #data-siswa,
        .admin-active .admin-hide-on-public { display: none !important; }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    
@include('layouts.partials.navbar')

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Navbar dropdown close on outside click or route change
  document.addEventListener('click', function(e) {
    if (!e.target.closest('.group')) {
      // Close any open dropdowns (CSS handles hover)
    }
  });

  // Prevent scroll jump on # links from new pages
  const hashLinks = document.querySelectorAll('a[href^="#"]');
  hashLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        target.scrollIntoView({ behavior: 'smooth' });
      }
    });
  });
});
</script>

@yield('content')

{{-- Flash message for tracer alumni after admin submit --}}
@if(session('tracer_success'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const el = document.getElementById('tracer-alumni');
            if (el) el.scrollIntoView({behavior:'smooth', block:'start'});
        });
    </script>
@endif

    {{-- Floating WhatsApp --}}
    <div class="fixed bottom-5 right-5 z-[9999]">
      <div class="relative">
        <div class="hidden" id="waChooser">
          {{-- placeholder --}}
        </div>
        <div class="flex flex-col items-end gap-2" id="waActions" aria-label="WhatsApp Quick Options">
          <div class="flex flex-col gap-2">
            <a id="waOptionUmum" href="https://wa.me/6282285753095?text=Halo%20Admin%20SMK%20N%201%20Dolok%20Sanggul%2C%20saya%20ingin%20bertanya%20mengenai%20informasi%20umum%20seputar%20sekolah.%20Terima%20kasih." target="_blank" class="hidden wa-option px-4 py-2 bg-white/90 backdrop-blur border border-gray-200 shadow-lg rounded-2xl text-sm font-bold text-gray-800 hover:bg-gray-50 transition">
              Tanya Umum
            </a>
            <a id="waOptionPpdb" href="https://wa.me/6282285753095?text=Halo%20Panitia%20PPDB%20SMKN%201%20Dolok%20Sanggul%2C%20saya%20%5BNama%20Anda%5D%20ingin%20menanyakan%20syarat%20pendaftaran%20dan%20jadwal%20seleksi%20untuk%20tahun%20ajaran%20baru.%20Mohon%20informasinya." target="_blank" class="hidden wa-option px-4 py-2 bg-white/90 backdrop-blur border border-gray-200 shadow-lg rounded-2xl text-sm font-bold text-gray-800 hover:bg-gray-50 transition">
              PPDB (Calon Siswa)
            </a>
          </div>
          <button id="waMainBtn" type="button" class="w-14 h-14 rounded-full bg-[#25D366] text-white shadow-2xl flex items-center justify-center hover:opacity-95 transition">
            <i class="fab fa-whatsapp text-2xl"></i>
          </button>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', ()=>{
        const btn = document.getElementById('waMainBtn');
        const opts = document.querySelectorAll('.wa-option');
        if(!btn || opts.length === 0) return;

        btn.addEventListener('click', (e)=>{
          e.stopPropagation();
          const open = !opts[0].classList.contains('hidden');
          opts.forEach(o=>{
            if(open) o.classList.add('hidden');
            else o.classList.remove('hidden');
          });
        });

        document.addEventListener('click', ()=>{
          opts.forEach(o=>o.classList.add('hidden'));
        });
      });
    </script>

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/navbar-responsive.js') }}"></script>
    <script src="{{ asset('js/debug_login_nav.js') }}"></script>


    {{-- LOGIN MODAL (untuk semua halaman) --}}
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

    @stack('scripts')
</body>
</html>



