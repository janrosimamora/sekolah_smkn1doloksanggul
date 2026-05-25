// Debug helper for navbar login click issues
(function(){
  function attach(){
    const btns=[...document.querySelectorAll('button[onclick="openLoginModal()"], button[onclick^="openLoginModal" i]')];
    if(btns.length===0) return;

    console.log('[DEBUG] found login buttons', btns.length);

    btns.forEach((b,idx)=>{
      b.addEventListener('click', (e)=>{
        console.log('[DEBUG] LOGIN clicked', {idx, hasOpenLoginModal: typeof window.openLoginModal !== 'undefined'});
        // do not prevent; let existing inline onclick run
      }, {capture:true});
    });
  }

  if(document.readyState==='loading') document.addEventListener('DOMContentLoaded', attach);
  else attach();
})();


