import location from '../../filters/location';

document.addEventListener('DOMContentLoaded', async () => {

  const classNameItemsCities = 'aside-region';
  const optionsCity = {
    el: 'aside_city',
    placeholder: 'Выберите город',
    data: [],
    classList: {
      label: `${classNameItemsCities}__label`,
      wrapper: `${classNameItemsCities}__wrapper`,
      current: `${classNameItemsCities}__button`,
      list: `${classNameItemsCities}__list`,
      item: `${classNameItemsCities}__item`,
    },
  }

  new location(
    'filter_location',
    'filter_area_button',
    'filter_subway_button',
    'filter_city',
    optionsCity,
    'city',
    'Город_7',
  );
});
