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

    // Add event listener for mouse over on iso item
    const isoItems = [].slice.call(
      document.querySelectorAll(selectors.isoItem)
    );
    isoItems.forEach(function (isoItem) {
      const listItem = document.querySelector('[data-list-item][data-number="' + isoItem.dataset.name + '"]');
      const thumbItem = document.querySelector('[data-thumb-item][data-number="' + isoItem.dataset.name + '"]');

      isoItem.addEventListener("mouseover", function(){
        listItem.classList.add('bg-blue-light');
        thumbItem.classList.add('bg-blue-light');
      }, false);

      isoItem.addEventListener("mouseleave", function(){
        listItem.classList.remove('bg-blue-light');
        thumbItem.classList.remove('bg-blue-light');
      }, false);

      isoItem.addEventListener("click", function(){
        document.location.href = isoItem.dataset.url;
      }, false);

    });

    // Add event listener for mouse over on list item
    const listItems = [].slice.call(
      document.querySelectorAll(selectors.listItem)
    );
    listItems.forEach(function (listItem) {
      const isoItems = [].slice.call(
        document.querySelectorAll('[data-iso-item][data-number="' + listItem.dataset.number + '"]')
      );
      listItem.addEventListener("mouseover", function(){
        isoItems.forEach(function (isoItem) {
          isoItem.classList.add('is-active');
        });
      }, false);
      listItem.addEventListener("mouseleave", function(){
        isoItems.forEach(function (isoItem) {
          isoItem.classList.remove('is-active');
        });
      }, false);
    });

    // Add event listener for mouse over on thumb item
    const thumbItems = [].slice.call(
      document.querySelectorAll(selectors.thumbItem)
    );
    thumbItems.forEach(function (thumbItem) {
      const isoItems = [].slice.call(
        document.querySelectorAll('[data-iso-item][data-number="' + thumbItem.dataset.number + '"]')
      );
      thumbItem.addEventListener("mouseover", function(){
        isoItems.forEach(function (isoItem) {
          isoItem.classList.add('is-active');
        });
      }, false);
      thumbItem.addEventListener("mouseleave", function(){
        isoItems.forEach(function (isoItem) {
          isoItem.classList.remove('is-active');
        });
      }, false);
    });
    
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