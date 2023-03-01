(function () {

  const selectors = {
    btn: '[data-menu-toggle]',
    btnBurger: '[data-menu-toggle-burger]',
    menu: '[data-menu]'
  };

  const init = () => {
    const btns = [].slice.call(
      document.querySelectorAll(selectors.btn)
    );
    btns.forEach(function (btn) {
      btn.addEventListener("click", function(){
        toggle();
      }, false);
    });
  };

  const toggle = () => {
    const menu = document.querySelector(selectors.menu);
    menu.classList.toggle('hidden');

    const btnBurger = document.querySelector(selectors.btnBurger);
    btnBurger.classList.toggle('hidden');
  };

  init();
  
})();