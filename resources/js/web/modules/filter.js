(function () {

  let filterAttributes = [];
  
  const states = {
    isFiltering: false
  };

  const classes = {
    hidden: 'hidden',
    selected: 'is-selected'
  };

  const selectors = {
    btnFilter: '[data-btn-filter]',
    btnFilterToggle: '[data-btn-filter-toggle]',
    btnFilterReset: '[data-btn-filter-reset]',
    filterItem: '[data-filter-item]',
    item: '[data-filterable]'
  };

  const init = () => {

    // Add event listeners for filter buttons
    const btns = document.querySelectorAll(selectors.btnFilter);
    const btnsArray = [].slice.call(btns);
    btnsArray.forEach(function (btn) {
      btn.addEventListener("click", function(){
        applyFilter(btn.dataset);
      }, false);
    });

    // Add event listeners for filter toggle buttons
    const btnsToggle = document.querySelectorAll(selectors.btnFilterToggle);
    const btnsToggleArray = [].slice.call(btnsToggle);
    btnsToggleArray.forEach(function (btn) {
      btn.addEventListener("click", function(){
        toggleFilterItems(btn);
      }, false);
    });

    // Add event listeners for filter reset button
    const btnReset = document.querySelector(selectors.btnFilterReset);
    btnReset.addEventListener("click", function(){
      resetFilter();
    }, false);
  };

  const applyFilter = (attributes) => {

    // Create filter attribute
    const attribute = `[data-${attributes.filterType}="${attributes.filterValue}"]`;
    
    // Toggle filter button class
    const btn = document.querySelector(`[data-btn-filter][data-filter-type="${attributes.filterType}"][data-filter-value="${attributes.filterValue}"]`);
    btn.classList.remove(classes.selected);

    // Add or remove filter attribute
    if (filterAttributes.includes(attribute)) {
      filterAttributes = filterAttributes.filter(function (item) {
        return item !== attribute;
      });
    }
    else {
      btn.classList.add(classes.selected);
      filterAttributes.push(attribute);
    }

    if (filterAttributes.length == 0) {
      states.isFiltering = false;
      showAll();
      updateResetButton();
      return;
    }

    states.isFiltering = true;
    hideAll();
    showItems();
    updateResetButton();
  };

  const showAll = () => {
    const items = [].slice.call(
      document.querySelectorAll(selectors.item)
    );
    items.forEach(function (item) {
      item.classList.remove(classes.hidden);
    });
  };

  const hideAll = () => {
    const items = [].slice.call(
      document.querySelectorAll(selectors.item)
    );
    items.forEach(function (item) {
      item.classList.add(classes.hidden);
    });
  };

  const showItems = () => {
    filterAttributes.forEach(function (attribute) {
      const items = [].slice.call(
        document.querySelectorAll(attribute)
      );
      items.forEach(function (item) {
        item.classList.remove(classes.hidden);
      });
    });
  };

  const toggleFilterItems = (btn) => {
    btn.classList.toggle(classes.selected);
    const items = [].slice.call(
      document.querySelectorAll(`[data-filter-item="${btn.dataset.btnFilterToggle}"]`)
    );
    items.forEach(function (item) {
      item.classList.toggle(classes.hidden);
    });
  };

  const resetFilter = () => {

    // Hide all items
    const filterItems = [].slice.call(
      document.querySelectorAll(selectors.filterItem)
    );
    filterItems.forEach(function (item) {
      item.classList.add(classes.hidden);
    });
    
    // Remove selected classes from toggle buttons
    const btnsFilterToggle = [].slice.call(
      document.querySelectorAll(selectors.btnFilterToggle)
    );
    btnsFilterToggle.forEach(function (btn) {
      btn.classList.remove(classes.selected);
    });

    // Remove selected classes from item buttons
    const btnFilter = [].slice.call(
      document.querySelectorAll(selectors.btnFilter)
    );
    btnFilter.forEach(function (btn) {
      btn.classList.remove(classes.selected);
    });

    states.isFiltering = false;
    filterAttributes = [];
    updateResetButton();
    showAll();
  };

  const updateResetButton = () => {
    const btnReset = document.querySelector(selectors.btnFilterReset);
    if (states.isFiltering) {
      btnReset.classList.add('!text-black', '!border-black');
    }
    else {
      btnReset.classList.remove('!text-black', '!border-black');
    }
  };

  init();
  
})();