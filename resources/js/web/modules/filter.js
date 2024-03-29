(function () {

  let filterAttributes = [];
  
  const states = {
    isFiltering: false
  };

  const classes = {
    hidden: 'is-hidden',
    selected: 'is-selected',
    visible: 'is-visible',
    active: 'is-active',
  };

  const selectors = {
    btnFilter: '[data-btn-filter]',
    btnFilterToggle: '[data-btn-filter-toggle]',
    btnFilterReset: '[data-btn-filter-reset]',
    filter: '[data-filter]',
    filterItem: '[data-filter-item]',
    item: '[data-filterable]',
    noResults: '[data-no-results]',
    view: '[data-view].is-visible',
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
    if (btnReset) {
      btnReset.addEventListener("click", function(){
        resetFilter();
      }, false);
    }

    // Get filter attributes from local storage
    const savedFilterAttributes = JSON.parse(localStorage.getItem('filterAttributes'));
    if (savedFilterAttributes) {
      // Loop over saved filter attributes as key value pairs
      // and apply each filter
      Object.keys(savedFilterAttributes).forEach(function (key) {
        const attributeObject = {
          filterType: key,
          filterValue: savedFilterAttributes[key]
        };
        applyFilter(attributeObject);
      });
    }
  };

  const applyFilter = (attributes) => {

    // Create filter attribute
    const attribute = `[data-${attributes.filterType}="${attributes.filterValue}"]`;
    
    // Remove selected class from all filter options
    const options = [].slice.call(
      document.querySelectorAll(`[data-btn-filter][data-filter-type="${attributes.filterType}"]`)
    );
    options.forEach(function (option) {
      option.classList.remove(classes.selected);
    });

    // Add selected class to selected filter options
    const option = document.querySelector(`[data-btn-filter][data-filter-type="${attributes.filterType}"][data-filter-value="${attributes.filterValue}"]`);
    if (option) {
      option.classList.add(classes.selected);
    }

    // Remove item from filter attributes that start with the same filter type
    filterAttributes = filterAttributes.filter(function (item) {
      return !item.startsWith(`[data-${attributes.filterType}`);
    });

    // Add filter attribute to array
    filterAttributes.push(attribute);

    // Save filter attributes to local storage
    const storageObject = {};
    storageObject[attributes.filterType] = attributes.filterValue;

    // If filter type is already in local storage, update value
    const savedFilterAttributes = JSON.parse(localStorage.getItem('filterAttributes'));
    if (savedFilterAttributes) {
      savedFilterAttributes[attributes.filterType] = attributes.filterValue;
      localStorage.setItem('filterAttributes', JSON.stringify(savedFilterAttributes));
    }
    else {
      localStorage.setItem('filterAttributes', JSON.stringify(storageObject));
    }

    // Show all items if no filters are selected
    if (filterAttributes.length == 0) {
      states.isFiltering = false;
      showAll();
      updateResetButton();
      return;
    }

    // Show matching items
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
    handleResults();
  };

  const hideAll = () => {
    const items = [].slice.call(
      document.querySelectorAll(selectors.item)
    );
    items.forEach(function (item) {
      item.classList.add(classes.hidden);
    });
  };

  const showItems = (attr = null) => {

    // Create filter string
    const filterString = attr ? attr : filterAttributes.join('');

    // Get items that match filter string
    const items = [].slice.call(
      document.querySelectorAll(filterString)
    );
    items.forEach(function (item) {
      item.classList.remove(classes.hidden);
    });
    handleResults();
  };

  const toggleFilterItems = (btn) => {

    // if the button is already selected, remove class 'selected' and hide all [data-filter-item] elements
    if (btn.classList.contains(classes.selected)) {
      btn.classList.remove(classes.selected);
      const items = [].slice.call(
        document.querySelectorAll(`[data-filter-item]`)
      );
      items.forEach(function (item) {
        item.classList.add(classes.hidden);
      });

      // remove class 'active' from [data-filter] element
      const filter = document.querySelector(selectors.filter);
      filter.classList.remove(classes.active);
      return;
    }

    // add class 'active' from [data-filter] element
    const filter = document.querySelector(selectors.filter);
    filter.classList.add(classes.active);

    // remove class 'selected' from all buttons
    const btns = [].slice.call(
      document.querySelectorAll(selectors.btnFilterToggle)
    );
    btns.forEach(function (btn) {
      btn.classList.remove(classes.selected);
    });

    // add class 'selected' to clicked button
    btn.classList.add(classes.selected);
    
    // add class 'hidden' to all data-filter-items
    const items = [].slice.call(
      document.querySelectorAll(`[data-filter-item]`)
    );
    items.forEach(function (item) {
      item.classList.add(classes.hidden);
    });
    
    // remove class 'hidden' from data-filter-items that match the data-btn-filter-toggle value
    const itemsSelected = [].slice.call(
      document.querySelectorAll(`[data-filter-item="${btn.dataset.btnFilterToggle}"]`)
    );
    itemsSelected.forEach(function (item) {
      item.classList.remove(classes.hidden);
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

    // Remove active class from filter
    const filter = document.querySelector(selectors.filter);
    filter.classList.remove(classes.active);

    states.isFiltering = false;
    filterAttributes = [];
    localStorage.removeItem('filterAttributes');
    updateResetButton();
    showAll();
  };

  const updateResetButton = () => {
    const btnReset = document.querySelector(selectors.btnFilterReset);
    if (btnReset) {
      if (states.isFiltering) {
        btnReset.classList.add('!text-black', '!border-black');
      }
      else {
        btnReset.classList.remove('!text-black', '!border-black');
      }
    }
  };

  const handleResults = () => {
    const view = document.querySelector(selectors.view);
    const noResults = document.querySelector(selectors.noResults);
    const visibleItems = [].slice.call(
      document.querySelectorAll(`${selectors.item}:not(.${classes.hidden})`)
    );

    if (view && noResults) {
      if (visibleItems.length == 0) {
        noResults.classList.remove(classes.hidden);
        view.classList.add(classes.hidden);
      }
      else {
        noResults.classList.add(classes.hidden);
        view.classList.remove(classes.hidden);
      }
    }
  };

  init();
  
})();