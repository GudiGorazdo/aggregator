export default class SelectRelations {
  start = true;
  api = null;
  options = null;
  edit = false;
  defaultType = null;
  temp = null;
  data = {};
  el = {};
  current = {};
  disableMap = {};
  multiples = [];

  constructor(options) {
    this.options = options;
    this.api = options.api;
    this.edit = !!this.options.edit;
    Object.keys(this.options.create).forEach(type => {
      this.el[type] = document.getElementById(options.create[type].id);
      this.current[type] = null;
      this.data[type] = options.create[type].data;
      if (options.create[type].disable) {
        this.disableMap[type] = options.create[type].disable;
      }
      if (options.create[type].multiple) {
        this.multiples.push(type);
      }
      if (options.create[type].default) {
        this.defaultType = type;
      }

      if (! this.edit) return;
      if (options.create[type].current) {
        this.current[type] = options.create[type].current;
      }
    });

    Object.keys(this.current).forEach(type => {
      if (this.defaultType === type) {
        this.temp = this.data[type];
        this.setOptions(type);
      }
      if (! this.edit) return;
      if (! this.disableMap[type]) return;
      this.setRenderArray(this.disableMap[type], this.current[type]);
      this.checkDisabled(this.disableMap[type]);
      this.setOptions(this.disableMap[type]);
    });

    this.start = false;
  }

  setCurrent(event) {
    const { type } = event.target.dataset;
    const value = +event.target.value;
    if (this.multiples.includes(type)) {
      return this.setCurrentMultipe(type, value);
    }
    this.current[type] = value;
    this.setRenderArray(this.disableMap[type], value);
    this.resetOptions(type);
    this.checkDisabled(this.disableMap[type]);
    this.setOptions(this.disableMap[type]);
  };

  setCurrentMultipe(type, value) {
    this.current[type].push(value);
  };

  setRenderArray(type, id) {
    const data = this.data[type];
    this.temp = data.find(item => item.relation === id).items;
  };

  setOptions(type) {
    this.temp && this.temp.forEach(item => this.createOptionEl(item.id, item.name, type));
    this.temp = null;
  };

  resetOptions(type) {
    if (this.multiples.includes(this.disableMap[type])) {
      this.el[this.disableMap[type]].innerHTML = '';
      this.current[this.disableMap[type]] = [];
    } else {
      this.current[this.disableMap[type]] = null;
      this.removeOptions(this.disableMap[type]);
    }
    this.el[this.disableMap[type]].setAttribute('disabled', true);
    if (this.disableMap[this.disableMap[type]]) {
      this.resetOptions(this.disableMap[type]);
    }
  };

  removeOptions(type) {
    this.current[type] = null;
    this.el[type].selectedIndex = 0;
    const elChilds = this.el[type].children;
    for (var i = elChilds.length - 1; i > 0; i--) {
      elChilds[i].removeEventListener('click', this.setCurrent);
      this.el[type].removeChild(elChilds[i]);
    }
  };

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
  };

  checkSelected(value, type) {
    if (!this.start || !this.edit) return;
    let check;
    if (this.multiples.includes(type)) {
      check = this.current.subways?.includes(value);
      check && (this.current.subways.push(value));
    } else {
      check = this.current[type] === value;
      check && (this.current[type] = value);
    }

    if (check) return true;
    return false;
  };

  checkDisabled(type) {
    if (!this.el[type].hasAttribute('disabled')) return;
    if (!this.temp || this.temp.length < 1) return;
    this.el[type].removeAttribute('disabled');
  };
}
