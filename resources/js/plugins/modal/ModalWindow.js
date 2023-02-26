export default class ModalWindow {
  constructor(options) {
    let defaultOptions = {
      isOpen: () => {},
      isClose: () => {},
    }
    this.options = Object.assign(defaultOptions, options);
    this.modal = document.querySelector('.modal-window');
    this.fixBlocks = document.querySelectorAll('.fix-block');
    this.speed = false;
    this.animation = false;
    this.isOpen = false;
    this.modalContainer = false;
    this.previosActiveElement = false;
    this.focusElements = [
      'a[href]',
      'input',
      'button',
      'select',
      'textarea',
      '[tabindex]',
    ];
    this.events()
  }
  events() {
    if (this.modal) {
      document.addEventListener('click', function(e) {
        const clickedElement = e.target.closest('[data-modal-path]');
        if (clickedElement) {
          if (clickedElement.dataset.modalOneButton && this.isOpen) return this.close(e);
          let target = clickedElement.dataset.modalPath;
          let animation = clickedElement.dataset.modalAnimation;
          let speed = clickedElement.dataset.modalSpeedIn;
          let speedOut = clickedElement.dataset.modalSpeedOut;
          this.animation = animation ?? 'fade';
          this.speed = speed ? parseInt(speed) : 300;
          this.speedOut = speedOut ? parseInt(speedOut) : 100;
          this.modalContainer = document.querySelector(`[data-modal-target="${target}"]`);
          if (this.modalContainer) this.open(e);
          return;
        }
        if (e.target.closest('.modal-window__close')) {
          this.close(e);
          return;
        }
        if (!e.target.classList.contains('modal-window__container') &&
           !e.target.closest('.modal-window__container') &&
            this.isOpen
        ) {
          this.close(e);
        }
      }.bind(this));

      window.addEventListener('keydown', function(e) {
        if(e.keyCode == 27 && this.isOpen) this.close(e);
        if(e.keyCode == 9) {
          this.focusCatch(e);
          return;
        }
      }.bind(this));
    }
  }

  open(e) {
    this.previosActiveElement = document.activeElement;
    this.modal.style.setProperty('--transition-time', `${this.speed / 1000}s`);
    this.modal.classList.add('modal-window--open');
    this.disableScroll();

    this.modalContainer.classList.add('modal-window--open');
    this.modalContainer.classList.add(`modal-window__animation--${this.animation}`);

    this.isOpen = true;
    this.focusTrap();

    setTimeout(() => {
      this.options.isOpen(this, e);
      this.modalContainer.classList.add('modal-window__animate--open');
    }, this.speed);
  }
  close(e) {
    if (this.modalContainer) {
      this.modalContainer.classList.remove('modal-window__animate--open');
      setTimeout(() => {
        this.modalContainer.classList.remove(`modal-window__animation--${this.animation}`);
        this.modal.classList.remove('modal-window--open');
        this.modalContainer.classList.remove('modal-window--open');
        this.enableScroll();
        this.isOpen = false;
        this.focusTrap();
        this.options.isClose(this, e);
      }, this.speedOut);
    }
  }

  focusCatch(e) {
    if(this.isOpen) {
      const focusable = this.modalContainer.querySelectorAll(this.focusElements);
      const focusArray = Array.prototype.slice.call(focusable);
      const focusedIndex = focusArray.indexOf(document.activeElement);

      if(e.shiftKey && focusedIndex === 0) {
        focusArray[focusArray.length - 1].focus();
        e.preventDefault();
      }
      if(!e.shiftKey && focusedIndex === (focusArray.length - 1)) {
        focusArray[0].focus();
        e.preventDefault();
      }
    }
  }

  focusTrap() {
    const focusable = this.modalContainer.querySelectorAll(this.focusElements);
    if (this.isOpen) {
      if (focusable) {
        setTimeout(() => {
        focusable[0].focus();
        }, 100);
      }
    } else {
      this.previosActiveElement.focus();
    }
  }
  disableScroll() {
    let pagePosition = window.scrollY;
    this.lockPadding();
    document.body.classList.add('disable-scroll');
    document.body.dataset.modalPosition = pagePosition;
    document.body.style.top = -pagePosition + 'px';
  }

  enableScroll() {
    let pagePosition = parseInt(document.body.dataset.modalPosition, 10);
    this.unlockPadding();
    document.body.style.top = 'auto';
    document.body.classList.remove('disable-scroll');
    window.scrollTo({
      top: pagePosition,
      behavior: 'instant'
    });
    document.body.removeAttribute('data-modal-position');
  }

  lockPadding() {
    let paddingOffset = window.innerWidth - document.body.offsetWidth + 'px';
    this.fixBlocks.forEach(el => el.style.paddingRight = paddingOffset);
    document.body.style.paddingRight = paddingOffset;
  }

  unlockPadding() {
    this.fixBlocks.forEach(el => el.style.paddingRight = '0px');
    document.body.style.paddingRight = '0px';
  }
}
