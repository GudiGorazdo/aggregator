document.addEventListener("DOMContentLoaded", () => {
  const burger = {
    menuBtn: document.querySelector(".header__menu-btn"),
    bodyEl: document.querySelector("body"),
    menuList: document.querySelector(".menu"),

    init(x) {
      if (x.matches) {
        this.menuBtn.addEventListener("click", () => {
          this.menuList.classList.toggle("active");
          this.bodyEl.classList.toggle("fixed-position");
          this.menuBtn.classList.toggle("active__cross");
        });
      } else {
        this.menuBtn.addEventListener("click", () => {
          this.menuList.classList.toggle("active");
          this.menuBtn.classList.toggle("active__cross");
        });
      }
    },
  }.init(window.matchMedia("(max-width: 56.25em)"));
});
