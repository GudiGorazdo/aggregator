import Chooser from "../../plugins/chooser";
import areaOptions from "./options/area";
import subwayOptions from "./options/subway";

export default class Location {
  items = [];
  area = {
    options: areaOptions,
    select: null,
  };
  subway = {
    options: subwayOptions,
    select: null,
  };

  constructor() {
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

  setAreaItems() {
    this.items.forEach((item, index) => {
      this.area.options.isMultiple = true;
      this.area.options.data.push({
        value: item.name,
        index: item.id,
        group: {
          path: `area_${item.id}`,
          isInverted: true,
        },
        // onClick(item) {
        //   console.log('onClick:');
        //   console.log(item);
        // }
      });
      if (item.subways.length > 0) {
        this.setSubwayItems(item);
      } else {
        this.disableSubway();
      }
    });
  }

  setSubwayItems(area) {
    area.subways.forEach((subItem, index) => {
      this.subway.options.isMultiple = true;
      this.subway.options.data.push({
        value: subItem.name,
        index: subItem.id,
        group: {
          path: `area_${area.id}`,
          isSlave: true,
        },
      });
    });
  }

  createSelects() {
    this.area.select = new Chooser(this.area.options);
    this.subway.select = new Chooser(this.subway.options);
  }
}
