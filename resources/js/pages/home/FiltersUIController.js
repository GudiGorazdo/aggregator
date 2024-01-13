import "../../layouts/aside";
import "../../scripts/expand";

export default class {
  constructor() {
    this.main = document.querySelector('.main-content');
    this.bodyEl = document.querySelector("body");
    this.hero = document.querySelector(".hero");
    this.aside = document.querySelector(".aside");
    this.filterWrapper = document.querySelector(".filter__wrapper");
    this.filterBtns = document.querySelectorAll(".filter-toggle-btn");
    this.categoriesList = document.querySelector(".search--filter");
    this.placesItems = document.querySelector(".shop-list");
    this.placesBtn = document.querySelector(".shop-list__more");
    this.filterCollapseBtn = document.querySelector(".aside__collapse-btn");
    this.searchFilterEl = document.querySelector(".search--filter");
    this.searchFilterCtrlBtns = document.querySelectorAll(".search__mobile-btn");
    this.brandsList = document.querySelectorAll(".brands-list__item");
    this.mapToggleBtn = document.querySelector(".mobile-nav-section__toggle-btn--map");
    this.cardsMapToggleBtns = document.querySelectorAll('[data-shop-view]');
    this.scrollToTopBtn = document.querySelector(".footer__btn-top");
    this.mobileFilterBtn = document.querySelector(".mobile-nav-section__toggle-btn--filter");
    this.clearButton = document.querySelector('.search--filter .search__btn--clear')

    this.x = window.matchMedia("(max-width: 56.25em)");
    this.init();
  }

  init() {
    this.placesItems.addEventListener('SetActiveShopListItem', this.scrollToShop.bind(this));
    this.setListeners(this.x);
    this.x.addListener(this.setListeners.bind(this));
    this.initFilterButtons();
    this.initPlacesButton();
    this.initMapToggleButton();
    this.initScrollToTopButton();
    this.initBrandsList();
  }

  toggleClass(element, className) {
    element.classList.toggle(className);
  }

  initFilterButtons() {
    this.filterBtns.forEach((button) => {
      button.addEventListener("click", () => {
        console.log(button);
        this.toggleClass(this.filterWrapper, "active");
        this.toggleClass(button, "active");
        this.toggleClass(this.aside, "active");
      });
    });
  }

  initPlacesButton() {
    this.placesBtn && this.placesBtn.addEventListener("click", () => {
      this.toggleClass(this.placesItems, "expanded");
      this.toggleClass(this.placesBtn, "expanded");
    });
  }

  scrollToShop() {
    if (!this.bodyEl.classList.contains("map-open")) return;
    this.toggleMap();

    const shopItem = document.querySelector(`[data-shop-target].active`);
    if (!shopItem) return;

    const windowHeight = window.innerHeight;
    const shopItemHeight = shopItem.offsetHeight;
    const mainStyles = window.getComputedStyle(this.main);
    const paddingTop = parseFloat(mainStyles.paddingTop);
    const paddingBottom = parseFloat(mainStyles.paddingBottom);
    const marginBottom = parseFloat(mainStyles.marginBottom);
    const offsetTop =
      shopItem.offsetTop - this.main.offsetTop + this.hero.offsetTop + paddingTop + paddingBottom;
    const scrollToPosition =
      offsetTop - (windowHeight / 2) + (shopItemHeight / 2) + (marginBottom / 2);

    this.main.scrollTo({
      top: scrollToPosition,
      behavior: "instant",
    });
  }


  toggleMap() {
    this.toggleClass(this.bodyEl, "map-open");
    this.toggleClass(this.mapToggleBtn, "active");
  }

  initMapToggleButton() {
    [...Array.from(this.cardsMapToggleBtns), this.mapToggleBtn].forEach(btn => {
      btn.addEventListener("click", this.toggleMap.bind(this));
    });
  }

  initScrollToTopButton() {
    this.scrollToTopBtn.addEventListener("click", () => {
      window.scrollTo(0, 0);
    });
  }

  initBrandsList() {
    this.brandsList.forEach((element) => {
      element.addEventListener("click", () => {
        this.toggleClass(element, "active__brand");
      });
    });
  }

  setListeners(x) {
    if (x.matches) {
      this.filterCollapseBtn.addEventListener("click", () => {
        this.toggleClass(this.filterWrapper, "active");
        this.toggleClass(this.aside, "active");
        this.toggleClass(this.bodyEl, "fixed-position");
        this.categoriesList.classList.remove("active");
      });

      this.searchFilterCtrlBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
          this.toggleClass(this.searchFilterEl, "active");
        });
      });

      this.mobileFilterBtn.addEventListener("click", () => {
        this.toggleClass(this.bodyEl, "fixed-position");
      });
    } else {
      this.filterCollapseBtn.addEventListener("click", () => {
        if (this.filterWrapper.dataset.width == "true") {
          this.filterWrapper.style.width = "auto";
          this.filterWrapper.dataset.width = "false";
        }
        this.toggleClass(this.filterWrapper, "active");
        this.toggleClass(this.aside, "active");
        this.categoriesList.classList.remove("active");
      });
    }
  }
}
