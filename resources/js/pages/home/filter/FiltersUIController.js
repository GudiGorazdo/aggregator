import "../../../layouts/aside";
import "../../../scripts/expand";
import categories from "./categories";
categories.init();

export class FiltersUIController {
  constructor() {
    this.bodyEl = document.querySelector("body");
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
    this.scrollToTopBtn = document.querySelector(".footer__btn-top");
    this.mobileFilterBtn = document.querySelector(".mobile-nav-section__toggle-btn--filter");
    this.clearButton = document.querySelector('.search--filter .search__btn--clear')

    this.x = window.matchMedia("(max-width: 56.25em)");
    this.init();
  }

  init() {
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

  initMapToggleButton() {
    this.mapToggleBtn.addEventListener("click", () => {
      this.toggleClass(this.bodyEl, "map-open");
      this.toggleClass(this.mapToggleBtn, "active");
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
        this.toggleClass(this.filterWrapper, "active");
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
