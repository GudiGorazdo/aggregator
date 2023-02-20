import Chooser from '../../plugins/chooser';

// CITY SELECT MENU OPTIONS

const getAllCities = async () => {
  let resp = await fetch('/cities');
  resp = await resp.json();
  return resp;
}

const getCurrentCity = async (allCities, selectCity) => {
  const saved = localStorage.getItem('city');
  if (+saved) {
    selectCity.select(+saved, true);
  } else {
    ymaps.ready(async function () {
      // const checkCity = ymaps.geolocation.city;
      const checkCity = 'Город_7';
      const now = allCities.find((city, index) => city.name == checkCity);
      if (now) {
        selectCity.select(now.id, true);
        localStorage.setItem('city', now.id);
      }
      // location.href = `/?city=${nowIndex}`;
    });
  }
}

const addCitySelect = async (onSelect, query = null) => {
  const allCities = await getAllCities();
  const classNameItemsCities = 'aside-region';
  const cityInput = document.getElementById('filter_city');
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
    onSelect(item) {
      onSelect(item, query);
      cityInput.value = item.index;
      localStorage.setItem('city', item.index);
    },
  }
  allCities.forEach(city => {
    optionsCity.data.push({
      value: city.name,
      index: city.id,
      attr: {
        'val': city.id
      }
    });
  });
  const selectCity = new Chooser(optionsCity);
  if (!query.city) await getCurrentCity(allCities, selectCity);
  else {
    const item = optionsCity.data.find(city => city.index == query.city);
    if (item) selectCity.select(item.id);
    else await getCurrentCity(allCities, selectCity);
  }
  return {
    select: selectCity,
    options: optionsCity
  };
}


// ADD FILTER

const addFilter = async (type, url) => {
  const button = document.getElementById(`ilter_${type}_button`);
  const body = document.getElementById(`filter_${type}_body`);
  const layout = await getFilterItems(url);
  if (layout) {
    body.innerHTML = '';
    body.innerHTML = layout;
    enable(button);
    return true;
  } else {
    disable(button, body.parentElement);
  }
  return false;
}

const getFilterItems = async (url) => {
  let resp = await fetch(url);
  resp = await resp.text();
  return resp;
}

// DISABLE/ENABLE ACCORDION

const disable = (button, body) => {
  disabledClassNames.forEach(className => button.classList.add(className));
  button.setAttribute('aria-expanded', "true");
  button.classList.add("collapsed")
  body.classList.remove('show')
  body.classList.add('collapse')
}

const enable = (button) => {
  disabledClassNames.forEach(className => button.classList.remove(className));
}

const disabledClassNames = [
  "disabled",
  "disabled--grey",
  "opacity-5",
];

// ADD SUBWAYS AND AREAS

const addLocationFilters = async (city, query) => {
  console.log(query);
  const areas = await addFilter('area', `/areas/${city.attr.val}?${document.location.search}`);
  if (areas) {
    let url = `/subways${document.location.search}`
    // console.log(document.location.search);
    const areasItems = document.querySelectorAll('input[id^="area_"]');
    areasItems.forEach((item, ind) => url += `id[${ind}]=${item.value}&`);
    // console.log(url);
    addFilter('subway', url);
  }
}

document.addEventListener('DOMContentLoaded', async () => {

  // GGET QUERY PARAMS
  let params = (new URL(document.location)).searchParams;
  console.log(document.location.search)
  let iterator = params.entries();
  const query = {};
  let param = iterator.next();
  do {
    if (param && param.value) {
      query[param.value[0]] = param.value[1];
      param = iterator.next();
    }
  } while(!param.done)

  const selectCity = await addCitySelect(addLocationFilters, query);
});
