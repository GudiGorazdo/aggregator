const categoryUI = {
  classes: { active: 'active' },
  categoryList: document.querySelector(".search--filter"),
  toggleCategoryListBtn: document.getElementById("toggle-category"),
  applyCategory: document.querySelector('.search--filter .search__btn--selection'),
  // actionButtons: document.querySelectorAll('.search--filter  .search__btn'),

  init() {
    [this.toggleCategoryListBtn, this.applyCategory].forEach(button => {
      button.addEventListener("click", () => {
        this.toggleActive(this.categoryList);
        this.toggleActive(this.toggleCategoryListBtn);
      });
    });
  },

  toggleActive: function (element) {
    element.classList.toggle(this.classes.active);
  },
}.init();
