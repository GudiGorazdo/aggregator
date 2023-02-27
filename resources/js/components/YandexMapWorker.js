export default class YandexMapWorker {
  button = null;
  items = null;
  mapWrapper = null;
  shopsData = null;

  classes = {
    hide: 'hidden',
  }

  map = false;
  mapAdd = false;

  constructor() {
    this.button = document.getElementById('change-display');
    this.items = document.querySelectorAll('[data-shop-target]');
    this.mapWrapper = document.getElementById('shops-map');
    this.shopsData = Array.from(document.querySelectorAll('input[name="shop_coord"]')).map(item => {
      return {
        path: item.dataset.shopPath,
        coords: JSON.parse(item.value)
      }
    });

    this.button.addEventListener('click', this.toggle.bind(this));
  }

  getMapCenter() {
    let sumLat = 0;
    let sumLong = 0;
    for (var i = 0; i < this.shopsData.length; i++) {
      sumLat += this.shopsData[i].coords.lat;
      sumLong += this.shopsData[i].coords.long;
    }

    return {
      lat: sumLat / this.shopsData.length,
      long: sumLong / this.shopsData.length
    }
  }

  addMap(shopsData) {
    if (this.mapAdd) return;
    const average = this.getMapCenter();
    const hideAllItems = this.hideAllItems.bind(this);
    const showShop = this.showShop.bind(this);
    ymaps.ready(function () {
      var myMap = new ymaps.Map("shops-map", {
        center: [average.lat, average.long],
        zoom: 10
      }, {
        searchControlProvider: 'yandex#search'
      }),

        markCollection = new ymaps.GeoObjectCollection(null, {
          iconColor: '#6c757d'
        });

      for (var i = 0, l = shopsData.length; i < l; i++) {
        const mark = new ymaps.Placemark([shopsData[i].coords['lat'], shopsData[i].coords['long']]);
        mark.events.add('click', ((shop) => {
          return function () {
            hideAllItems();
            showShop(shop);
            markCollection.each(function (placemark) {
              placemark.options.set('iconColor', '#6c757d');
            });
            mark.options.set('iconColor', '#1eafed');
          }
        })(shopsData[i]));
        markCollection.add(mark);
      }

      myMap.geoObjects.add(markCollection);
    });

    this.mapAdd = true;
  }

  hideMap() {
    this.mapWrapper.classList.add(this.classes.hide);
  }

  showMap() {
    this.mapWrapper.classList.remove(this.classes.hide);
  }

  showShop(shopData) {
    const target = document.querySelector(`[data-shop-target="${shopData.path}"]`);
    target.classList.remove(this.classes.hide)
  }

  hideAllItems() {
    this.button.textContent = 'Список';
    this.items.forEach(shopCard => shopCard.classList.add(this.classes.hide));
    this.addMap(this.shopsData);
    this.showMap();
    this.map = true;
  }

  showAllItems() {
    this.button.textContent = 'Карта';
    this.items.forEach(shopCard => shopCard.classList.remove(this.classes.hide));
    this.hideMap();
    this.map = false;
  }

  toggle() {
    if (!this.map) return this.hideAllItems();
    return this.showAllItems();
  }
}
