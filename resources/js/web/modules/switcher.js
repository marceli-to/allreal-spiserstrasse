(function () {

  const selectors = {
    btn: '[data-view-type]',
    list: '[data-view="list"]',
    thumbnails: '[data-view="thumbnails"]',
  };

  const init = () => {
    const btns = document.querySelectorAll(selectors.btn);
    const btnsArray = [].slice.call(btns);
    btnsArray.forEach(function (btn) {
      btn.addEventListener("click", function(){
        change(btn.dataset.viewType);
      }, false);
    });
  };

  const change = (type) => {
    const list = document.querySelector(selectors.list);
    const thumbnails = document.querySelector(selectors.thumbnails);
    const currentButton = document.querySelector(`[data-view-type="${type}"]`);
    const inactiveButton = document.querySelector(`[data-view-type]:not([data-view-type="${type}"])`);
    
    currentButton.classList.add('font-medium');
    inactiveButton.classList.remove('font-medium');

    if (type == 'list') {
      list.classList.replace('is-hidden', 'block');
      list.classList.add('is-visible');
      thumbnails.classList.replace('block', 'is-hidden');
      thumbnails.classList.remove('is-visible');
    }
    else if (type == 'thumbnails') {
      list.classList.replace('block', 'is-hidden');
      list.classList.remove('is-visible');
      thumbnails.classList.replace('is-hidden', 'block');
      thumbnails.classList.add('is-visible');
    }
  };

  init();
  
})();