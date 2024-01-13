import { ShopListUpdate, FilterFullReset } from '../../events';

export default class Pagination {
  api = '/api/filter/shop?';
  list = null;
  page = 1;
  loading = false;
  start = true;

  constructor() {
    this.list = document.getElementById('shop-list');
    this.startScrollPosition();
    this.list.addEventListener('filterFullReset', this.reset.bind(this));
    window.addEventListener('scroll', this.checkPage.bind(this));
    this.checkPage();
    this.start = false;
  }

  startScrollPosition() {
    const opt = {
      top: 0,
      left: 0,
      behavior: 'instant'
    };
    this.list.scrollTo(opt);
    window.scrollTo(opt);
  }

  async apply(e) {
    const urlParams = new URLSearchParams(window.location.search);
    try {
      const result = await this.getShopList(urlParams);
      this.updateList(result);
    } catch (error) {
      console.log(error);
    }
  }

  async getShopList(urlParams) {
    try {
      const urlParamsString = urlParams.toString();
      const filterParams = urlParamsString
        ? urlParamsString + `&page=${this.page}`
        : `page=${this.page}`;
      const url = `${this.api}${filterParams}`;
      const response = await fetch(url);
      const result = await response.text();
      return result;
    } catch (error) {
      console.log(error);
    } finally {
      this.loading = false;
    }
  }

  updateList(result) {
    this.list.innerHTML += result;
    this.list.dispatchEvent(ShopListUpdate);
  }

  isLastElementVisible() {
    const listItems = this.list.getElementsByTagName('li');
    const lastListItem = listItems[listItems.length - 1];
    const rect = lastListItem.getBoundingClientRect();

    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  checkPage() {
    if (this.start) return;
    if (this.loading) return;
    if (!this.isLastElementVisible()) return;
    this.loading = true;
    this.page++;
    this.apply();
  }

  reset() {
    this.page = 1;
    this.apply();
  }
}
