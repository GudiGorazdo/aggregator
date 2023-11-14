export class Filter {
  categories = {
    buttons: {
      wrapper: null,
      apply: null,
      clear: null,
    },
    inputs: {},
  };

  constructor() {
    this.categories.buttons.apply = document.querySelector('.search--filter .search__btn--selection');
    this.categories.buttons.clear = document.querySelector('.search--filter .search__btn--clear');
    this.categories.buttons.wrapper = document.querySelector('.search--filter .search__action');

    this.init();
  }

  init() {
    this.initCategories ();
  }

  initCategories() {
    this.initCategoriesInputs();
    this.initCategoriesButtons();
  }

  initCategoriesInputs() {
    document.querySelectorAll('input[name="filter-category"]').forEach(input => {
      this.categories.inputs[input.value] = {};
      this.categories.inputs[input.value].brands = {};
      this.categories.inputs[input.value].el = input;
      this.categories.inputs[input.value].id = +input.value;
      this.categories.inputs[input.value].active = input.checked;
      this.categories.inputs[input.value].activeBrands = 0;
      document.querySelectorAll(`[data-filter-category="${input.value}"]`).forEach(brand => {
        this.categories.inputs[input.value].brands[brand.value] = {};
        this.categories.inputs[input.value].brands[brand.value].el = brand;
        this.categories.inputs[input.value].brands[brand.value].id = +brand.value;
        this.categories.inputs[input.value].brands[brand.value].active = brand.checked;
        if (brand.checked) this.categories.inputs[input.value].activeBrands++;
      });
    });

    console.log(this.categories.inputs);
  }

  initCategoriesButtons() {
    this.categories.buttons.wrapper.addEventListener('click', e => {
      switch(e.target) {
        case this.categories.buttons.apply:
          return this.applyCategories();
        case this.categories.buttons.clear:
          return this.clearCategories();
      }
    });
  }

  applyCategories() {
    console.log('apply');
  }

  clearCategories() {
    console.log('clear');
  }
}
