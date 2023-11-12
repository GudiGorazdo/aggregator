const burger = {
  menuBtn: document.querySelector(".header__menu-btn"),
  menuList: document.querySelector(".menu"),

  classes: {
    disableScroll: 'menu-disable-scroll',
    active: 'active',
    activeCross: 'active__cross',
    activeAnimation: 'active__animation',
    activeMiddle: 'active__middle',
  },

  isOpen: false,

  init() {
    this.menuBtn.addEventListener('click', this.toggle.bind(this));
  },

  open() {
    this.menuList.classList.add(this.classes.active);
    this.menuBtn.classList.add(this.classes.activeAnimation);
    this.disableScroll();
    setTimeout(() => {
      this.menuBtn.classList.add(this.classes.activeCross);
      this.menuBtn.classList.add(this.classes.activeMiddle);
    }, 100);
  },

  close() {
    this.menuList.classList.remove(this.classes.active);
    this.menuBtn.classList.remove(this.classes.activeCross);
    this.enableScroll();
    setTimeout(() => this.menuBtn.classList.remove(this.classes.activeAnimation), 100);
    setTimeout(() => this.menuBtn.classList.remove(this.classes.activeMiddle), 150);
  },

  toggle() {
    if (this.isOpen) this.close();
    else this.open();
    this.toggleOpen();
  },

  toggleOpen() {
    this.isOpen = !this.isOpen;
  },

  disableScroll() {
    let pagePosition = window.scrollY;
    this.lockPadding();
    document.body.classList.add(`${this.classes.disableScroll}`);
    document.body.dataset.modalPosition = pagePosition;
    document.body.style.top = -pagePosition + "px";
  },

  enableScroll() {
    let pagePosition = parseInt(document.body.dataset.modalPosition, 10);
    this.unlockPadding();
    document.body.style.top = "auto";
    document.body.classList.remove(`${this.classes.disableScroll}`);
    window.scrollTo({
      top: pagePosition,
      behavior: "instant",
    });
  },

  lockPadding() {
    let paddingOffset = window.innerWidth - document.body.offsetWidth + "px";
    document.body.style.paddingRight = paddingOffset;
  },

  unlockPadding() {
    document.body.style.paddingRight = "0px";
  },
}.init();
