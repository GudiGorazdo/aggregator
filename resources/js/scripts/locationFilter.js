import LocationFilter from '../modules/filters/LocationFilter';
import optionsCity from '../modules/filters/cityFilterOptions';

document.addEventListener('DOMContentLoaded', () => {
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
});


