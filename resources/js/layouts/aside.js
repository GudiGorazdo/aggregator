const categoryUI = {
  classes: { active: 'active', },
  categoryList: document.querySelector(".search--filter"),
  toggleCategoryListBtn: document.getElementById("toggle-category"),
  applyCategory: document.querySelector('.search--filter .search__btn--selection'),
  // actionButtons: document.querySelectorAll('.search--filter  .search__btn'),

  init() {
    this.toggleCategoryListBtn.addEventListener("click", () => {
      this.toggleActive(this.categoryList);
      this.toggleActive(this.toggleCategoryListBtn);
    });
    this.applyCategory.addEventListener("click", () => {
      this.categoryList.classList.remove(this.classes.active);
      this.toggleCategoryListBtn.classList.remove(this.classes.active);
      this.closeSubCategoriesList();
    });
  },

  toggleActive: function (element) {
    element.classList.toggle(this.classes.active);
  },

  closeSubCategoriesList() {
    const list = document.querySelector('.categories-list--filter .categories-list__item .categories-list__brands.open');
    list && list.classList.remove('open');
  }
}.init();
