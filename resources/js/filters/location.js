import Chooser from '../plugins/chooser/';

export default class LocationFilter {
  start = true;

  city = {
    storageMark: null,
    all: null,
    input: null,
    current: null,
    select: null,
    saved: null,
    start: null,
    options: {},
  };

  parent = null;

  open = {
    area: false,
    subway: false
  };

  buttons = {
    area: null,
    subway: null,
  };

  query = {};

  collapse = {
    area: null,
    subway: null,
  };

  activeAreas = [];

  constructor(
    parentId,
    areaButtonId,
    subwayButtonId,
    cityInputId,
    cityOptions,
    collapse,
    cityStorageMark = 'city',
    startCity = null,
  ) {
    this.queryData();

    this.parent = document.getElementById(parentId);
    this.parent.addEventListener('click', this.toggleOpen.bind(this));

    this.buttons.area = areaButtonId;
    this.buttons.subway = subwayButtonId;
    this.city.input = document.getElementById(cityInputId);

    this.collapse.area = collapse.area;
    this.collapse.subway = collapse.subway;

    this.city.options = cityOptions;
    this.city.storageMark = cityStorageMark;
    this.city.start = startCity;
    this.city.saved = +localStorage.getItem(this.city.storageMark);

    this.initialize();
  }

  initialize = async () => {
    this.city.all = await this.getAllCities();
    this.setCityOptions(this.city.all);
    this.city.select = new Chooser(this.city.options);

    if (!this.query?.city) await this.getCurrentCity(this.city.all);
    else {
      const city = this.city.all.find(item => item.index == this.query.city);
      if (city) this.setCurrentCity(city.id);
      else await this.getCurrentCity(this.city.all);
    }
  }

  getBody = async (url) => {
    let resp = await fetch(url);
    resp = await resp.text();
    return resp;
  }

  addFilter = async (url) => {
    const body = await this.getBody(url);
    if (body) {
      this.parent.innerHTML = '';
      this.parent.innerHTML = body;
      return true;
    }
    return false;
  }

  addLocationFilters = async (city) => {
    const areas = await this.addFilter(`/api/location/${city}?${document.location.search}`);
    if (areas) {
      if (this.start) this.start = false;
      else this.resetAreasAndSubways();
      this.showFilter();
      this.addAreaListeners();
    }
  }

  showFilter = () => {
    for (let key in this.collapse) {
      if (this.open[key]) {
        document.getElementById(this.collapse[key]).classList.add('show');
        document.getElementById(this.buttons[key]).setAttribute('aria-expanded', true);
      }
    }
  }

  getCurrentCity = async (all) => {
    if (this.city.saved) this.setCurrentCity(this.city.saved);
    else if (this.city.start) {
      const city = all.find(city => city.name == this.city.start);
      if (city) this.setCurrentCity(city.id);
    } else {
      ymaps.ready(async function () {
        const city = ymaps.geolocation.city;
        const check = all.find(item => item.name == city);
        if (check) this.setCurrentCity(check.id);
      });
    }
  }

  setCurrentCity(current) {
    this.city.select.select(current, true);
  }

  onSelectCity = (id) => {
    localStorage.setItem(this.city.storageMark, id);
    this.city.current = id;
    this.city.input.value = id;
    this.addLocationFilters(id);
    this.activeAreas = [];
  }

  setCityOptions = (cities) => {
    cities.forEach(city => {
      this.city.options.data.push({
        value: city.name,
        index: city.id,
        attr: {
          'val': city.id
        }
      });
    });
    this.city.options.onSelect = (item) => {
      this.onSelectCity(item.index);
    }
  }

  hideSubways = (e) => {
    this.getSubwayItems().forEach(item => {
      if (this.activeAreas.length == 0) {
        item.parentElement.style.postion = 'static';
        return item.parentElement.style.height = 'min-content';
      }
      if (!this.activeAreas.includes(item.dataset.area_target)) {
        item.parentElement.style.postion = 'absolute';
        item.checked = false;
      } else {
        item.parentElement.style.height = 0;
        item.parentElement.style.postion = 'absolute';
      }
    });
  }

  resetAreasAndSubways = () => {
    this.getSubwayItems().forEach(item => item.checked = false);
    this.getAreaItems().forEach(item => item.checked = false);
  }

  changeAreas = (e) => {
    if (e.target.checked) {
      if (!this.activeAreas.includes(e.target.id)) this.activeAreas.push(e.target.id);
    } else if (this.activeAreas.includes(e.target.id)) {
      this.activeAreas.splice(this.activeAreas.indexOf(e.target.id), 1);
    }
    this.hideSubways(e);
  }

  addAreaListeners = () => {
    this.getAreaItems().forEach(item => {
      item.addEventListener('click', this.changeAreas.bind(this));
    });
  }

  getSubwayItems = () => {
    return document.querySelectorAll('[id^="subway_"]');
  };

  getAreaItems = () => {
    return document.querySelectorAll('[id^="area_"]');
  };

  toggleOpen = (e) => {
    for (const key in this.buttons) {
      if (e.target.id !== this.buttons[key]) continue;
      this.open[key] = !this.open[key];
    }
  };

  getAllCities = async () => {
    let resp = await fetch('/api/cities');
    resp = await resp.json();
    return resp;
  }

  queryData = () => {
    let params = (new URL(document.location)).searchParams;
    const iterator = params.entries();
    let param = iterator.next();
    do {
      if (param && param.value) {
        this.query[param.value[0]] = param.value[1];
        param = iterator.next();
      }
    } while (!param.done)
  }
}
