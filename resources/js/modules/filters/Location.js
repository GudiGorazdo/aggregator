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
    this.items.forEach((item, index) => {
      this.area.options.data.push({
        value: item.name,
        index: item.id,
        // attr: {
        //   'val': city.id
        // },
      });
      if (item.subways.length > 0) {
        item.subways.forEach((subItem, index) => {
          this.subway.options.data.push({
            value: subItem.name,
            index: subItem.id,
          });
        });
      } else {
        this.disableSubway();
      }
    });
  }

  createSelects() {
    this.area.select = new Chooser(this.area.options);
    this.subway.select = new Chooser(this.subway.options);
  }
}
