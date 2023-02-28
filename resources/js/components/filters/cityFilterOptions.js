const optionsCity = {
  el: window.screen.width < 768 ? 'aside_city' : 'header_city',
  placeholder: 'Выберите город',
  data: [],
  classList: {
    label: `filters-city_label`,
    wrapper: `filters-city_wrapper`,
    current: `filters-city_button`,
    list: `filters-city_list`,
    item: `filters-city_item`,
  },
}

export default optionsCity;
