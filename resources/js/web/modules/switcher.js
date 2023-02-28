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
      list.classList.replace('hidden', 'block');
      thumbnails.classList.replace('block', 'hidden');
    }
    else if (type == 'thumbnails') {
      list.classList.replace('block', 'hidden');
      thumbnails.classList.replace('hidden', 'block');
    }
  };

  init();
  
})();