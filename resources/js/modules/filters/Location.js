import Chooser from "../../plugins/chooser";
import areaOptions from "./options/area";
import subwayOptions from "./options/subway";
import FilterBase from './FilterBase';

export default class Location extends FilterBase {
  items = [];
  area = {
    options: areaOptions,
    select: null,
  };
  subway = {
    options: subwayOptions,
    select: null,
  };

  activeAreas = [];
  activeSubways = [];

  constructor(fields) {
    super(fields);
    this.init();
  }

  async init() {
    this.items = await this.getItems();
    this.setItems();
    this.createSelects();
  }

  getItems = async () => {
    let resp = await fetch(`/api/data/location`);
    resp = await resp.json();
    return resp;
  };

  disableArea = () => {
    document.getElementById(this.area.options.el).classList.add("disabled");
  };

  disableSubway = () => {
    document.getElementById(this.subway.options.el).classList.add("disabled");
  };

  setItems() {
    if (this.items.length < 1) {
      this.disableArea();
      this.disableSubway();
      return;
    }

    this.setAreaItems();
  }

  setURLparams(urlParams) {
    this.activeAreas.forEach(area => {
      urlParams.append(this.fields.area, area.index);
    });
    this.activeSubways.forEach(subway => {
      urlParams.append(this.fields.subway, subway.index);
    });
  }

  onSelect() {
    this.activeAreas = this.area.select.getMultipleCurrents();
    this.activeSubways = this.subway.select.getMultipleCurrents();
    this.filterApply();
  }

  setAreaItems() {
    const urlParams = new URLSearchParams(window.location.search);
    const urlAreas = urlParams.getAll(this.fields.area);
    const urlSubways = urlParams.getAll(this.fields.subway);
    this.items.forEach((item, index) => {
      this.area.options.isMultiple = true;
      this.area.options.onSelect = () => this.onSelect();
      const itemOpt = {
        value: item.name,
        index: item.id,
        group: {
          path: `area_${item.id}`,
          isInverted: true,
        },
        selected: urlAreas.includes(item.id.toString())
      }
      this.area.options.data.push(itemOpt);
      if (item.subways.length > 0) {
        this.setSubwayItems(item, urlSubways);
      } else {
        this.disableSubway();
      }
    });
  }

  setSubwayItems(area, urlSubways) {
    area.subways.forEach((subItem, index) => {
      this.subway.options.isMultiple = true;
      this.subway.options.onSelect = () => this.onSelect();
      const itemOpt = {
        value: subItem.name,
        index: subItem.id,
        group: {
          path: `area_${area.id}`,
          isSlave: true,
        },
        selected: urlSubways.includes(subItem.id.toString())
      }
      this.subway.options.data.push(itemOpt);
    });
  }

  createSelects() {
    this.area.select = new Chooser(this.area.options);
    this.subway.select = new Chooser(this.subway.options);
    this.afterSubwaySetUp();
  }

  afterSubwaySetUp() {
    Object.keys(this.area.select.data).forEach(item => {
      this.checkSelectedAndSelect(this.area.select, item);
    });

    Object.keys(this.subway.select.data).forEach(item => {
      this.checkSelectedAndSelect(this.subway.select, item);
    });
  }

  checkSelectedAndSelect(select, id) {
    if(select.data[id].selected) {
      select.select(id, false);
    }
  }
}
