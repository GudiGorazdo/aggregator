import 'bootstrap';
import './scripts/aside';
import './scripts/burger';
import ModalWindow from './plugins/modal/ModalWindow';
import YandexMapWorker from './components/YandexMapWorker';

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

  new YandexMapWorker();
});
