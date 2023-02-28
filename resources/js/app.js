import 'bootstrap';
import './scripts/aside';
import './scripts/burger';
import ModalWindow from './plugins/modal/ModalWindow';

/**
 * @param modalCallbackOnOpen         --  Массив колбэк функций, которые выполняются в момент открытия модального окна,
 *                                        чтобы добавить функцию необходимо воспользоваться методом window.modalWindowPlugin.options.addOpenCallBack(function)
 *
 * @param modalCallbackOnClose        --  Массив колбэк функций, которые выполняются в момент закрытия модального окна,
 *                                        чтобы добавить функцию необходимо воспользоваться методом window.modalWindowPlugin.options.addCloseCallBack(function)
 */


const modalCallbackOnOpen = [];
const modalCallbackOnClose = [];
window.modalWindowPlugin = new ModalWindow({
  isOpen: (instance, e) => {
    modalCallbackOnOpen.forEach(callback => callback());
    if (e.target.dataset.alert) {
      instance.modal.querySelector('#site-alert_message').textContent = e.target.dataset.alert;
    }
  },
  isClose: (instance, e) => {
    modalCallbackOnClose.forEach(callback => callback());
    if (e.target.dataset.alert) {
      instance.modal.querySelector('#site-alert_message').textContent = '';
    }
  },

  addOpenCallBack(func) {
    modalCallbackOnOpen.push(func);
  },

  addCloseCallBack(func) {
    modalCallbackOnClose.push(func);
  }
});
