(function () {

  const selectors = {
    isoItem: '[data-iso-item]',
    listItem: '[data-list-item]',
    thumbItem: '[data-thumb-item]',
    isoView: '[data-iso-view]',
    btnRotate: '[data-btn-rotate]',
    iconNorthStar: '[data-iso-north-arrow]'
  };

  let currentView = 2;

  const init = () => {

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

    // Hide all north star icons
    const northStars = [].slice.call(
      document.querySelectorAll(selectors.iconNorthStar)
    );
    northStars.forEach(function (northStar) {
      northStar.classList.add('hidden');
    });

    // Show north star icon for current view
    const northStar = document.querySelector('[data-iso-north-arrow="' + currentView + '"]');
    northStar.classList.remove('hidden');

  };

  init();
  
})();