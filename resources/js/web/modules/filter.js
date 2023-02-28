(function () {

  let filterAttributes = [];

  const selectors = {
    btnFilter: '[data-btn-filter]',
    item: '[data-filterable]'
  };

  const init = () => {
    const btns = document.querySelectorAll(selectors.btnFilter);
    const btnsArray = [].slice.call(btns);
    btnsArray.forEach(function (btn) {
      btn.addEventListener("click", function(){
        applyFilter(btn.dataset);
      }, false);
    });
  };

  const applyFilter = (attributes) => {
    // Create filter attribute
    const attribute = `[data-${attributes.filterType}="${attributes.filterValue}"]`;
    
    // Toggle button class
    const btn = document.querySelector(`[data-btn-filter][data-filter-type="${attributes.filterType}"][data-filter-value="${attributes.filterValue}"]`);
    btn.classList.remove('text-red-500');

    // Add or remove filter attribute
    if (filterAttributes.includes(attribute)) {
      filterAttributes = filterAttributes.filter(function (item) {
        return item !== attribute;
      });
    }
    else {
      btn.classList.add('text-red-500');
      filterAttributes.push(attribute);
    }

    if (filterAttributes.length == 0) {
      showAll();
      return;
    }

    hideAll();
    showItems();
  };

  const showAll = () => {
    const items = document.querySelectorAll(selectors.item);
    const itemsArray = [].slice.call(items);
    itemsArray.forEach(function (item) {
      item.classList.remove('hidden');
    });
  };

  const hideAll = () => {
    const items = document.querySelectorAll(selectors.item);
    const itemsArray = [].slice.call(items);
    itemsArray.forEach(function (item) {
      item.classList.add('hidden');
    });
  };

  const showItems = () => {
    filterAttributes.forEach(function (attribute) {
      const items = document.querySelectorAll(attribute);
      const itemsArray = [].slice.call(items);
      itemsArray.forEach(function (item) {
        item.classList.remove('hidden');
      });
    });
  };

  init();
  
})();