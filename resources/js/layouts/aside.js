const categoryUI = {
  classes: { active: 'active' },
  categoryList: document.querySelector(".search--filter"),
  toggleCategoryListBtn: document.getElementById("toggle-category"),
  actionButtons: document.querySelectorAll('.search--filter  .search__btn'),

  init() {
    [this.toggleCategoryListBtn, ...this.actionButtons].forEach(button => {
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
