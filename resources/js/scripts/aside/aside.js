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
  if (!filterCity) await getCurrentCity(allCities, selectCity);
  else {
    const item = optionsCity.data.find(city => city.index == filterCity);
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
  const items = await getFilterItems(url);
  if (items.length > 0) {
    body.innerHTML = '';
    body.innerHTML = getItemsLayout(items, type);
    enable(button);
  } else {
    disable(button, body.parentElement);
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
  console.log(selectCity.select.getCurrentItem());

  let resp = await fetch('/test');
  // console.log(resp.body.getReader())
  resp = await resp.text();
  console.log(resp)
});
