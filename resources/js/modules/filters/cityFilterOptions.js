const optionsCity = {
  el: 'header_city',
  // el: window.screen.width < 768 ? 'aside_city' : 'header_city',
  placeholder: 'Выберите город',
  data: [],
  classList: {
    label: `filters-city__label`,
    wrapper: `filters-city__wrapper`,
    current: `filters-city__current`,
    list: `filters-city__list`,
    item: `filters-city__item`,
    icon: `filters-city__icon`,
  },
}

export default optionsCity;
