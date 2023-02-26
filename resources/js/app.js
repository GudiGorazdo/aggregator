import 'bootstrap';
import './scripts/aside';
import './scripts/burger';
import ModalWindow from './plugins/modal/ModalWindow';

document.addEventListener('DOMContentLoaded', () => {
  window.modalWindowPlugin = new ModalWindow({
    isOpen: (instance, e) => {
      console.log(instance);
      if (e.target.dataset.alert) {
        instance.modal.querySelector('#site-alert_message').textContent = e.target.dataset.alert;
      }
    },
    isClose: (instance, e) => {
      console.log(instance);
      if (e.target.dataset.alert) {
        instance.modal.querySelector('#site-alert_message').textContent = '';
      }
    },
    isCloseBefore: (instance, e) => { },
    isOpenBefore: (instance, e) => { },
  });

  const city_coords = JSON.parse(document.querySelector('input[name="city_coord"]').value);
  const coords = Array.from(document.querySelectorAll('input[name="shop_coord"]')).map(item => JSON.parse(item.value));
  console.log(city_coords)

  ymaps.ready(function () {
    var myMap = new ymaps.Map('map', {
      center: [city_coords.lat, city_coords.long],
      zoom: 10
    }, {
      searchControlProvider: 'yandex#search'
    }),

      // Создаём макет содержимого.
      MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
        '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
      ),

      myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
        hintContent: 'Москва!',
        balloonContent: 'Столица России'
      }, {
        // Опции.
        // Необходимо указать данный тип макета.
        iconLayout: 'default#image',
        // Своё изображение иконки метки.
        iconImageHref: 'images/myIcon.gif',
        // Размеры метки.
        iconImageSize: [30, 42],
        // Смещение левого верхнего угла иконки относительно
        // её "ножки" (точки привязки).
        iconImageOffset: [-5, -38]
      });

    myMap.geoObjects
      .add(myPlacemark);

    const placemarks = [];
    for (var i = 0; i < coords.length; i++) {
      var point = coords[i];
      var placemark = new ymaps.Placemark(
        [point.lat, point.long],
        {},
        {
          preset: 'islands#blueCircleDotIcon'
        }
      );
      placemarks.push(placemark);
    }

    myMap.geoObjects.add(new ymaps.GeoObjectCollection(placemarks));
  });
});
