/* Responsive navbar mobile behavior
   - Toggle overlay with hamburger
   - Accordion smooth for PROFIL and INFORMASI
*/
(function(){
  const OVERLAY_ID = 'navbarMobileOverlay';
  const BTN_ID = 'navbarHamburgerBtn';

  const overlay = document.getElementById(OVERLAY_ID);
  const hamburgerBtn = document.getElementById(BTN_ID);

  const accordion = {
    profil: document.querySelector('[data-acc="profil"]'),
    profilContent: document.querySelector('[data-acc-content="profil"]'),
    info: document.querySelector('[data-acc="info"]'),
    infoContent: document.querySelector('[data-acc-content="info"]')
  };

  if(!overlay || !hamburgerBtn) return;

  function openOverlay(){
    overlay.classList.add('navbar-overlay--open');
    // prevent body scroll
    document.documentElement.style.overflow = 'hidden';
    document.body.style.overflow = 'hidden';
  }

  function closeOverlay(){
    overlay.classList.remove('navbar-overlay--open');
    document.documentElement.style.overflow = '';
    document.body.style.overflow = '';
  }

  hamburgerBtn.addEventListener('click', (e)=>{
    e.preventDefault();
    const isOpen = overlay.classList.contains('navbar-overlay--open');
    if(isOpen) closeOverlay();
    else openOverlay();
  });

  overlay.addEventListener('click', (e)=>{
    // close when clicking outside panel
    const panel = overlay.querySelector('.navbar-overlay-panel');
    if(!panel) return;
    if(e.target === overlay) closeOverlay();
  });

  document.addEventListener('keydown', (e)=>{
    if(e.key === 'Escape') closeOverlay();
  });

  function setupAccordion(btnEl, contentEl){
    if(!btnEl || !contentEl) return;

    let isOpen = false;

    // Ensure initial closed state
    contentEl.style.height = '0px';

    function close(){
      isOpen = false;
      btnEl.classList.remove('navbar-menu-item--active');
      contentEl.style.height = '0px';
    }

    function open(){
      isOpen = true;
      btnEl.classList.add('navbar-menu-item--active');
      contentEl.style.height = (contentEl.scrollHeight || 0) + 'px';
    }

    btnEl.addEventListener('click', (e)=>{
      e.preventDefault();

      // Elements for cross-close (may be null on some pages)
      const btnProfil = accordion.profil;
      const btnInfo = accordion.info;
      const cProfil = accordion.profilContent;
      const cInfo = accordion.infoContent;

      // close other accordion (accordion style: only one open)
      if(btnEl === btnProfil && btnInfo && btnInfo !== btnEl){
        const otherIsActive = btnInfo.classList.contains('navbar-menu-item--active');
        if(otherIsActive){
          btnInfo.classList.remove('navbar-menu-item--active');
          if(cInfo) cInfo.style.height = '0px';
        }
      }
      if(btnEl === btnInfo && btnProfil && btnProfil !== btnEl){
        const otherIsActive = btnProfil.classList.contains('navbar-menu-item--active');
        if(otherIsActive){
          btnProfil.classList.remove('navbar-menu-item--active');
          if(cProfil) cProfil.style.height = '0px';
        }
      }

      // toggle current
      if(isOpen) close();
      else{
        // wait next frame for smoother height transition
        requestAnimationFrame(()=> open());
      }
    });

    window.addEventListener('resize', ()=>{
      if(isOpen) contentEl.style.height = (contentEl.scrollHeight || 0) + 'px';
    });
  }

  setupAccordion(accordion.profil, accordion.profilContent);
  setupAccordion(accordion.info, accordion.infoContent);
})();




