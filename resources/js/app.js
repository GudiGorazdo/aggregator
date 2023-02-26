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

  const coords = Array.from(document.querySelectorAll('input[name="shop_coord"]')).map(item => JSON.parse(item.value));

  let sumLat = 0;
  let sumLong = 0;

  for (var i = 0; i < coords.length; i++) {
    sumLat += coords[i].lat;
    sumLong += coords[i].long;
  }
  let averageLat = sumLat / coords.length;
  let averageLong = sumLong / coords.length;

  ymaps.ready(function () {
    var myMap = new ymaps.Map("map", {
      center: [averageLat, averageLong],
      zoom: 10
    }, {
      searchControlProvider: 'yandex#search'
    }),

      blueCollection = new ymaps.GeoObjectCollection(null, {
        preset: 'islands#blueIcon'
      });

    for (var i = 0, l = coords.length; i < l; i++) {
      const mark = new ymaps.Placemark([coords[i]['lat'], coords[i]['long']]);

      // const closure = (shop) => {
      //   return function () {
      //     console.log(shop);
      //   }
      // }
      // mark.events.add('click', closure(coords[i]));

      mark.events.add('click', ((shop) => {
        return function () {
          console.log(shop);
        }
      })(coords[i]));
      blueCollection.add(mark);
    }

    myMap.geoObjects.add(blueCollection);
  });
});
