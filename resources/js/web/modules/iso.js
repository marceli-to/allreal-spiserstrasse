(function () {

  const selectors = {
    isoItem: '[data-iso-item]',
    listItem: '[data-list-item]',
    thumbItem: '[data-thumb-item]',
    isoView: '[data-iso-view]',
    btnRotate: '[data-btn-rotate]',
  };

  let currentView = 2;

  const init = () => {
    const isoItems = [].slice.call(
      document.querySelectorAll(selectors.isoItem)
    );
    
    // Add event listener for mouse over
    // isoItems.forEach(function (item) {
    //   item.addEventListener("mouseover", function(){
    //   }, false);
    // });

    // Add click event on rotate button if it exists
    const btnRotate = document.querySelector(selectors.btnRotate);
    if (btnRotate) {
      btnRotate.addEventListener("click", function(){
        rotate();
      }, false);
    }
  };

  const rotate = () => {
    hideAllViews();
    showCurrentView();
  };

  const hideAllViews = () => {
    const isoViews = [].slice.call(
      document.querySelectorAll(selectors.isoView)
    );
    isoViews.forEach(function (view) {
      view.classList.add('hidden');
    });
  };

  const showCurrentView = () => {
    currentView = currentView < 4 ? currentView + 1 : 1;
    const isoView = document.querySelector('[data-iso-view="' + currentView + '"]');
    isoView.classList.remove('hidden');
    const btnRotate = document.querySelector(selectors.btnRotate);
    // Update inner html of rotate button
    btnRotate.innerHTML = 'Rotate (' + currentView + ')';
  };

  init();
  
})();