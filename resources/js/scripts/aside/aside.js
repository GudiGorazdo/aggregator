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

  const collapse = {
    area: 'collapse_filter_area_inner',
    subway: 'collapse_filter_subway_inner'
  }

  new location(
    'filter_location',
    'filter_area_button',
    'filter_subway_button',
    'filter_city',
    optionsCity,
    collapse,
    'city',
    'Город_7',
  );
});
