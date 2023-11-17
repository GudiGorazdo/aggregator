const categories = {
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
      el: '.search--filter .search__count',
      title: '.search--filter .search__count-title',
    },
  },

  classes: {
    hidden: 'hidden',
    disabled: 'disabled',
    activePartial: 'checkbox-square__input--partial',
  },

  count: {
    el: null,
    title: null,
  },

  buttons: {
    wrapper: null,
    apply: null,
    clear: null,
  },

  inputs: {},

  init() {
    this.count.el = document.querySelector(this.selectors.count.el);
    this.count.title = document.querySelector(this.selectors.count.title);

    this.initInputs();
    this.initButtons();
  },

  initInputs() {
    document.querySelectorAll(this.selectors.inputs.categories).forEach(input => {
      this.inputs[input.value] = {
        'subCategories': {},
        'el': input,
        'id': +input.value,
        'active': input.checked,
        'activeBrands': 0,
      };
      input.addEventListener('click', this.toggleCategories.bind(this));
      document.querySelectorAll(`[${this.selectors.inputs.subCategories}="${input.value}"]`).forEach(subCategory => {
        this.inputs[input.value].subCategories[subCategory.value] = {
          'el': subCategory,
          'id': +subCategory.value,
          'active': subCategory.checked,
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
      category.checked = false;
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

    this.setCount();
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

    this.setCount();
  },

  initButtons() {
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

  setCount() {
    const count = Object.values(this.inputs).reduce((acc, category) => {
      return acc + category.activeBrands;
    }, 0);

    if (count) {
      this.count.title.innerHTML = 'Выбрано:&nbsp;';
      this.count.el.innerHTML = count;
      this.buttons.clear.classList.remove(this.classes.disabled);
    } else {
      this.count.title.innerHTML = 'Не выбрано';
      this.count.el.innerHTML = '';
      this.buttons.clear.classList.add(this.classes.disabled);
    }
  },

  apply() {
    console.log('apply');
  },

  clear() {
    console.log('clear');
  }
}.init();
