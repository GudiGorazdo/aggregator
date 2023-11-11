document.addEventListener("DOMContentLoaded", () => {
  const burger = {
    menuBtn: document.querySelector(".header__menu-btn"),
    bodyEl: document.querySelector("body"),
    menuList: document.querySelector(".menu"),
    isOpen: false,

    init() {
      this.menuBtn.addEventListener('click', this.toggle.bind(this));
      // this.menuBtn.addEventListener("click", () => {
      //   if (this.menuList.classList.contains("active")) {
      //     this.menuBtn.classList.toggle("active__animation");
      //     // this.menuBtn.classList.toggle("active__cross");
      //     setTimeout(() => this.menuBtn.classList.toggle("active__animation"), 0.3);
      //   } else {
      //     this.menuBtn.classList.toggle("active__animation");
      //     // setTimeout(() => this.menuBtn.classList.toggle("active__cross"), 0.3);
      //   }
      // });
    },

    open() {
      this.menuList.classList.add("active");
      this.menuBtn.classList.add("active__animation");
      setTimeout(() => this.menuBtn.classList.add("active__cross"), 150);
    },

    close() {
      this.menuList.classList.remove("active");
      this.menuBtn.classList.remove("active__cross");
      setTimeout(() => this.menuBtn.classList.remove("active__animation"), 150);
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
});
