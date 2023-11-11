export default class ModalWindow {
  constructor(options) {
    this.focusElements = [
      "a[href]",
      "input",
      "button",
      "select",
      "textarea",
      "[tabindex]",
    ];

    this.attributes = {
      path: 'data-modal-path',
      target: 'data-modal-target'
    };

    this.classes = {
      modal: 'modal-window',
      message: 'modal-window__message',
      container: 'modal-window__container',
      animation: 'modal-window__animate',
      openPostfix: '--open',
      disableScroll: 'modal-disable-scroll',
      fixBlock: 'modal-fix-block',
    };

    this.ids = {
      modal: 'modal-window',
    };

    let defaultOptions = {
      isOpen: () => { },
      isClose: () => { },
    };

    this.options = Object.assign(defaultOptions, options);
    this.modal = document.getElementById(this.classes.modal);
    this.alert = document.querySelector(`.${this.classes.message}`);
    this.fixBlocks = document.querySelectorAll(`.${this.classes.fixBlock}`);

    this.speed = false;
    this.animation = false;
    this.isOpen = false;
    this.isOpenMessage = false;
    this.modalContainer = false;
    this.previosActiveElement = false;
    this.events();
  }

  events() {
    if (!this.modal) return;
    document.addEventListener("click", function (e) {
      const clickedElement = e.target.closest(`[${this.attributes.path}]`);
      if (!clickedElement) return this.checkForClose(e);
      if (clickedElement.dataset.modalOneButton && this.isOpen) return this.close(e);
      let target = clickedElement.dataset.modalPath;
      let animation = clickedElement.dataset.modalAnimation;
      let speed = clickedElement.dataset.modalSpeedIn;
      let speedOut = clickedElement.dataset.modalSpeedOut;
      this.animation = animation ?? "fade";
      this.speed = speed ? parseInt(speed) : 300;
      this.speedOut = speedOut ? parseInt(speedOut) : 100;
      this.modalContainer = document.querySelector(`[${this.attributes.target}="${target}"]`);
      if (this.modalContainer) this.open(e);
    }.bind(this));

    window.addEventListener("keydown", function (e) {
      if (e.keyCode == 27 && this.isOpen) return this.close(e);
      if (e.keyCode == 9) return this.focusCatch(e);
    }.bind(this));
  }

  showMessage(message, options = {}) {
    console.log(message);
    console.log(options);
    // this.
  }

  getMessageTemplate(options) {
    return (
      `<div class="${this.options.classes.message} modal-window__container">
        <button class="btn btn--close site-alert__close modal-window__close" data-alert="data-alert"></button>
        <p id="site-alert-message" class="site-alert__message"></p>
        </div>`);
  }

  checkForClose(e) {
    if (this.isCloseButtonClicked(e)) {
      this.close(e);
    } else if (this.isClickOutsideModal(e)) {
      this.close(e);
    }
  }

  isCloseButtonClicked(e) {
    return e.target.closest(`.${this.modalCloseClass}`);
  }

  isClickOutsideModal(e) {
    return !e.target.classList.contains(this.classes.container) &&
      !e.target.closest(`${this.classes.container}`) &&
      this.isOpen;
  }

  open(e = null) {
    this.previosActiveElement = document.activeElement;
    this.modal.style.setProperty("--transition-time", `${this.speed / 1000}s`);
    this.modal.classList.add(`${this.classes.modal}${this.classes.openPostfix}`);
    this.disableScroll();

    this.modalContainer.classList.add(`${this.classes.modal}${this.classes.openPostfix}`);
    this.modalContainer.classList.add(`${this.classes.modal}__${this.animation}`);

    this.isOpen = true;
    this.focusTrap();

    setTimeout(() => {
      e && this.options.isOpen(this, e);
      this.modalContainer.classList.add(`${this.classes.animation}`);
    }, this.speed);
  }

  close(e = null) {
    if (this.modalContainer) {
      this.modalContainer.classList.remove(`${this.classes.animation}`);
      setTimeout(() => {
        this.modalContainer.classList.remove(`${this.classes.modal}__${this.animation}`);
        this.modal.classList.remove(`${this.classes.modal}${this.classes.openPostfix}`);
        this.modalContainer.classList.remove(`${this.classes.modal}${this.classes.openPostfix}`);
        this.enableScroll();
        this.isOpen = false;
        this.focusTrap();
        e && this.options.isClose(this, e);
      }, this.speedOut);
    }
  }

  focusCatch(e) {
    if (this.isOpen) {
      const focusable = this.modalContainer.querySelectorAll(this.focusElements);
      const focusArray = Array.prototype.slice.call(focusable);
      const focusedIndex = focusArray.indexOf(document.activeElement);

      if (e.shiftKey && focusedIndex === 0) {
        focusArray[focusArray.length - 1].focus();
        e.preventDefault();
      }
      if (!e.shiftKey && focusedIndex === (focusArray.length - 1)) {
        focusArray[0].focus();
        e.preventDefault();
      }
    }
  }

  focusTrap() {
    const focusable = this.modalContainer.querySelectorAll(this.focusElements);
    if (this.isOpen && focusable.length > 0) {
      setTimeout(() => focusable[0].focus(), 100);
    } else {
      this.previosActiveElement.focus();
    }
  }

  disableScroll() {
    let pagePosition = window.scrollY;
    this.lockPadding();
    document.body.classList.add(`${this.classes.disableScroll}`);
    document.body.dataset.modalPosition = pagePosition;
    document.body.style.top = -pagePosition + "px";
  }

  enableScroll() {
    let pagePosition = parseInt(document.body.dataset.modalPosition, 10);
    this.unlockPadding();
    document.body.style.top = "auto";
    document.body.classList.remove(`${this.classes.disableScroll}`);
    window.scrollTo({
      top: pagePosition,
      behavior: "instant",
    });
  }

  lockPadding() {
    let paddingOffset = window.innerWidth - document.body.offsetWidth + "px";
    this.fixBlocks.forEach((el) => el.style.paddingRight = paddingOffset);
    document.body.style.paddingRight = paddingOffset;
  }

  unlockPadding() {
    this.fixBlocks.forEach((el) => el.style.paddingRight = "0px");
    document.body.style.paddingRight = "0px";
  }
}
