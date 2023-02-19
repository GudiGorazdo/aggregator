import Chooser from '../../plugins/chooser';

// CITY SELECT MENU OPTIONS

const getAllCities = async () => {
  let resp = await fetch('/cities');
  resp = await resp.json();
  return resp;
}

const getCurrentCity = async (allCities, selectCity) => {
  ymaps.ready(async function () {
    const checkCity = 'Город_7';
    let nowIndex = null;
    allCities.find((city, index) => city.name == checkCity ? nowIndex = index + 1 : null);
    if (nowIndex) selectCity.select(nowIndex, true);
  });
}

const addCitySelect = async (onSelect, filterCity = null) => {
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
      onSelect(item);
      cityInput.value = item.attr.val;
    },
  }
  allCities.forEach(city => {
    optionsCity.data.push({
      value: city.name,
      attr: {
        'val': city.id
      }
    });
  });
  const selectCity = new Chooser(optionsCity);
  console.log(filterCity)
  if (!filterCity) getCurrentCity(allCities, selectCity);
  else {
    let nowIndex = null;
    const item = optionsCity.data.find((city, index) => city.attr.val == filterCity ? nowIndex = index + 1 : null);
    // const item = optionsCity.data.filter(city => city.attr.val == filterCity)[0];
    if (item) selectCity.select(item.id);
    else getCurrentCity(allCities, selectCity);
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
  const items = await getFilterItems(url);
  if (items.length > 0) {
    body.innerHTML = '';
    body.innerHTML = getItemsLayout(items, type);
    enable(button);
  } else {
    disable(button);
  }

  return items;
}

const getFilterItems = async (url) => {
  let resp = await fetch(url);
  resp = await resp.json();
  return resp;
}


// GET LAYOUT FOR AREAS AND SUBWAYS FILTERS

const getItemsLayout = (items, type) => {
  let layout = ``;
  items.forEach(item => {
    layout += `
      <div class="form-check form-check--line">
        <input id="${type}_${item.id}"
          class="form-check-input
          form-check-input--line"
          type="checkbox"
          value="${item.id}"
          name[]="${type}_${item.id}"
          tabindex="0"
        >
        <label
          class="form-check-label
          form-check-label--line"
          for="${type}_${item.id}"
        >
          ${item.name}
        </label>
      </div>
    `;
  });
  return layout;
}

// DISABLE/ENABLE ACCORDION

const disable = (button) => {
  disanledClassNames.forEach(className => button.classList.add(className));
}

const enable = (button) => {
  disanledClassNames.forEach(className => button.classList.remove(className));
}

const disanledClassNames = [
  "disabled",
  "disabled--grey",
  "opacity-5"
];

// ADD SUBWAYS AND AREAS

const addLocationFilters = async (city) => {
  const areas = await addFilter('area', `/areas/${city.attr.val}`);
  if (areas.length > 0) {
    let url = '/subways?';
    areas.forEach((area, ind) => url += `id[${ind}]=${area.id}&`);
    addFilter('subway', url);
  }
}

document.addEventListener('DOMContentLoaded', async () => {

  // GGET QUERY PARAMS
  let params = (new URL(document.location)).searchParams;
  let iterator = params.entries();
  const query = {};
  let param = iterator.next();
  do {
    if (param && param.value) {
      query[param.value[0]] = param.value[1];
      param = iterator.next();
    }
  } while(!param.done)


  const selectCity = await addCitySelect(addLocationFilters, query.city);
});
