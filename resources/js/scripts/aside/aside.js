import LocationFilter from '../../filters/location';
import ModalWindow from '../../plugins/modal/ModalWindow';

document.addEventListener('DOMContentLoaded', async () => {

  window.modalWindowPlugin = new ModalWindow({
    isOpen: (modal) => { },
    isClose: (modal) => { },
  });

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

  const aside = {
    elOpen: document.getElementById('burger'),
    elClose: document.getElementById('aside_close_button'),

    classes: {
      opened: ['active', 'modal__close'],
      closed: ['open']
    },

    opened: 'active',

    openStatus: false,

    open() {
      this.classes.opened.forEach(c => this.elOpen.classList.add(c));
      this.classes.closed.forEach(c => this.elOpen.classList.remove(c));
      this.openStatus = true;
    },

    close() {
      this.classes.opened.forEach(c => this.elOpen.classList.remove(c));
      this.classes.closed.forEach(c => this.elOpen.classList.add(c));
      this.openStatus = false;
    },

    initialization() {
      this.elOpen.addEventListener('click', this.toggle.bind(this));
    },

    toggle() {
      if (!this.openStatus) this.open();
      else this.close();
    },
  }

  aside.initialization();
});
