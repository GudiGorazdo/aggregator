import City from '../modules/filters/City';

document.addEventListener('DOMContentLoaded', () => {
  new City(
    'filter_location',
    'filter_area_button',
    'filter_subway_button',
    'filter_city',
    'city',
  );
});


