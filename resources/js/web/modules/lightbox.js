(function () {

  const selectors = {
    html: 'html',
    btnOpen: '[data-lightbox-open]',
    btnClose: '[data-lightbox-close]',
    image: '[data-lightbox-image]'
  };

  const init = () => {

    // Add event listener on all open buttons
    const btnsOpen = [].slice.call(
      document.querySelectorAll(selectors.btnOpen)
    );
    btnsOpen.forEach(function (btn) {
      btn.addEventListener("click", function(){
        show();
      }, false);
    });

    // Add event listener on all close buttons
    const btnsClose = [].slice.call(
      document.querySelectorAll(selectors.btnClose)
    );
    btnsClose.forEach(function (btn) {
      btn.addEventListener("click", function(){
        hide();
      }, false);
    });

    // Add event listener on escape key
    document.addEventListener('keydown', function(event) {
      if (event.key === 'Escape') {
        hide();
      }
    });

    // Add event listener on outside click
    const image = document.querySelector(selectors.image);
    if (!image) return;
    image.addEventListener('click', function(event) {
      if (event.target === this) {
        hide();
      }
    });
  };

  const show = () => {
    const image = document.querySelector(selectors.image);
    image.classList.toggle('hidden');

    const html = document.querySelector(selectors.html);
    html.classList.toggle('overflow-hidden');
  };

  const hide = () => {
    const image = document.querySelector(selectors.image);
    image.classList.toggle('hidden');
    
    const html = document.querySelector(selectors.html);
    html.classList.remove('overflow-hidden');
  };

  init();
  
})();