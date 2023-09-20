document.addEventListener('DOMContentLoaded', () => {
  const shopList = document.getElementById('shop-list');
  const categoryList = document.getElementById('filter-category');
  const toggleCategoryListBTN = document.getElementById('toggle-category');
  let isCategoryListActive = false;
  toggleCategoryListBTN.addEventListener('click', () => {
    if (isCategoryListActive) {
      shopList.classList.remove('active');
      categoryList.classList.remove('active');
      toggleCategoryListBTN.classList.remove('active');
      isCategoryListActive = false;
    } else {
      shopList.classList.add('active');
      categoryList.classList.add('active');
      toggleCategoryListBTN.classList.add('active');
      isCategoryListActive = true;
    }
  });
});



