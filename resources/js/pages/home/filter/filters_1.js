import "../../../layouts/aside";
import "../../../scripts/expand";

document.addEventListener("DOMContentLoaded", (e) => {
  const bodyEl = document.querySelector("body");
  const aside = document.querySelector(".aside");
  const filterWrapper = document.querySelector(".filter__wrapper");
  const filterBtns = document.querySelectorAll(".filter-toggle-btn");
  const categoriesList = document.querySelector(".search--filter");
  filterBtns.forEach((button) => {
    button.addEventListener("click", () => {
      filterWrapper.classList.toggle("active");
      button.classList.toggle("active");
      aside.classList.toggle("active");
    });
  });

  const placesItems = document.querySelector(".shop-list");
  const placesBtn = document.querySelector(".shop-list__more");
  placesBtn && placesBtn.addEventListener("click", () => {
    placesItems.classList.toggle("expanded");
    placesBtn.classList.toggle("expanded");
  });

  const filterCollapseBtn = document.querySelector(".aside__collapse-btn");
  const mobileFilterBtn = document.querySelector(
    ".mobile-nav-section__toggle-btn--filter",
  );
  mobileFilterBtn.addEventListener("click", () => {
    filterWrapper.classList.toggle("active");
    bodyEl.classList.toggle("fixed-position");
    filterWrapper.classList.toggle("active");
  });

  const mapToggleBtn = document.querySelector(
    ".mobile-nav-section__toggle-btn--map",
  );
  mapToggleBtn.addEventListener("click", () => {
    bodyEl.classList.toggle("map-open");
    mapToggleBtn.classList.toggle("active");
  });

  // const placesToggleBtn = document.querySelector(".mobile-nav-section__toggle-btn--places");
  // placesToggleBtn.addEventListener("click", () => {
  //   bodyEl.classList.toggle("map-open");
  // });

  const scrollToTopBtn = document.querySelector(".footer__btn-top");
  scrollToTopBtn.addEventListener("click", () => {
    window.scrollTo(0, 0);
  });

  // const searchFilterBtn = document.querySelector(".categories-select");
  const searchFilterEl = document.querySelector(".search--filter");

  let searchFilterCtrlBtns = document.querySelectorAll(".search__mobile-btn");

  function setListeners(x) {
    if (x.matches) {
      filterCollapseBtn.addEventListener("click", () => {
        filterWrapper.classList.toggle("active");
        aside.classList.toggle("active");
        bodyEl.classList.toggle("fixed-position");
        categoriesList.classList.remove("active");
      });

      // searchFilterBtn.addEventListener("click", () => {
      //   searchFilterEl.classList.toggle("active");
      // });

      searchFilterCtrlBtns.forEach(function (el) {
        el.addEventListener("click", () => {
          searchFilterEl.classList.toggle("active");
        });
      });
    } else {
      filterCollapseBtn.addEventListener("click", () => {
        if (filterWrapper.dataset.width == "true") {
          filterWrapper.style.width = "auto";
          filterWrapper.dataset.width = "false";
        }

        filterWrapper.classList.toggle("active");
        aside.classList.toggle("active");
        categoriesList.classList.remove("active");
      });
    }
  }

  var x = window.matchMedia("(max-width: 56.25em)");
  setListeners(x); // Call listener function at run time
  x.addListener(setListeners);

  let checkboxCrumble = document.querySelectorAll("[data-subcategory-close]");
  checkboxCrumble.forEach((element) => {
    element.addEventListener("click", function (e) {
      const target = document.querySelector(
        `[data-subcategory-target="${e.target.dataset.subcategoryClose}"]`,
      );
      target.classList.remove("open");
    });
  });

  let subcategoryButtons = document.querySelectorAll("[data-subcategory-path]");
  subcategoryButtons.forEach((element) => {
    element.addEventListener("click", (e) => {
      console.log(e.target.dataset.subcategoryPath);
      const target = document.querySelector(
        `[data-subcategory-target="${e.target.dataset.subcategoryPath}"]`,
      );
      target.classList.add("open");
    });
  });

  let brandsList = document.querySelectorAll(".brands-list__item");
  if (brandsList != undefined || brandsList != null) {
    brandsList.forEach((element) => {
      element.addEventListener("click", () => {
        element.classList.toggle("active__brand");
      });
    });
  }
});
