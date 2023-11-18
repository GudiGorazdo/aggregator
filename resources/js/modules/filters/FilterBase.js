import { ShopListUpdate } from "../../Events";

export default class {
 api = '/api/filter/shop?';
 list = null;

 constructor(field) {
  this.field = field;
  this.list = document.getElementById('shop-list');
 }

  async filter() {
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.delete(this.field);
    this.setURLparams(urlParams);
    const url = `${this.api}${urlParams.toString()}`;
    const response = await fetch(url);
    const result = await response.text();
    this.updateList(result);
    this.setURL(urlParams);
  }

  updateList(result) {
    this.list.innerHTML = '';
    this.list.innerHTML = result;
    this.list.dispatchEvent(ShopListUpdate);
  }

  setURL(urlParams) {
    const url = `${window.location.pathname}?${urlParams.toString()}`;
    window.history.pushState({}, '', url);
  }

  setURLparams(urlParams) {}
}
