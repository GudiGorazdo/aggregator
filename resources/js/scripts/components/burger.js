const burger = {
  menuBtn: document.querySelector(".header__menu-btn"),
  bodyEl: document.querySelector("body"),
  menuList: document.querySelector(".menu"),
  isOpen: false,

  init() {
    this.menuBtn.addEventListener('click', this.toggle.bind(this));
  },

  open() {
    this.menuList.classList.add("active");
    this.menuBtn.classList.add("active__animation");
    setTimeout(() => {
      this.menuBtn.classList.add("active__cross");
      this.menuBtn.classList.add("active__middle");
    }, 100);
  },

  close() {
    this.menuList.classList.remove("active");
    this.menuBtn.classList.remove("active__cross");
    setTimeout(() => this.menuBtn.classList.remove("active__animation"), 100);
    setTimeout(() => this.menuBtn.classList.remove("active__middle"), 150);
  },

  toggle() {
    if (this.isOpen) this.close();
    else this.open();
    this.toggleOpen();
  },

  toggleOpen() {
    this.isOpen = !this.isOpen;
  }
}.init();
