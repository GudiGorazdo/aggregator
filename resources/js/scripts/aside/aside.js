import LocationFilter from '../../filters/location';

document.addEventListener('DOMContentLoaded', async () => {

  const classNameItemsCities = 'aside-city';
  const optionsCity = {
    el: 'aside_city',
    placeholder: 'Выберите город',
    data: [],
    icon: '^',
    classList: {
      label: `${classNameItemsCities}__label`,
      wrapper: `${classNameItemsCities}__wrapper`,
      current: `${classNameItemsCities}__button`,
      list: `${classNameItemsCities}__list`,
      item: `${classNameItemsCities}__item`,
    },
  }

  const collapse = {
    area: 'collapse_filter_area_inner',
    subway: 'collapse_filter_subway_inner'
  }

  new LocationFilter(
    'filter_location',
    'filter_area_button',
    'filter_subway_button',
    'filter_city',
    optionsCity,
    collapse,
    'city',
    'Город_7',
  );

  const burger = {
    el: document.getElementById('burger'),
    menu: document.getElementById('aside'),
    main: document.getElementById('main-content'),

    classes: {
      open: 'active',
      main: 'off',
      height: 'height-0',
      position: 'position-relative'
    },

    open: false,

    initialization() {
      this.el.addEventListener('click', this.toggle.bind(this));
    },

    toggle() {
      if (this.open) {
        this.el.classList.remove(this.classes.open);
        this.menu.classList.remove(this.classes.open);
        this.el.classList.remove(this.classes.open);
        // this.main.classList.remove(this.classes.height);
        // this.main.classList.remove(this.classes.main);
      } else {
        this.el.classList.remove(this.classes.open);
        this.menu.classList.add(this.classes.open);
        this.el.classList.add(this.classes.open);
        // this.main.classList.add(this.classes.main);
        // this.main.style.height = this.menu.offsetHeight + 'px';
      }
      this.open = !this.open;
    },
  }

  burger.initialization();
});
