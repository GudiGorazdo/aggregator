import LocationFilter from '../../filters/location';
import ModalWindow from '../../plugins/modal/ModalWindow';
import optionsCity from '../../cityFilterOptions';

document.addEventListener('DOMContentLoaded', async () => {

  window.modalWindowPlugin = new ModalWindow({
    isOpen: (modal) => { },
    isClose: (modal) => { },
  });

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
  );

  // const aside = {
  //   burger: document.getElementById('burger'),
  //   opened: 'active',
  //   openStatus: false,

  //   open() {
  //     this.burger.classList.add(this.opened);
  //     this.openStatus = true;
  //   },

  //   close() {
  //     this.burger.classList.remove(this.opened);
  //     this.openStatus = false;
  //   },

  //   initialization() {
  //     this.burger.addEventListener('click', this.toggle.bind(this));
  //   },

  //   toggle() {
  //     if (!this.openStatus) this.open();
  //     else this.close();
  //   },
  // }

  // aside.initialization();
});
