import 'bootstrap';
import './scripts/aside';
import './scripts/burger';
import ModalWindow from './plugins/modal/ModalWindow';

document.addEventListener('DOMContentLoaded', () => {
  window.modalWindowPlugin = new ModalWindow({
    isOpen: (instance, e) => {
      if (e.target.dataset.alert) {
        instance.modal.querySelector('#site-alert_message').textContent = e.target.dataset.alert;
      }
    },
    isClose: (instance, e) => {
      if (e.target.dataset.alert) {
        instance.modal.querySelector('#site-alert_message').textContent = '';
      }
    },
  });

  // const shopsData = Array.from(document.querySelectorAll('input[name="shop_coord"]')).map(item => {
  //   return {
  //     path: item.dataset.shopPath,
  //     coords: JSON.parse(item.value)
  //   }
  // });

  // let sumLat = 0;
  // let sumLong = 0;

  // for (var i = 0; i < shopsData.length; i++) {
  //   sumLat += shopsData[i].coords.lat;
  //   sumLong += shopsData[i].coords.long;
  // }
  // let averageLat = sumLat / shopsData.length;
  // let averageLong = sumLong / shopsData.length;

  // ymaps.ready(function () {
  //   var myMap = new ymaps.Map("map", {
  //     center: [averageLat, averageLong],
  //     zoom: 10
  //   }, {
  //     searchControlProvider: 'yandex#search'
  //   }),

  //     blueCollection = new ymaps.GeoObjectCollection(null, {
  //       preset: 'islands#blueIcon'
  //     });

  //   for (var i = 0, l = shopsData.length; i < l; i++) {
  //     const mark = new ymaps.Placemark([shopsData[i].coords['lat'], shopsData[i].coords['long']]);
  //     mark.events.add('click', ((shop) => {
  //       return function () {
  //         console.log(shop);
  //       }
  //     })(shopsData[i]));
  //     blueCollection.add(mark);
  //   }

  //   myMap.geoObjects.add(blueCollection);
  // });

  const displayMapState = {
    button: document.getElementById('change-display'),
    items: document.querySelectorAll('[data-shop-target]'),
    mapWrapper: document.getElementById('shops-map'),
    shopsData: Array.from(document.querySelectorAll('input[name="shop_coord"]')).map(item => {
      return {
        path: item.dataset.shopPath,
        coords: JSON.parse(item.value)
      }
    }),

    classes: {
      hide: 'hidden',
    },

    map: false,
    mapAdd: false,

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
    },

    addMap(shopsData, hideAllItems, showShop) {
      if (this.mapAdd) return;
      const average = this.getMapCenter();
      ymaps.ready(function () {
        var myMap = new ymaps.Map("shops-map", {
          center: [average.lat, average.long],
          zoom: 10
        }, {
          searchControlProvider: 'yandex#search'
        }),

          blueCollection = new ymaps.GeoObjectCollection(null, {
            preset: 'islands#blueIcon'
          });

        for (var i = 0, l = shopsData.length; i < l; i++) {
          const mark = new ymaps.Placemark([shopsData[i].coords['lat'], shopsData[i].coords['long']]);
          mark.events.add('click', ((shop) => {
            return function () {
              hideAllItems();
              showShop(shop);
              console.log(shop);
            }
          })(shopsData[i]));
          blueCollection.add(mark);
        }

        myMap.geoObjects.add(blueCollection);
      });

      this.mapAdd = true;
    },

    hideMap() {
      this.mapWrapper.classList.add(this.classes.hide);
    },

    showMap() {
      this.mapWrapper.classList.remove(this.classes.hide);
    },

    showShop(shopData) {
      const target = document.querySelector(`[data-shop-target="${shopData.path}"]`);
      target.classList.remove(this.classes.hide)
      console.log(target);
    },

    hideAllItems() {
      this.button.textContent = 'Список';
      this.items.forEach(shopCard => shopCard.classList.add(this.classes.hide));
      this.addMap(this.shopsData, this.hideAllItems.bind(this), this.showShop.bind(this));
      this.showMap();
      this.map = true;
    },

    showAllItems() {
      this.button.textContent = 'Карта';
      this.items.forEach(shopCard => shopCard.classList.remove(this.classes.hide));
      this.hideMap();
      this.map = false;
    },

    toggle() {
      if (!this.map) return this.hideAllItems();
      return this.showAllItems();
    },

    initialization() {
      this.button.addEventListener('click', this.toggle.bind(this));
    }
  }

  displayMapState.initialization();
});
