export default {
  selectors: {
    buttons: {
      apply: '.search--filter .search__btn--selection',
      clear: '.search--filter .search__btn--clear',
      wrapper: '.search--filter .search__action',
    },
    inputs: {
      categories: 'input[name="filter-category"]',
      subCategories: 'data-filter-category',
    },
    count: {
      apply: {
        el: '.search--filter .search__apply-count',
        title: '.search--filter .search__apply-title',
      },
      clear: {
        data: 'data-filter-clean',
        el: '.search--filter .search__clear-count',
        title: '.search--filter .search__clear-title',
      },
    },
    list: {
      subCategories: 'data-subcategory-target',
    },
  },

  classes: {
    open: 'open',
    hidden: 'hidden',
    disabled: 'disabled',
    activePartial: 'checkbox-square__input--partial',
  },

  count: {
    apply: {
      el: null,
      title: null,
    },

    clear: {
      el: null,
      title: null,
    },
  },

  buttons: {
    wrapper: null,
    apply: null,
    clear: null,
  },

  inputs: {},

  isSubCategoryListOpen: false,

  init() {
    this.count.apply.el = document.querySelector(this.selectors.count.apply.el);
    this.count.apply.title = document.querySelector(this.selectors.count.apply.title);
    this.count.clear.el = document.querySelector(this.selectors.count.clear.el);
    this.count.clear.title = document.querySelector(this.selectors.count.clear.title);
    this.checkboxCrumble = document.querySelectorAll("[data-subcategory-close]");
    this.subcategoryButtons = document.querySelectorAll("[data-subcategory-path]");

    this.initInputs();
    this.initActionButtons();
    this.initCheckboxCrumble();
    this.initSubcategoryButtons();
  },

  initInputs() {
    document.querySelectorAll(this.selectors.inputs.categories).forEach(input => {
      this.inputs[input.value] = {
        'subCategories': {},
        'el': input,
        'id': +input.value,
        'activeBrands': 0,
      };
      input.addEventListener('click', this.toggleCategories.bind(this));
      document.querySelectorAll(`[${this.selectors.inputs.subCategories}="${input.value}"]`).forEach(subCategory => {
        this.inputs[input.value].subCategories[subCategory.value] = {
          'el': subCategory,
          'id': +subCategory.value,
        };
        if (subCategory.checked) this.inputs[input.value].activeBrands++;
        subCategory.addEventListener('click', this.toggleSubCategories.bind(this));
      });
    });

    console.log(this.inputs);
  },

  toggleCategories(event) {
    const category = this.inputs[event.target.value];
    if (category.el.classList.contains(this.classes.activePartial)) {
      category.el.classList.remove(this.classes.activePartial);
      category.el.checked = false;
    }
    Object.values(category.subCategories).forEach(subCategory => {
      if (category.el.checked) {
        subCategory.el.checked = true;
        category.activeBrands = Object.keys(category.subCategories).length;
      } else {
        category.activeBrands = 0;
        subCategory.el.checked = false;
      }
    });

    this.setApplyCount();
  },

  toggleSubCategories(event) {
    const category = event.target.dataset.filterCategory;
    if (event.target.checked) {
      this.inputs[category].el.classList.add(this.classes.activePartial);
      ++this.inputs[category].activeBrands;
    } else {
      --this.inputs[category].activeBrands;
      if (this.inputs[category].activeBrands) {
        this.inputs[category].el.checked = false;
        this.inputs[category].el.classList.add(this.classes.activePartial);
      } else {
        this.inputs[category].el.classList.remove(this.classes.activePartial);
      }
    }

    this.setApplyCount();
    this.setClearCount(category);
  },

  initActionButtons() {
    this.buttons.apply = document.querySelector(this.selectors.buttons.apply);
    this.buttons.clear = document.querySelector(this.selectors.buttons.clear);
    this.buttons.wrapper = document.querySelector(this.selectors.buttons.wrapper);

    this.buttons.wrapper.addEventListener('click', e => {
      switch (e.target) {
        case this.buttons.apply:
          return this.apply();
        case this.buttons.clear:
          return this.clear();
      }
    });
  },

  initCheckboxCrumble() {
    this.checkboxCrumble.forEach((element) => {
      element.addEventListener("click", (e) => {
        this.isSubCategoryListOpen = false;
        const target = document.querySelector(`[${this.selectors.list.subCategories}="${e.target.dataset.subcategoryClose}"]`);
        target.classList.remove(this.classes.open);
        this.buttons.clear.removeAttribute(this.selectors.count.clear.data);
      });
    });
  },

  initSubcategoryButtons() {
    this.subcategoryButtons.forEach((element) => {
      element.addEventListener("click", (e) => {
        this.isSubCategoryListOpen = true;
        const category = e.target.dataset.subcategoryPath;
        const target = document.querySelector(`[${this.selectors.list.subCategories}="${category}"]`);
        this.buttons.clear.setAttribute(this.selectors.count.clear.data, category);
        target.classList.add(this.classes.open);
        this.setClearCount(category);
      });
    });
  },

  setClearCount(category) {
    if (this.inputs[category].activeBrands) {
      this.buttons.clear.textContent = 'Очистить: ' + this.inputs[category].activeBrands;
    } else {
      this.buttons.clear.textContent = 'Очистить всё';
    }
    if (!this.getActiveSubcategories()) {
      this.buttons.clear.classList.add(this.classes.disabled);
    }
  },

  getActiveSubcategories() {
    return Object.values(this.inputs).reduce((acc, category) => {
      return acc + category.activeBrands;
    }, 0);
  },

  setApplyCount() {
    const count = this.getActiveSubcategories();
    if (count) {
      this.count.apply.title.innerHTML = 'Выбрано:&nbsp;';
      this.count.apply.el.innerHTML = count;
      this.buttons.clear.classList.remove(this.classes.disabled);
    } else {
      this.count.apply.title.innerHTML = 'Не выбрано';
      this.count.apply.el.innerHTML = '';
      this.buttons.clear.classList.add(this.classes.disabled);
    }
  },

  apply() {
    console.log('apply');
  },

  clear() {
    if (this.buttons.clear.hasAttribute(this.selectors.count.clear.data)) {
      this.clearSubCategories(this.inputs[this.buttons.clear.dataset.filterClean]);
    } else {
      this.clearFull();
    }
  },

  clearFull() {
    Object.values(this.inputs).forEach(category => {
      this.clearSubCategories(category);
    });
  },

  clearSubCategories(category) {
    category.el.checked = false;
    category.el.classList.remove(this.classes.activePartial);
    category.activeBrands = 0;
    Object.values(category.subCategories).forEach(subCategory => {
      subCategory.el.checked = false;
    });

    this.setApplyCount();
    this.setClearCount(category.id);
  },
};
