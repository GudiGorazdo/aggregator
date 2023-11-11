document.addEventListener("DOMContentLoaded", () => {
  // const shopList = document.getElementById('shop-list');
  const categoryList = document.getElementById("filter-category");
  const toggleCategoryListBTN = document.getElementById("toggle-category");
  toggleCategoryListBTN.addEventListener("click", () => {
    if (categoryList.classList.contains("active")) {
      // shopList.classList.remove('active');
      categoryList.classList.remove("active");
    } else {
      // shopList.classList.add('active');
      categoryList.classList.add("active");
    }
    if (toggleCategoryListBTN.classList.contains("active")) {
      toggleCategoryListBTN.classList.remove("active");
    } else {
      toggleCategoryListBTN.classList.add("active");
    }
  });
});
