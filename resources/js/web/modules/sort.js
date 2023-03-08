(function () {

  let sortDirection = 'desc';

  const selectors = {
    btn:	'[data-sortable-btn]',
    list: '[data-sortable-list]'
  };

  const init = () => {
    const btns = document.querySelectorAll(selectors.btn);
    const btnsArray = [].slice.call(btns);
    btnsArray.forEach(function (btn) {
      btn.addEventListener("click", function(){
        sortBy(btn.dataset.sortBy);
      }, false);
    });

    // Get current sort attribute from local storage
    const sortAttribute = localStorage.getItem('sortAttribute');

    // Get current sort order from local storage
    const sortOrder = localStorage.getItem('sortOrder');

    // Get current sort direction from local storage
    const sortDirection = localStorage.getItem('sortDirection');

    if (sortAttribute) {
      sortBy(sortAttribute, sortOrder, sortDirection);
    }
  };

  const sortBy = (attribute, sortOrder = null, sortDir = null) => {
    // handle sort direction
    sortDirection = sortDir ? sortDir : sortDirection == 'asc' ? 'desc' : 'asc';
    let order = sortOrder ? sortOrder : sortDirection == 'asc' ? -1 : 1;

    // get elements
    const els = document.querySelectorAll(`[data-sortable][data-${attribute}]`);
    const elsArray = Array.from(els);

    // sort elements
    let sorted = elsArray.sort((a, b) => {
      let aValue = parseFloat(a.dataset[attribute]);
      let bValue = parseFloat(b.dataset[attribute]);
  
      if (isNaN(aValue) && isNaN(bValue)) {
        // Both values are non-numeric strings, so sort them alphabetically
        aValue = a;
        bValue = b;
      } else if (isNaN(aValue)) {
        // a is a non-numeric string, so it should come after b
        return 1;
      } else if (isNaN(bValue)) {
        // b is a non-numeric string, so it should come after a
        return -1;
      }
      return order * (aValue - bValue);
    });
    sorted.forEach(e => document.querySelector(selectors.list).appendChild(e));

    // Save current sort attribute in local storage
    localStorage.setItem('sortAttribute', attribute);

    // Save current sort direction in local storage
    localStorage.setItem('sortDirection', sortDirection);

    // Save current sort order in local storage
    localStorage.setItem('sortOrder', order);
  };

  init();
  
})();