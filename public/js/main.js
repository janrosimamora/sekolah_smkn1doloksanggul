studentsData=window.__studentsData||[],teachersData=[],currentPage=1,itemsPerPage=5,adminCurrentPage=1,adminItemsPerPage=5,teacherCurrentPage=1,teacherItemsPerPage=6,chartJurusanInstance=null,chartGenderInstance=null,studentEditingId=null,teacherEditingId=null,currentAdminTab='dashboard';
function getPaginatedData(data){const s=(currentPage-1)*itemsPerPage;return data.slice(s,s+itemsPerPage);}
function getTotalPages(data){return Math.ceil(data.length/itemsPerPage)||1;}
function renderPagination(data){const tp=getTotalPages(data);const st=data.length===0?0:(currentPage-1)*itemsPerPage+1;const en=Math.min(currentPage*itemsPerPage,data.length);const pi=document.getElementById('pageInfo');const ti=document.getElementById('totalInfo');if(pi)pi.innerText=data.length===0?'0 - 0':st+' - '+en;if(ti)ti.innerText=data.length;const bp=document.getElementById('btnPrev');const bn=document.getElementById('btnNext');if(bp)bp.disabled=currentPage<=1;if(bn)bn.disabled=currentPage>=tp;const pn=document.getElementById('pageNumbers');if(!pn)return;let h='';for(let i=1;i<=tp;i++){const a=i===currentPage?'bg-primary text-white border-primary':'bg-white text-gray-600 border-gray-200 hover:bg-primary hover:text-white hover:border-primary';h+=`<button onclick="goToPage(${i})" class="w-10 h-10 rounded-xl border transition flex items-center justify-center text-sm font-bold shadow-sm ${a}">${i}</button>`;}pn.innerHTML=h;}
window.goToPage=(p)=>{currentPage=p;renderPublicTable();};
window.changePage=(d)=>{const data=getActiveData();const tp=getTotalPages(data);const np=currentPage+d;if(np>=1&&np<=tp){currentPage=np;renderPublicTable();}};
function getActiveData(){const si=document.getElementById('searchInput');const v=si?si.value.toLowerCase():'';if(!v)return studentsData;return studentsData.filter(s=>(s.nama&&s.nama.toLowerCase().includes(v))||(s.nisn&&s.nisn.includes(v)));}
function renderPublicTable(){
  const data=getActiveData();
  const paginated=getPaginatedData(data);
  const tbody=document.getElementById('studentTableBody');
  if(tbody){
    if(paginated.length===0){
      tbody.innerHTML=`<tr><td colspan="5" class="p-8 text-center text-gray-400 font-medium">Tidak ada data siswa</td></tr>`;
    }else{
      tbody.innerHTML=paginated.map(s=>`<tr class="hover:bg-blue-50 transition"><td class="p-6 font-mono text-primary font-bold tracking-tighter">${s.nisn||''}</td><td class="p-6 font-bold text-gray-800 uppercase text-sm">${s.nama||''}</td><td class="p-6 text-center font-bold text-gray-400">${s.gender||''}</td><td class="p-6"><span class="px-4 py-1.5 bg-blue-100 text-blue-800 rounded-lg text-[10px] font-black uppercase tracking-widest border border-blue-200">${s.jurusan||''}</span></td><td class="p-6 text-sm text-gray-500">${s.kelas||''}</td></tr>`).join('');
    }
  }
  renderPagination(data);
  const hc=document.getElementById('hero-student-count');
  if(hc)hc.innerText=studentsData.length;
}

// Admin: render tabel siswa (Data Siswa di panel admin)
// function getActiveAdminData() sudah didefinisikan di bagian bawah

function renderTeachers(){
window.goToTeacherPage=(p)=>{teacherCurrentPage=p;renderTeachers();};
window.changeTeacherPage=(d)=>{const tp=Math.ceil(teachersData.length/teacherItemsPerPage)||1;const np=teacherCurrentPage+d;if(np>=1&&np<=tp){teacherCurrentPage=np;renderTeachers();}};
}

function updateCharts(){
  if(!chartJurusanInstance && !chartGenderInstance) return;
  const jc={TKI:0,BPM:0,MP:0,AK:0,TK:0,TB:0,PHP:0};
  studentsData.forEach(s=>{if(jc[s.jurusan]!==undefined)jc[s.jurusan]++;});
  const gc={L:0,P:0};
  studentsData.forEach(s=>{if(gc[s.gender]!==undefined)gc[s.gender]++;});
  if(chartJurusanInstance){
    chartJurusanInstance.data.datasets[0].data=[jc.TKI,jc.BPM,jc.MP,jc.AK,jc.TK,jc.TB,jc.PHP];
    chartJurusanInstance.update();
  }
  if(chartGenderInstance){
    chartGenderInstance.data.datasets[0].data=[gc.L,gc.P];
    chartGenderInstance.update();
  }
}

async function refreshData(){
  try{
    const res=await fetch('/api/students');
    console.log('[students] status',res.status);
    const data=await res.json();
    console.log('[students] payload',data);

    studentsData=Array.isArray(data)?data:[];
    currentPage=1;
    adminCurrentPage=1;
    renderPublicTable();
    renderAdminStudentTable();
    updateCharts();

    const dsc=document.getElementById('dash-student-count');
    if(dsc)dsc.innerText=studentsData.length;
  }catch(err){
    console.error('Gagal memuat siswa:',err);
    const tbody=document.getElementById('studentTableBody');
    if(tbody){
      tbody.innerHTML=`<tr><td colspan="5" class="p-8 text-center text-red-500 font-medium">Gagal memuat data siswa dari /api/students</td></tr>`;
    }
  }
}
async function refreshTeachers(){try{const res=await fetch('/api/teachers');const data=await res.json();teachersData=data;renderTeachers();renderAdminTeacherTable();const dtc=document.getElementById('dash-teacher-count');if(dtc)dtc.innerText=teachersData.length;}catch(err){console.error('Gagal memuat guru:',err);} }

let tracersData=[];
window.renderAdminTracerTable=()=>{const tbody=document.getElementById('adminTracerTableBody');if(!tbody)return;const q=document.getElementById('tracerSearchInput');const term=(q?q.value:'').toLowerCase().trim();let data=Array.isArray(tracersData)?tracersData:[];
if(term){data=data.filter(t=>{const nama=(t.nama||'').toLowerCase();const angk=String(t.angkatan||'');const st=(t.status||'').toLowerCase();return nama.includes(term)||angk.includes(term)||st.includes(term);});}
if(data.length===0){tbody.innerHTML=`<tr><td colspan="6" class="p-8 text-center text-gray-400 font-medium">Tidak ada data tracer</td></tr>`;const tot=document.getElementById('adminTracerTotal');if(tot)tot.innerText=0;return;}
const rows=data.map(t=>`<tr class="hover:bg-gray-50 transition border-b">
<td class="p-4 font-bold text-gray-800">${t.nama||''}</td>
<td class="p-4 text-center text-sm text-gray-600">${t.angkatan||''}</td>
<td class="p-4 text-sm text-gray-600">${t.pekerjaan_kuliah||''}</td>
<td class="p-4 text-center">
<span class="px-3 py-1.5 bg-blue-100 text-blue-800 rounded-lg text-[10px] font-black uppercase tracking-widest border border-blue-200">${(t.status||'').toUpperCase()}</span>
</td>
<td class="p-4 text-sm text-gray-600">${t.detail||''}</td>
<td class="p-4 text-center">
<div class="flex justify-center space-x-3">
<button onclick="editTracer(${t.id})" class="bg-blue-50 text-blue-600 p-3 rounded-xl hover:bg-blue-600 hover:text-white transition"><i class="fas fa-edit"></i></button>
<button onclick="deleteTracer(${t.id})" class="bg-red-50 text-red-600 p-3 rounded-xl hover:bg-red-600 hover:text-white transition"><i class="fas fa-trash"></i></button>
</div>
</td>
</tr>`).join('');
tbody.innerHTML=rows;const tot=document.getElementById('adminTracerTotal');if(tot)tot.innerText=data.length;};

async function refreshTracers(){try{
  const res=await fetch('/admin/tracer');
  const data=await res.json();
  tracersData=Array.isArray(data)?data:[];
  window.renderAdminTracerTable();
}catch(err){
  console.error('Gagal memuat tracer:',err);
}
}

window.resetTracerForm=()=>{
  const title=document.getElementById('tracerCrudTitle');
  const editId=document.getElementById('tracerEditId');
  const fNama=document.getElementById('tracer_nama');
  const fAngkatan=document.getElementById('tracer_angkatan');
  const fPekerjaan=document.getElementById('tracer_pekerjaan');
  const fStatus=document.getElementById('tracer_status');
  const fDetail=document.getElementById('tracer_detail');

  if(editId) editId.value='';
  if(fNama) fNama.value='';
  if(fAngkatan) fAngkatan.value='';
  if(fPekerjaan) fPekerjaan.value='';
  if(fStatus) fStatus.value='';
  if(fDetail) fDetail.value='';
  if(title) title.innerText='Form Tracer Alumni';
};

window.editTracer=(id)=>{
  const t=(tracersData||[]).find(x=>x.id===id);
  if(!t) return;
  const editId=document.getElementById('tracerEditId');
  const title=document.getElementById('tracerCrudTitle');
  const fNama=document.getElementById('tracer_nama');
  const fAngkatan=document.getElementById('tracer_angkatan');
  const fPekerjaan=document.getElementById('tracer_pekerjaan');
  const fStatus=document.getElementById('tracer_status');
  const fDetail=document.getElementById('tracer_detail');

  if(editId) editId.value=id;
  if(title) title.innerText='Ubah Data Tracer';
  if(fNama) fNama.value=t.nama||'';
  if(fAngkatan) fAngkatan.value=t.angkatan||'';
  if(fPekerjaan) fPekerjaan.value=t.pekerjaan_kuliah||'';
  if(fStatus) fStatus.value=t.status||'';
  if(fDetail) fDetail.value=t.detail||'';
};

window.deleteTracer=async(id)=>{
  const t=(tracersData||[]).find(x=>x.id===id);
  const name=t?.nama||'';
  if(!t) return;
  if(!confirm('Yakin ingin menghapus '+name+'?')) return;

  try{
    const res=await fetch('/admin/tracer/delete/'+id,{method:'DELETE',headers:{'X-CSRF-TOKEN':getCsrfToken(),'Accept':'application/json'}});
    const result=await res.json();
    if(result.success){
      await refreshTracers();
    }else{
      alert('Gagal menghapus tracer');
    }
  }catch(err){
    console.error(err);
    alert('Terjadi kesalahan');
  }
};

window.handleTracerSubmitAdmin=async(e)=>{
  e.preventDefault();
  const editId=document.getElementById('tracerEditId');
  const payload={
    nama:document.getElementById('tracer_nama').value,
    angkatan:document.getElementById('tracer_angkatan').value,
    pekerjaan_kuliah:document.getElementById('tracer_pekerjaan').value,
    status:document.getElementById('tracer_status').value,
    detail:document.getElementById('tracer_detail').value||null,
  };

  try{
    let res;
    if(editId && editId.value){
      res=await fetch('/admin/tracer/update/'+editId.value,{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':getCsrfToken(),'Accept':'application/json'},body:JSON.stringify(payload)});
    }else{
      res=await fetch('/tracer/store',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':getCsrfToken(),'Accept':'application/json'},body:JSON.stringify(payload)});
    }

    const result=await res.json();
    if(result.success){
      resetTracerForm();
      await refreshTracers();
    }else{
      alert('Gagal menyimpan tracer: '+(result.message||''));
    }
  }catch(err){
    console.error(err);
    alert('Terjadi kesalahan');
  }
};


function getCsrfToken(){const m=document.querySelector('meta[name="csrf-token"]');return m?m.getAttribute('content'):'';}
function updateCsrfToken(token){const m=document.querySelector('meta[name="csrf-token"]');if(m)m.setAttribute('content',token);}
function setNavbarVisible(show){const n=document.getElementById('navbar');if(n){if(show)n.classList.remove('hidden');else n.classList.add('hidden');}}
function downloadExcel(){alert('Menyiapkan file Excel... Data akan diekspor dari database Oracle.');}
function downloadPDF(){alert('Menyiapkan file PDF...');window.print();}
window.doLogout=async()=>{try{await fetch('/logout',{method:'POST',headers:{'X-CSRF-TOKEN':getCsrfToken(),'Accept':'application/json'}});}catch(_e){}try{document.body.classList.remove('admin-active');}catch(_e){}const ap=document.getElementById('adminPanel');if(ap){ap.classList.add('hidden');ap.style.display='none';}setNavbarVisible(true);const lm=document.getElementById('loginModal');if(lm){lm.style.display='none';lm.classList.add('hidden');}
try{const csrfRes=await fetch('/csrf-token',{headers:{'Accept':'application/json'}});const csrfData=await csrfRes.json();if(csrfData.csrf_token){updateCsrfToken(csrfData.csrf_token);}}catch(e){}
};

window.openLoginModal=()=>{try{document.body.classList.remove('admin-active');setNavbarVisible(false);

  const ap=document.getElementById('adminPanel');
  if(ap){ap.classList.add('hidden');ap.style.display='none';}

  // ensure mobile navbar overlay is not blocking clicks
const overlay=document.getElementById('navbarMobileOverlay');
  if(overlay){
    overlay.classList.remove('navbar-overlay--open');
    overlay.style.pointerEvents='none';
    overlay.style.opacity='0';
    overlay.style.display='none';
  }
  document.documentElement.style.overflow='';
  document.body.style.overflow='';

  const lm=document.getElementById('loginModal');
  if(lm){lm.style.display='flex';lm.classList.remove('hidden');}
}catch(e){console.error('openLoginModal error',e);} };

window.closeLoginModal=()=>{setNavbarVisible(true);const lm=document.getElementById('loginModal');if(lm){lm.style.display='none';lm.classList.add('hidden');}};
window.switchLoginTab=(tab)=>{['student','teacher','admin'].forEach(t=>{const p=document.getElementById('panel-'+t);const b=document.getElementById('tab-'+t);if(p)p.classList.add('hidden');if(b){b.classList.remove('bg-blue-50','text-primary','border-primary');b.classList.add('text-gray-400','border-transparent');}});const ap=document.getElementById('panel-'+tab);const ab=document.getElementById('tab-'+tab);if(ap){ap.classList.remove('hidden');ap.classList.add('block');}if(ab){ab.classList.remove('text-gray-400','border-transparent');ab.classList.add('bg-blue-50','text-primary','border-primary');}};
window.toggleAuthMode=(role,mode)=>{const l=document.getElementById('form-'+role+'-login');const r=document.getElementById('form-'+role+'-register');const bl=document.getElementById('mode-'+role+'-login');const br=document.getElementById('mode-'+role+'-register');if(mode==='login'){if(l)l.classList.remove('hidden');if(r)r.classList.add('hidden');if(bl){bl.classList.remove('bg-gray-200','text-gray-600');bl.classList.add('bg-primary','text-white');}if(br){br.classList.remove('bg-primary','text-white');br.classList.add('bg-gray-200','text-gray-600');}}else{if(l)l.classList.add('hidden');if(r)r.classList.remove('hidden');if(bl){bl.classList.remove('bg-primary','text-white');bl.classList.add('bg-gray-200','text-gray-600');}if(br){br.classList.remove('bg-gray-200','text-gray-600');br.classList.add('bg-primary','text-white');}}};

// Handle submit login/register modal (student/teacher/admin)
// NOTE: handleAuth versi awal di file ini kemungkinan duplikat/bertabrakan.
// Implementasi yang dipakai: pastikan role='admin' membuka panel admin tanpa reload.

window.handleAuth = async (event, mode, role) => {
  event.preventDefault();

  const form = event.target;
  if(!form) return;

  // register uses different endpoints
  let url = '/login';
  if(mode === 'register'){
    if(role === 'student') url = '/register-student';
    else if(role === 'teacher') url = '/register-teacher';
    else url = '/register';
  }

  // login uses /login
  if(mode === 'login') url = '/login';

  // collect payload
  const payload = {};
  new FormData(form).forEach((v,k)=>{ payload[k]=v; });

  try{
    const res = await fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': getCsrfToken(),
        'Accept': 'application/json'
      },
      body: JSON.stringify(payload)
    });

    let result = {};
    try{ result = await res.json(); }catch(_e){}

    if(!res.ok || !result.success){
      alert(result.message || 'Login gagal');
      return;
    }

    try {
      const csrfRes = await fetch('/csrf-token', { headers: { 'Accept': 'application/json' } });
      const csrfData = await csrfRes.json();
      if(csrfData.csrf_token) {
        updateCsrfToken(csrfData.csrf_token);
      }
    } catch(e) {
      console.error('Failed to update CSRF token', e);
    }

    // role-based UI
    if(role === 'admin'){
      try{document.body.classList.add('admin-active');}catch(_e){}

      const lm = document.getElementById('loginModal');
      if(lm){ lm.style.display='none'; lm.classList.add('hidden'); }

      const ap = document.getElementById('adminPanel');
      if(ap){ ap.classList.remove('hidden'); ap.style.display='block'; }

      // default tab dashboard
      if(typeof window.switchAdminTab === 'function'){
        window.switchAdminTab('dashboard');
      }
      return;
    }

    // non-admin: just close modal
    const lm = document.getElementById('loginModal');
    if(lm){ lm.style.display='none'; lm.classList.add('hidden'); }
  }catch(err){
    console.error(err);
    alert('Terjadi kesalahan saat login');
  }
};

function getActiveAdminData(){return studentsData;}
function getPaginatedAdminData(data){return data;}
function renderAdminStudentTable(){const tbody=document.getElementById('adminStudentTableBody');if(!tbody)return;const data=getActiveAdminData();const paginated=getPaginatedAdminData(data);
if(data.length===0){tbody.innerHTML=`<tr><td colspan="6" class="p-8 text-center text-gray-400 font-medium">Tidak ada data siswa</td></tr>`;return;}
tbody.innerHTML=paginated.map(s=>`<tr class="hover:bg-gray-50 transition border-b">
<td class="p-5 font-mono text-primary font-bold">${s.nisn||''}</td>
<td class="p-5 font-bold text-gray-800">${s.nama||''}</td>
<td class="p-5 text-sm text-gray-500">${s.gender||''}</td>
<td class="p-5 text-sm text-gray-500">${s.jurusan||''}</td>
<td class="p-5 text-sm text-gray-500">${s.kelas||''}</td>
<td class="p-5 flex justify-center space-x-3">
<button onclick="editStudent(${s.id})" class="bg-blue-50 text-blue-600 p-3 rounded-xl hover:bg-blue-600 hover:text-white transition"><i class="fas fa-edit"></i></button>
<button onclick="deleteStudent(${s.id})" class="bg-red-50 text-red-600 p-3 rounded-xl hover:bg-red-600 hover:text-white transition"><i class="fas fa-trash"></i></button>
</td>
</tr>`).join('');}

function renderAdminTeacherTable(){const tbody=document.getElementById('adminTeacherTableBody');if(!tbody)return;if(teachersData.length===0){tbody.innerHTML=`<tr><td colspan="4" class="p-8 text-center text-gray-400 font-medium">Belum ada data guru</td></tr>`;return;}
tbody.innerHTML=teachersData.map(t=>`<tr class="hover:bg-gray-50 transition border-b"><td class="p-5 font-bold text-gray-800">${t.nama||''}</td><td class="p-5 text-sm text-gray-500">${t.jabatan||''}</td><td class="p-5 text-sm text-gray-500">${t.mapel||''}</td><td class="p-5 flex justify-center space-x-3"><button onclick="editTeacher(${t.id})" class="bg-blue-50 text-blue-600 p-3 rounded-xl hover:bg-blue-600 hover:text-white transition"><i class="fas fa-edit"></i></button><button onclick="deleteTeacher(${t.id})" class="bg-red-50 text-red-600 p-3 rounded-xl hover:bg-red-600 hover:text-white transition"><i class="fas fa-trash"></i></button></td></tr>`).join('');}
window.openStudentModal=()=>{studentEditingId=null;const sf=document.getElementById('studentForm');if(sf)sf.reset();const se=document.getElementById('studentEditId');if(se)se.value='';const smt=document.getElementById('studentModalTitle');if(smt)smt.innerText='Tambah Siswa Baru';const sm=document.getElementById('studentModal');if(sm){sm.style.display='flex';sm.classList.remove('hidden');}};
window.closeStudentModal=()=>{const sm=document.getElementById('studentModal');if(sm){sm.style.display='none';sm.classList.add('hidden');}studentEditingId=null;};
window.editStudent=(id)=>{const s=studentsData.find(x=>x.id===id);if(!s)return;studentEditingId=id;const fn=document.getElementById('f_nisn');const fa=document.getElementById('f_nama');const fg=document.getElementById('f_gender');const fk=document.getElementById('f_kelas');const fj=document.getElementById('f_jurusan');if(fn)fn.value=s.nisn||'';if(fa)fa.value=s.nama||'';if(fg)fg.value=s.gender||'L';if(fk)fk.value=s.kelas||'X';if(fj)fj.value=s.jurusan||'TKI';const smt=document.getElementById('studentModalTitle');if(smt)smt.innerText='Ubah Data Siswa';const sm=document.getElementById('studentModal');if(sm){sm.style.display='flex';sm.classList.remove('hidden');}};
window.deleteStudent=async(id)=>{const s=studentsData.find(x=>x.id===id);if(!s||!confirm('Yakin ingin menghapus '+s.nama+'?'))return;try{const res=await fetch('/admin/students/delete/'+id,{method:'DELETE',headers:{'X-CSRF-TOKEN':getCsrfToken(),'Accept':'application/json'}});const result=await res.json();if(result.success){await refreshData();}else{alert('Gagal menghapus');}}catch(err){console.error(err);alert('Terjadi kesalahan');}};
async function handleStudentSubmit(e){e.preventDefault();const payload={nisn:document.getElementById('f_nisn').value,nama:document.getElementById('f_nama').value,gender:document.getElementById('f_gender').value,kelas:document.getElementById('f_kelas').value,jurusan:document.getElementById('f_jurusan').value};try{let url='/admin/students/store';let method='POST';if(studentEditingId){url='/admin/students/update/'+studentEditingId;}const res=await fetch(url,{method:method,headers:{'Content-Type':'application/json','X-CSRF-TOKEN':getCsrfToken(),'Accept':'application/json'},body:JSON.stringify(payload)});let result={};try{result=await res.json();}catch(_e){}if(result.success){switchAdminTab('students');closeStudentModal();await refreshData();renderAdminStudentTable();}else{alert('Gagal menyimpan: '+(result.message||'Response tidak valid'));}}catch(err){console.error(err);alert('Terjadi kesalahan');}}

window.openTeacherModal=()=>{teacherEditingId=null;const tf=document.getElementById('teacherForm');if(tf)tf.reset();const te=document.getElementById('teacherEditId');if(te)te.value='';const tmt=document.getElementById('teacherModalTitle');if(tmt)tmt.innerText='Tambah Guru/Staf Baru';const tm=document.getElementById('teacherModal');if(tm){tm.style.display='flex';tm.classList.remove('hidden');}};
window.closeTeacherModal=()=>{const tm=document.getElementById('teacherModal');if(tm){tm.style.display='none';tm.classList.add('hidden');}teacherEditingId=null;};
window.editTeacher=(id)=>{const t=teachersData.find(x=>x.id===id);if(!t)return;teacherEditingId=id;const tn=document.getElementById('tf_nama');const tj=document.getElementById('tf_jabatan');const tm=document.getElementById('tf_mapel');const tf=document.getElementById('tf_foto');if(tn)tn.value=t.nama||'';if(tj)tj.value=t.jabatan||'';if(tm)tm.value=t.mapel||'';if(tf)tf.value=t.foto||'';const tmt=document.getElementById('teacherModalTitle');if(tmt)tmt.innerText='Ubah Data Guru/Staf';const tmo=document.getElementById('teacherModal');if(tmo){tmo.style.display='flex';tmo.classList.remove('hidden');}};
window.deleteTeacher=async(id)=>{const t=teachersData.find(x=>x.id===id);if(!t||!confirm('Yakin ingin menghapus '+t.nama+'?'))return;try{const res=await fetch('/admin/teachers/delete/'+id,{method:'DELETE',headers:{'X-CSRF-TOKEN':getCsrfToken(),'Accept':'application/json'}});const result=await res.json();if(result.success){await refreshTeachers();}else{alert('Gagal menghapus');}}catch(err){console.error(err);alert('Terjadi kesalahan');}};
async function handleTeacherSubmit(e){e.preventDefault();const payload={nama:document.getElementById('tf_nama').value,jabatan:document.getElementById('tf_jabatan').value,mapel:document.getElementById('tf_mapel').value,foto:document.getElementById('tf_foto').value||null};try{let url='/admin/teachers/store';let method='POST';if(teacherEditingId){url='/admin/teachers/update/'+teacherEditingId;}const res=await fetch(url,{method:method,headers:{'Content-Type':'application/json','X-CSRF-TOKEN':getCsrfToken(),'Accept':'application/json'},body:JSON.stringify(payload)});const result=await res.json();if(result.success){closeTeacherModal();await refreshTeachers();}else{alert('Gagal menyimpan: '+(result.message||''));}}catch(err){console.error(err);alert('Terjadi kesalahan');}}
function animateCounters(){const cards=document.querySelectorAll('[data-target]');cards.forEach(card=>{const target=parseFloat(card.getAttribute('data-target'));const count=card.querySelector('div');let start=0;const increment=target/100;const timer=setInterval(()=>{start+=increment;count.textContent=Math.floor(start).toLocaleString();if(start>=target){count.textContent=target.toLocaleString();clearInterval(timer);}},20);});}
function smoothScroll(target){const element=document.querySelector(target);if(element){element.scrollIntoView({behavior:'smooth'});}}
function openStudentDataTab(){
    const main=document.getElementById('main-content');
    const ds=document.getElementById('data-siswa');
    const ap=document.getElementById('adminPanel');

    if(ap){ap.classList.add('hidden');ap.style.display='none';}
    if(main) main.classList.add('hidden');

    if(ds){ds.classList.remove('hidden');ds.scrollIntoView({behavior:'smooth'});}
    renderPublicTable();
}
function scrollToPrestasi(){document.getElementById('data-siswa').scrollIntoView({behavior:'smooth'});}
function openPrestasiModal(){alert('🎉 Prestasi SMKN 1 Dolok Sanggul:\n• 127 Juara Lomba Tingkat Provinsi/Nasional\\n• 45 Siswa Berprestasi Akademik\\n• Juara 1 Debat Bahasa Inggris Sumut\\n• Juara 1 Futsal Internal School');}
function openPtModal(){alert('📚 Lulusan Masuk PTN/Poltek:\n• 85% Lulusan diterima PTN/Poltek\\n• ITB, UNDIP, USU, Poltek Negeri\\n• Beasiswa KIP Kuliah & Prestasi');}
function openKerjaModal(){alert('💼 Penempatan Kerja:\n• 92% Lulusan langsung kerja\\n• Mitra industri: Telkom, Bank Sumut, Hotel Horas\\n• Program Magang & Sertifikasi BNSP');}
function openPpdbModal(){window.location.href='/ppdb';}
window.openTracerPublicForm=()=>{window.location.href='/tracer';};
function openBeritaModal(){alert('📰 Berita Terbaru:\n1. Lomba Debat - Juara 1 Provinsi\\n2. Workshop Oracle Database\\n3. Pekan Olahraga Sekolah\\n\nLihat update lengkap di Instagram @smkn1dolsa');}
function openGalleryModal(){alert('🖼️ Galeri Lengkap:\nFoto kegiatan, fasilitas lab, lapangan,\\nupacara, ekstrakurikuler tersedia di\\nInstagram @smkn1dolsa');}
function toggleDarkMode(){document.body.classList.toggle('dark');localStorage.setItem('darkMode',document.body.classList.contains('dark'));}
window.handlePpdbSubmit=async(e)=>{e.preventDefault();const form=document.getElementById('ppdbForm');if(!form)return;const fd=new FormData(form);const payload={};fd.forEach((v,k)=>payload[k]=v);try{const res=await fetch('/ppdb/store',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':getCsrfToken(),'Accept':'application/json'},body:JSON.stringify(payload)});const result=await res.json();if(result.success){alert('PPDB berhasil dikirim.');form.reset();}else{alert(result.message||'Gagal mengirim PPDB');}}catch(err){console.error(err);alert('Terjadi kesalahan saat mengirim PPDB');}};
window.handleTracerSubmit=async(e)=>{e.preventDefault();const form=document.getElementById('tracerFormAdmin')||document.getElementById('tracerForm');if(!form)return;const fd=new FormData(form);const payload={};fd.forEach((v,k)=>payload[k]=v);try{const res=await fetch('/tracer/store',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':getCsrfToken(),'Accept':'application/json'},body:JSON.stringify(payload)});const result=await res.json();if(result.success){alert('Terima kasih! Data tracer alumni berhasil dikirim.');form.reset();window.location.href='/tracer';}else{alert(result.message||'Gagal mengirim tracer alumni');}}catch(err){console.error(err);alert('Terjadi kesalahan saat mengirim tracer alumni');}};
// Admin tab switch (dashboard/students/teachers/tracer)
window.switchAdminTab=(tab)=>{
  currentAdminTab=tab;
  // activate admin mode (hide public content)
  try{document.body.classList.add('admin-active');}catch(_e){}

  // ensure admin panel visible
  const ap=document.getElementById('adminPanel');
  if(ap){ap.classList.remove('hidden');ap.style.display='block';}

  // ensure navbar hidden in admin mode
  setNavbarVisible(false);
  // hide all
  ['dashboard','students','teachers','tracer'].forEach(t=>{
    const el=document.getElementById('admin-tab-'+t);
    const nav=document.getElementById('admin-nav-'+t);
    if(el) el.classList.add('hidden');
    if(nav){
      nav.classList.remove('bg-white/10','font-bold');
      nav.classList.add('hover:bg-white/10','font-medium');
    }
  });
  // show selected
  const ael=document.getElementById('admin-tab-'+tab);
  const anav=document.getElementById('admin-nav-'+tab);
  if(ael) ael.classList.remove('hidden');
  if(anav){
    anav.classList.remove('hover:bg-white/10','font-medium');
    anav.classList.add('bg-white/10','font-bold');
  }
  if(tab==='tracer'){
    try{ refreshTracers && refreshTracers(); }catch(e){}
  }
};

document.addEventListener('DOMContentLoaded',()=>{
  window.__studentsData = window.__studentsData || [];
  studentsData = window.__studentsData;

  renderPublicTable();
  refreshTeachers();
  refreshData();
  if(document.getElementById('admin-tab-tracer')||document.getElementById('admin-tab-tracer')){ /* noop */ }
  // tracer CRUD
  try{
    if(document.getElementById('adminTracerTableBody')||document.getElementById('tracerSearchInput')){
      refreshTracers();
      const qs=document.getElementById('tracerSearchInput');
      if(qs) qs.addEventListener('input', ()=>window.renderAdminTracerTable());
    }
  }catch(_e){}



  const dsc = document.getElementById('dash-student-count');
  if (dsc) dsc.innerText = studentsData.length;

  const cj = document.getElementById('chartJurusan');
  const cg = document.getElementById('chartGender');

  if (window.Chart) {
    if (cj) {
      chartJurusanInstance = new Chart(cj.getContext('2d'), {
        type: 'bar',
        data: {
          labels: ['TKI','BPM','MP','AK','TK','TB','PHP'],
          datasets: [{
            label: 'Jumlah Siswa',
            data: [0,0,0,0,0,0,0],
            backgroundColor: ['#1e3a8a','#db2777','#f59e0b','#16a34a','#9333ea','#f97316','#0891b2'],
            borderRadius: 10
          }]
        }
      });
    }

    if (cg) {
      chartGenderInstance = new Chart(cg.getContext('2d'), {
        type: 'doughnut',
        data: {
          labels: ['Laki-laki','Perempuan'],
          datasets: [{
            data: [0,0],
            backgroundColor: ['#1e3a8a','#f59e0b'],
            borderWidth: 0
          }]
        }
      });
    }
  }

  updateCharts();
  animateCounters();

  if (localStorage.getItem('darkMode') === 'true') {
    document.body.classList.add('dark');
  }

  const si = document.getElementById('searchInput');
  if (si) si.addEventListener('input', () => { currentPage = 1; renderPublicTable(); });
});
