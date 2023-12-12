export default class extends window.Controller {
  connect() {
    const options = {
      edit: Number(this.data.get('edit')),
      regionID: Number(this.data.get('region')),
      cityID: Number(this.data.get('city')),
      areaID: Number(this.data.get('area')),
      subways: Number(this.data.get('subways')),
    }

    const worker = {
      start: true,
      api: '/api/data/allLocations',
      data: null,

      edit: false,

      el: {
        region: null,
        city: null,
        area: null,
        subways: null,
      },

      current: {
        region: null,
        city: null,
        area: null,
        subways: null,
      },

      disableMap: {
        region: 'city',
        city: 'area',
        area: 'subways',
      },

      temp: null,

      async init() {
        this.setEditData();
        await this.getData();
        this.getEls();
        Object.keys(this.current).forEach(type => {
          if (!this.edit && type !== 'region') return;
          this.getRenderArray(type);
          this.checkDisabled(type);
          this.setOptions(type);
        });

        this.start = false;
      },

      setEditData() {
        this.edit = !!options.edit;
        if (!this.edit) return;
        this.current.region = !!options.regionID ? options.regionID : null;
        this.current.city = !!options.cityID ? options.cityID : null;
        this.current.area = !!options.areaID ? options.areaID : null;
        this.current.subways = !!options.subways ? options.subways : null;
      },

      setCurrent(event) {
        const { type } = event.target.dataset;
        const value = +event.target.value;
        if (type === 'subways') {
          return this.setCurrentSubways();
        }
        this.current[type] = value;
        this.getRenderArray(this.disableMap[type]);
        this.checkDisabled(this.disableMap[type]);
        this.resetOptions(type);
        this.setOptions(this.disableMap[type]);
      },

      setCurrentSubways(value) {
        this.current.subways.push(value);
      },

      getRenderArray(type) {
        if (type === 'region') return this.temp = this.data;
        const region = this.data.find(region => region.id === this.current.region);
        const city = region && region.cities.find(city => city.id === this.current.city);
        const area = city && city.areas.find(area => area.id === this.current.area);
        switch (type) {
          case 'city':
            return this.temp = region ? region.cities : null;
          case 'area':
            return this.temp = city.areas ?? null;
          case 'subways':
            return this.temp = area.subways ?? null;
        }

        this.temp = null;
      },

      setOptions(type) {
        this.temp && this.temp.forEach(item => this.createOptionEl(item.id, item.name, type));
        this.temp = null;
      },

      resetOptions(type) {
        if (type === 'subways') return;
        if (type === 'region') {
          this.resetCityData();
          this.el.area.setAttribute('disabled', true);
        }
        if (type === 'city' || type === 'region') {
          this.resetAreaData();
          this.el.subways.setAttribute('disabled', true);
        }
        this.resetSubwaysData();
      },

      resetCityData() {
        this.current.city = null;
        this.removeOptions('city');
      },

      resetAreaData() {
        this.current.area = null;
        this.removeOptions('area');
      },

      resetSubwaysData() {
        this.current.subways = [];
        this.el.subways.innerHTML = '';
      },

      removeOptions(type) {
        this.current[type] = null;
        this.el[type].selectedIndex = 0;
        const elChilds = this.el[type].children;
        for (var i = elChilds.length - 1; i > 0; i--) {
          elChilds[i].removeEventListener('click', this.setCurrent);
          this.el[type].removeChild(elChilds[i]);
        }
      },

      createOptionEl(value, text, type) {
        const option = document.createElement('option');
        option.setAttribute('value', value);
        option.setAttribute('data-type', type);
        option.textContent = text;
        option.addEventListener('click', this.setCurrent.bind(this));
        if (this.checkSelected(value, type)) {
          option.setAttribute('selected', 'selected')
        }
        this.el[type].append(option);
      },

      checkSelected(value, type) {
        if (!this.start || !this.edit) return;
        let check;
        if (type === 'subways') {
          check = this.current.subways?.find(subway => subway.id === value);
          check && (this.current.subways.push(value));
        } else {
          check = this.current[type] === value;
          check && (this.current[type] = value);
        }

        if (check) return true;
        return false;
      },

      checkDisabled(type) {
        if (!this.el[type].hasAttribute('disabled')) return;
        if (!this.temp || this.temp.length < 1) return;
        this.el[type].removeAttribute('disabled');
      },

      getEls() {
        this.el.region = document.getElementById('select-region');
        this.el.city = document.getElementById('select-citiy');
        this.el.area = document.getElementById('select-area');
        this.el.subways = document.getElementById('select-subways');
      },

      async getData() {
        const response = await fetch(this.api);
        this.data = await response.json();
      },
    }.init();
  }
}
