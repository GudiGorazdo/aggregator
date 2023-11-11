import "bootstrap";
import "./scripts/aside";
import "./scripts/burger";
import ModalWindow from "./plugins/modal/ModalWindow";

/**
 * МОДАЛЬНЫЕ ОКНА, АЛЕРТЫ, ОКНА ПОДТВЕРЖДЕНИЯ ДЕЙСТВИЯ
 *
 * @param modalCallbackOnOpen         --  Массив колбэк функций, которые выполняются в момент открытия модального окна,
 *                                        чтобы добавить функцию необходимо воспользоваться методом $modal.options.addOpenCallBack(function)
 *
 * @param modalCallbackOnClose        --  Массив колбэк функций, которые выполняются в момент закрытия модального окна,
 *                                        чтобы добавить функцию необходимо воспользоваться методом $modal.options.addCloseCallBack(function)
 *
 * ОКНО ПОДТВЕРЖДЕНИЯ
 * чтобы вызвать необходимо добавить кнопку:
 * <button id="confirm_button"
 *    data-modal-path="site-confirm"     -- путь выбора модального окна, чтобы показать окно подтверждения, обязательный параметр
 *    data-confirm="Сделать что-то?"     -- текст в окне подтверждения
 * >confirm button text</button>
 *
 * для того, чтобы совершить действие если пользователь подтвердил,
 * необходимо передать функцию, которая выполнится после подтверждения,
 * это делается методом $modal.options.setConfirm(function), который надо
 * выполнить в момент вызова, для этого надо повесить слушатель
 * на кнопку, чтобы по клику передавать нужную функцию. Этот метод обнуляется
 * при закрытии окна подтверждения
 *
 * function afterConfirm() {
 *   // действие после подтверждения
 * }
 *
 * function addAfterConfirmFunction() {
 *    $modal.options.setConfirm(() => afterConfirm());
 *  },
 * document.getElementById('confirm_button').addEventListener('click', addAfterConfirmFunction);
 */

const modalCallbackOnOpen = [];
const modalCallbackOnClose = [];
let confirm = null;
window.$modal = new ModalWindow({
  isOpen: (instance, event) => {
    modalCallbackOnOpen.forEach((callback) => callback());
    if (event.target.dataset.alert) {
      instance.modal.querySelector("#site-alert_message").textContent =
        event.target.dataset.alert;
    }
    if (event.target.dataset.confirm) {
      instance.modal.querySelector("#site_confirm_message").textContent =
        event.target.dataset.confirm;
      document.getElementById("site_confirm_true").addEventListener(
        "click",
        confirm,
      );
    }
  },
  isClose: (instance, event) => {
    modalCallbackOnClose.forEach((callback) => callback());
    if (instance.modalContainer.id == "site-alert") {
      instance.modal.querySelector("#site-alert_message").textContent = "";
    }
    if (instance.modalContainer.id == "site-confirm") {
      instance.modal.querySelector("#site_confirm_message").textContent = "";
      document.getElementById("site_confirm_true").removeEventListener(
        "click",
        confirm,
      );
      confirm = null;
    }
  },

  addOpenCallBack(func) {
    modalCallbackOnOpen.push(func);
  },

  addCloseCallBack(func) {
    modalCallbackOnClose.push(func);
  },

  setConfirm(func) {
    confirm = func;
  },
});
