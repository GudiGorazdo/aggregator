document.addEventListener("DOMContentLoaded", () => {
  const categoryList = document.getElementById("filter-category");
  const toggleCategoryListBTN = document.getElementById("toggle-category");
  toggleCategoryListBTN.addEventListener("click", () => {
    if (categoryList.classList.contains("active")) {
      categoryList.classList.remove("active");
    } else {
      categoryList.classList.add("active");
    }
    if (toggleCategoryListBTN.classList.contains("active")) {
      toggleCategoryListBTN.classList.remove("active");
    } else {
      toggleCategoryListBTN.classList.add("active");
    }
  });
});
