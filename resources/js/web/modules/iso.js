(function () {

  const selectors = {
    isoItem: '[data-iso-item]',
    listItem: '[data-list-item]',
    thumbItem: '[data-thumb-item]',
  };

  const init = () => {
    const isoItems = [].slice.call(
      document.querySelectorAll(selectors.isoItem)
    );
    
    // Add event listener for mouse over
    isoItems.forEach(function (item) {
      item.addEventListener("mouseover", function(){
        console.log(item);
      }, false);
    });
  };

  init();
  
})();