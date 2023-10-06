var starRatingControl = new StarRating(".star-rating", {
  maxStars: 5,
  tooltip: false,
});



//добавляем обработчик событий скролла на колесико для списка, отключая прокрутку страницы
let listSimilar = document.querySelector('#scroll-list');
listSimilar.addEventListener('wheel', function (event) {
  event.preventDefault();
  if (screen.width <= 900) {
    listSimilar.scrollTop += event.deltaY;
  }
  else {
    listSimilar.scrollLeft += event.deltaY;
  }
});

//end new code

window.onload = function () {
  const carousels = Array.from(document.querySelectorAll(".carousel"));

  if (carousels.length) {
    carousels.forEach((carousel) => {
      const slideContainer = carousel.querySelector(".carousel__container");
      const slides = carousel.querySelectorAll(".slide");

      const slideWidth = slides[0].offsetWidth;
      const scrollIncrement = slideWidth + 75;
      const previousBtn = carousel.querySelector(".previous");
      const forwardBtn = carousel.querySelector(".forwards");

      forwardBtn.addEventListener("click", () => {
        slideContainer.scrollBy(scrollIncrement, 0);
      });

      previousBtn.addEventListener("click", () => {
        slideContainer.scrollBy(scrollIncrement * -1, 0);
      });
    });
  }
};

/******/ (() => {
  // webpackBootstrap
  /******/ var __webpack_modules__ = {
    /***/ "./source/js/index.js":
      /*!****************************!*\
  !*** ./source/js/index.js ***!
  \****************************/
      /***/ (
  __unused_webpack_module,
  __webpack_exports__,
  __webpack_require__
) => {
        "use strict";
        __webpack_require__.r(__webpack_exports__);
        /* harmony import */ var _select__WEBPACK_IMPORTED_MODULE_0__ =
          __webpack_require__(/*! ./select */ "./source/js/select.js");
        /* harmony import */ var _select__WEBPACK_IMPORTED_MODULE_0___default =
          /*#__PURE__*/ __webpack_require__.n(
            _select__WEBPACK_IMPORTED_MODULE_0__
          );
        /* harmony import */ var _script__WEBPACK_IMPORTED_MODULE_1__ =
          __webpack_require__(/*! ./script */ "./source/js/script.js");
        /* harmony import */ var _script__WEBPACK_IMPORTED_MODULE_1___default =
          /*#__PURE__*/ __webpack_require__.n(
            _script__WEBPACK_IMPORTED_MODULE_1__
          );
        /* harmony import */ var _slider__WEBPACK_IMPORTED_MODULE_2__ =
          __webpack_require__(/*! ./slider */ "./source/js/slider.js");
        // Это - ваша точка входа для скриптов страницы. Импортируйте сюда нужные вам файлы.

        /***/
      },

    /***/ "./source/js/script.js":
      /*!*****************************!*\
  !*** ./source/js/script.js ***!
  \*****************************/
      /***/ () => {
        class ItcCustomSelect {
          static EL = "itc-select";
          static EL_SHOW = "itc-select_show";
          static EL_OPTION = "itc-select__option";
          static EL_OPTION_SELECTED = "itc-select__option_selected";
          static DATA = "[data-select]";
          static DATA_TOGGLE = '[data-select="toggle"]';
          static template(params) {
            const { name, options, targetValue } = params;
            const items = [];
            let selectedIndex = -1;
            let selectedValue = "";
            let selectedContent = "Выберите из списка";
            options.forEach((option, index) => {
              let selectedClass = "";
              if (option[0] === targetValue) {
                selectedClass = ` ${this.EL_OPTION_SELECTED}`;
                selectedIndex = index;
                selectedValue = option[0];
                selectedContent = option[1];
              }
              items.push(`<li class="itc-select__option${selectedClass}" data-select="option"
        data-value="${option[0]}" data-index="${index}">${option[1]}</li>`);
            });
            return `<button type="button" class="itc-select__toggle" name="${name}"
      value="${selectedValue}" data-select="toggle" data-index="${selectedIndex}">
      ${selectedContent}</button><div class="itc-select__dropdown">
      <ul class="itc-select__options">${items.join("")}</ul></div>`;
          }
          static hideOpenSelect() {
            document.addEventListener("click", (e) => {
              if (!e.target.closest(`.${this.EL}`)) {
                const elsActive = document.querySelectorAll(`.${this.EL_SHOW}`);
                elsActive.forEach((el) => {
                  el.classList.remove(this.EL_SHOW);
                });
              }
            });
          }
          static create(target, params) {
            this._el =
              typeof target === "string"
                ? document.querySelector(target)
                : target;
            if (this._el) {
              return new this(target, params);
            }
            return null;
          }
          constructor(target, params) {
            this._el =
              typeof target === "string"
                ? document.querySelector(target)
                : target;
            this._params = params || {};
            this._onClickFn = this._onClick.bind(this);
            if (this._params.options) {
              this._el.innerHTML = this.constructor.template(this._params);
              this._el.classList.add(this.constructor.EL);
            }
            this._elToggle = this._el.querySelector(
              this.constructor.DATA_TOGGLE
            );
            this._el.addEventListener("click", this._onClickFn);
          }
          _onClick(e) {
            const { target } = e;
            const type = target.closest(this.constructor.DATA).dataset.select;
            if (type === "toggle") {
              this.toggle();
            } else if (type === "option") {
              this._changeValue(target);
            }
          }
          _updateOption(el) {
            const elOption = el.closest(`.${this.constructor.EL_OPTION}`);
            const elOptionSel = this._el.querySelector(
              `.${this.constructor.EL_OPTION_SELECTED}`
            );
            if (elOptionSel) {
              elOptionSel.classList.remove(this.constructor.EL_OPTION_SELECTED);
            }
            elOption.classList.add(this.constructor.EL_OPTION_SELECTED);
            this._elToggle.textContent = elOption.textContent;
            this._elToggle.value = elOption.dataset.value;
            this._elToggle.dataset.index = elOption.dataset.index;
            this._el.dispatchEvent(new CustomEvent("itc.select.change"));
            this._params.onSelected
              ? this._params.onSelected(this, elOption)
              : null;
            return elOption.dataset.value;
          }
          _reset() {
            const selected = this._el.querySelector(
              `.${this.constructor.EL_OPTION_SELECTED}`
            );
            if (selected) {
              selected.classList.remove(this.constructor.EL_OPTION_SELECTED);
            }
            this._elToggle.textContent = "Выберите из списка";
            this._elToggle.value = "";
            this._elToggle.dataset.index = "-1";
            this._el.dispatchEvent(new CustomEvent("itc.select.change"));
            this._params.onSelected
              ? this._params.onSelected(this, null)
              : null;
            return "";
          }
          _changeValue(el) {
            if (el.classList.contains(this.constructor.EL_OPTION_SELECTED)) {
              return;
            }
            this._updateOption(el);
            this.hide();
          }
          show() {
            document
              .querySelectorAll(this.constructor.EL_SHOW)
              .forEach((el) => {
                el.classList.remove(this.constructor.EL_SHOW);
              });
            this._el.classList.add(`${this.constructor.EL_SHOW}`);
          }
          hide() {
            this._el.classList.remove(this.constructor.EL_SHOW);
          }
          toggle() {
            this._el.classList.contains(this.constructor.EL_SHOW)
              ? this.hide()
              : this.show();
          }
          dispose() {
            this._el.removeEventListener("click", this._onClickFn);
          }
          get value() {
            return this._elToggle.value;
          }
          set value(value) {
            let isExists = false;
            this._el.querySelectorAll(".select__option").forEach((option) => {
              if (option.dataset.value === value) {
                isExists = true;
                this._updateOption(option);
              }
            });
            if (!isExists) {
              this._reset();
            }
          }
          get selectedIndex() {
            return this._elToggle.dataset.index;
          }
          set selectedIndex(index) {
            const option = this._el.querySelector(
              `.select__option[data-index="${index}"]`
            );
            if (option) {
              this._updateOption(option);
            }
            this._reset();
          }
        }
        ItcCustomSelect.hideOpenSelect();
        const citySelect = new ItcCustomSelect("#citySelect");
        const googleSelect = new ItcCustomSelect("#googleSelect");
        // menu

        const bodyEl = document.querySelector("body");

        const menuBtn = document.querySelector(".header__menu-btn");
        const menuList = document.querySelector(".menu-list");

        //star
        const starsWrappers = document.querySelectorAll(".filter__top-stars");
        const stars = document.querySelectorAll(".filter__top-star");
        console.log(starsWrappers);
        starsWrappers.forEach((item) => {
          let childs = item.childNodes;
          // console.log(childs)
          let dataStar = item.getAttribute("data-star");
          childs.forEach((el) => {
            console.log(el);
          });
          // for (i = 0; )
        });

        const categoriesItems = document.querySelector(".similar-categories");
        const categoriesBtn = document.querySelector(".similar__expand");
        categoriesBtn.addEventListener("click", () => {
          categoriesItems.classList.toggle("active");
          categoriesBtn.classList.toggle("active");
        });

        const regionsItems = document.querySelector(".similar-regions");
        const regionsBtn = document.querySelector(".regions__expand");
        regionsBtn.addEventListener("click", () => {
          regionsItems.classList.toggle("active");
          regionsBtn.classList.toggle("active");
        });

        const descText = document.querySelector(".info");
        const descTextBtn = document.querySelector(
          ".info__description-text-btn"
        );

        descTextBtn.addEventListener("click", () => {
          descText.classList.toggle("active");
          descTextBtn.classList.toggle("active");
        });

        const placesToggleBtn = document.querySelector(
          ".mobile-toggle-btn--places"
        );
        placesToggleBtn.addEventListener("click", () => {
          bodyEl.classList.toggle("map-open");
        });

        const scrollToTopBtn = document.querySelector(".footer__btn-top");
        scrollToTopBtn.addEventListener("click", () => {
          window.scrollTo(0, 0);
        });

        let breadcrumbsBtns = document.querySelectorAll(
          ".accordion__breadcrumbs-btn"
        );
        let categoriesAccordionBody = document.querySelectorAll(
          ".accordion__body--brands"
        );

        breadcrumbsBtns.forEach(function (el) {
          el.addEventListener("click", () => {
            categoriesAccordionBody.forEach(function (category) {
              category.classList.remove("open");
            });
          });
        });

        let brandsListItemsEls = document.querySelectorAll(
          ".brands-list__item--main"
        );

        brandsListItemsEls.forEach(function (el) {
          el.addEventListener("click", () => {
            categoriesAccordionBody.forEach(function (category) {
              category.classList.add("open");
            });
          });
        });

        let brandsListBtn = document.querySelector(".brands-list__more");
        let brandsContainer = document.querySelector(".brands__content");

        brandsListBtn.addEventListener("click", () => {
          brandsContainer.classList.toggle("expanded");
        });

        function myFunction(x) {
          if (x.matches) {
            menuBtn.addEventListener("click", () => {
              menuList.classList.toggle("active");
              bodyEl.classList.toggle("fixed-position");
              menuBtn.classList.toggle('active__cross');
            });
          } else {
            menuBtn.addEventListener("click", () => {
              menuList.classList.toggle("active");
              menuBtn.classList.toggle('active__cross');
            });
          }
        }

        var x = window.matchMedia("(max-width: 56.25em)");
        myFunction(x); // Call listener function at run time
        x.addListener(myFunction);


        //добавляем обработчик событий скролла на колесико для списка, отключая прокрутку страницы
        let menuListActive = document.querySelector('.menu-list');
        // console.log(menuListActive);
        if (screen.width >= 900) {
          menuListActive.addEventListener('wheel', function (event) {
            event.preventDefault();
            menuListActive.scrollTop += event.deltaY;
          });
        }
        /***/
      },

    /***/ "./source/js/select.js":
      /*!*****************************!*\
  !*** ./source/js/select.js ***!
  \*****************************/
      /***/ () => {
        class ItcCustomSelect {
          static EL = "itc-select";
          static EL_SHOW = "itc-select_show";
          static EL_OPTION = "itc-select__option";
          static EL_OPTION_SELECTED = "itc-select__option_selected";
          static DATA = "[data-select]";
          static DATA_TOGGLE = '[data-select="toggle"]';
          static template(params) {
            const { name, options, targetValue } = params;
            const items = [];
            let selectedIndex = -1;
            let selectedValue = "";
            let selectedContent = "Выберите из списка";
            options.forEach((option, index) => {
              let selectedClass = "";
              if (option[0] === targetValue) {
                selectedClass = ` ${this.EL_OPTION_SELECTED}`;
                selectedIndex = index;
                selectedValue = option[0];
                selectedContent = option[1];
              }
              items.push(`<li class="itc-select__option${selectedClass}" data-select="option"
          data-value="${option[0]}" data-index="${index}">${option[1]}</li>`);
            });
            return `<button type="button" class="itc-select__toggle" name="${name}"
        value="${selectedValue}" data-select="toggle" data-index="${selectedIndex}">
        ${selectedContent}</button><div class="itc-select__dropdown">
        <ul class="itc-select__options">${items.join("")}</ul></div>`;
          }
          static hideOpenSelect() {
            document.addEventListener("click", (e) => {
              if (!e.target.closest(`.${this.EL}`)) {
                const elsActive = document.querySelectorAll(`.${this.EL_SHOW}`);
                elsActive.forEach((el) => {
                  el.classList.remove(this.EL_SHOW);
                });
              }
            });
          }
          static create(target, params) {
            this._el =
              typeof target === "string"
                ? document.querySelector(target)
                : target;
            if (this._el) {
              return new this(target, params);
            }
            return null;
          }
          constructor(target, params) {
            this._el =
              typeof target === "string"
                ? document.querySelector(target)
                : target;
            this._params = params || {};
            this._onClickFn = this._onClick.bind(this);
            if (this._params.options) {
              this._el.innerHTML = this.constructor.template(this._params);
              this._el.classList.add(this.constructor.EL);
            }
            this._elToggle = this._el.querySelector(
              this.constructor.DATA_TOGGLE
            );
            this._el.addEventListener("click", this._onClickFn);
          }
          _onClick(e) {
            const { target } = e;
            const type = target.closest(this.constructor.DATA).dataset.select;
            if (type === "toggle") {
              this.toggle();
            } else if (type === "option") {
              this._changeValue(target);
            }
          }
          _updateOption(el) {
            const elOption = el.closest(`.${this.constructor.EL_OPTION}`);
            const elOptionSel = this._el.querySelector(
              `.${this.constructor.EL_OPTION_SELECTED}`
            );
            if (elOptionSel) {
              elOptionSel.classList.remove(this.constructor.EL_OPTION_SELECTED);
            }
            elOption.classList.add(this.constructor.EL_OPTION_SELECTED);
            this._elToggle.textContent = elOption.textContent;
            this._elToggle.value = elOption.dataset.value;
            this._elToggle.dataset.index = elOption.dataset.index;
            this._el.dispatchEvent(new CustomEvent("itc.select.change"));
            this._params.onSelected
              ? this._params.onSelected(this, elOption)
              : null;
            return elOption.dataset.value;
          }
          _reset() {
            const selected = this._el.querySelector(
              `.${this.constructor.EL_OPTION_SELECTED}`
            );
            if (selected) {
              selected.classList.remove(this.constructor.EL_OPTION_SELECTED);
            }
            this._elToggle.textContent = "Выберите из списка";
            this._elToggle.value = "";
            this._elToggle.dataset.index = "-1";
            this._el.dispatchEvent(new CustomEvent("itc.select.change"));
            this._params.onSelected
              ? this._params.onSelected(this, null)
              : null;
            return "";
          }
          _changeValue(el) {
            if (el.classList.contains(this.constructor.EL_OPTION_SELECTED)) {
              return;
            }
            this._updateOption(el);
            this.hide();
          }
          show() {
            document
              .querySelectorAll(this.constructor.EL_SHOW)
              .forEach((el) => {
                el.classList.remove(this.constructor.EL_SHOW);
              });
            this._el.classList.add(`${this.constructor.EL_SHOW}`);
          }
          hide() {
            this._el.classList.remove(this.constructor.EL_SHOW);
          }
          toggle() {
            this._el.classList.contains(this.constructor.EL_SHOW)
              ? this.hide()
              : this.show();
          }
          dispose() {
            this._el.removeEventListener("click", this._onClickFn);
          }
          get value() {
            return this._elToggle.value;
          }
          set value(value) {
            let isExists = false;
            this._el.querySelectorAll(".select__option").forEach((option) => {
              if (option.dataset.value === value) {
                isExists = true;
                this._updateOption(option);
              }
            });
            if (!isExists) {
              this._reset();
            }
          }
          get selectedIndex() {
            return this._elToggle.dataset.index;
          }
          set selectedIndex(index) {
            const option = this._el.querySelector(
              `.select__option[data-index="${index}"]`
            );
            if (option) {
              this._updateOption(option);
            }
            this._reset();
          }
        }
        ItcCustomSelect.hideOpenSelect();

        /***/
      },

    /***/ "./source/js/slider.js":
      /*!*****************************!*\
  !*** ./source/js/slider.js ***!
  \*****************************/
      /***/ (
        __unused_webpack_module,
        __webpack_exports__,
        __webpack_require__
      ) => {
        "use strict";
        __webpack_require__.r(__webpack_exports__);
        /* harmony import */ var swiper__WEBPACK_IMPORTED_MODULE_0__ =
          __webpack_require__(
            /*! swiper */ "./node_modules/swiper/swiper.esm.js"
          );
        /* harmony import */ var swiper_css__WEBPACK_IMPORTED_MODULE_1__ =
          __webpack_require__(
            /*! swiper/css */ "./node_modules/swiper/swiper.min.css"
          );

        const taskSlider = new swiper__WEBPACK_IMPORTED_MODULE_0__["default"](
          ".user-name__dash-slider",
          {
            slidesPerView: 2,
            spaceBetween: 8,
            centeredSlides: true,
          }
        );

        /***/
      },

    /******/
  };
  /************************************************************************/
  /******/ // The module cache
  /******/ var __webpack_module_cache__ = {};
  /******/
  /******/ // The require function
  /******/ function __webpack_require__(moduleId) {
    /******/ // Check if module is in cache
    /******/ var cachedModule = __webpack_module_cache__[moduleId];
    /******/ if (cachedModule !== undefined) {
      /******/ return cachedModule.exports;
      /******/
    }
    /******/ // Create a new module (and put it into the cache)
    /******/ var module = (__webpack_module_cache__[moduleId] = {
      /******/ // no module.id needed
      /******/ // no module.loaded needed
      /******/ exports: {},
      /******/
    });
    /******/
    /******/ // Execute the module function
    /******/ __webpack_modules__[moduleId](
      module,
      module.exports,
      __webpack_require__
    );
    /******/
    /******/ // Return the exports of the module
    /******/ return module.exports;
    /******/
  }
  /******/
  /******/ // expose the modules object (__webpack_modules__)
  /******/ __webpack_require__.m = __webpack_modules__;
  /******/
  /************************************************************************/
  /******/ /* webpack/runtime/chunk loaded */
  /******/ (() => {
    /******/ var deferred = [];
    /******/ __webpack_require__.O = (result, chunkIds, fn, priority) => {
      /******/ if (chunkIds) {
        /******/ priority = priority || 0;
        /******/ for (
          var i = deferred.length;
          i > 0 && deferred[i - 1][2] > priority;
          i--
        )
          deferred[i] = deferred[i - 1];
        /******/ deferred[i] = [chunkIds, fn, priority];
        /******/ return;
        /******/
      }
      /******/ var notFulfilled = Infinity;
      /******/ for (var i = 0; i < deferred.length; i++) {
        /******/ var [chunkIds, fn, priority] = deferred[i];
        /******/ var fulfilled = true;
        /******/ for (var j = 0; j < chunkIds.length; j++) {
          /******/ if (
            (priority & (1 === 0) || notFulfilled >= priority) &&
            Object.keys(__webpack_require__.O).every((key) =>
              __webpack_require__.O[key](chunkIds[j])
            )
          ) {
            /******/ chunkIds.splice(j--, 1);
            /******/
          } else {
            /******/ fulfilled = false;
            /******/ if (priority < notFulfilled) notFulfilled = priority;
            /******/
          }
          /******/
        }
        /******/ if (fulfilled) {
          /******/ deferred.splice(i--, 1);
          /******/ var r = fn();
          /******/ if (r !== undefined) result = r;
          /******/
        }
        /******/
      }
      /******/ return result;
      /******/
    };
    /******/
  })();
  /******/
  /******/ /* webpack/runtime/compat get default export */
  /******/ (() => {
    /******/ // getDefaultExport function for compatibility with non-harmony modules
    /******/ __webpack_require__.n = (module) => {
      /******/ var getter =
        module && module.__esModule
          ? /******/ () => module["default"]
          : /******/ () => module;
      /******/ __webpack_require__.d(getter, { a: getter });
      /******/ return getter;
      /******/
    };
    /******/
  })();
  /******/
  /******/ /* webpack/runtime/define property getters */
  /******/ (() => {
    /******/ // define getter functions for harmony exports
    /******/ __webpack_require__.d = (exports, definition) => {
      /******/ for (var key in definition) {
        /******/ if (
          __webpack_require__.o(definition, key) &&
          !__webpack_require__.o(exports, key)
        ) {
          /******/ Object.defineProperty(exports, key, {
          enumerable: true,
          get: definition[key],
        });
          /******/
        }
        /******/
      }
      /******/
    };
    /******/
  })();
  /******/
  /******/ /* webpack/runtime/hasOwnProperty shorthand */
  /******/ (() => {
    /******/ __webpack_require__.o = (obj, prop) =>
      Object.prototype.hasOwnProperty.call(obj, prop);
    /******/
  })();
  /******/
  /******/ /* webpack/runtime/make namespace object */
  /******/ (() => {
    /******/ // define __esModule on exports
    /******/ __webpack_require__.r = (exports) => {
      /******/ if (typeof Symbol !== "undefined" && Symbol.toStringTag) {
        /******/ Object.defineProperty(exports, Symbol.toStringTag, {
    value: "Module",
  });
        /******/
      }
      /******/ Object.defineProperty(exports, "__esModule", { value: true });
      /******/
    };
    /******/
  })();
  /******/
  /******/ /* webpack/runtime/jsonp chunk loading */
  /******/ (() => {
    /******/ // no baseURI
    /******/
    /******/ // object to store loaded and loading chunks
    /******/ // undefined = chunk not loaded, null = chunk preloaded/prefetched
    /******/ // [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
    /******/ var installedChunks = {
      /******/ bundle: 0,
      /******/
    };
    /******/
    /******/ // no chunk on demand loading
    /******/
    /******/ // no prefetching
    /******/
    /******/ // no preloaded
    /******/
    /******/ // no HMR
    /******/
    /******/ // no HMR manifest
    /******/
    /******/ __webpack_require__.O.j = (chunkId) =>
      installedChunks[chunkId] === 0;
    /******/
    /******/ // install a JSONP callback for chunk loading
    /******/ var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
      /******/ var [chunkIds, moreModules, runtime] = data;
      /******/ // add "moreModules" to the modules object,
      /******/ // then flag all "chunkIds" as loaded and fire callback
      /******/ var moduleId,
        chunkId,
        i = 0;
      /******/ if (chunkIds.some((id) => installedChunks[id] !== 0)) {
        /******/ for (moduleId in moreModules) {
          /******/ if (__webpack_require__.o(moreModules, moduleId)) {
            /******/ __webpack_require__.m[moduleId] = moreModules[moduleId];
            /******/
          }
          /******/
        }
        /******/ if (runtime) var result = runtime(__webpack_require__);
        /******/
      }
      /******/ if (parentChunkLoadingFunction) parentChunkLoadingFunction(data);
      /******/ for (; i < chunkIds.length; i++) {
        /******/ chunkId = chunkIds[i];
        /******/ if (
          __webpack_require__.o(installedChunks, chunkId) &&
          installedChunks[chunkId]
        ) {
          /******/ installedChunks[chunkId][0]();
          /******/
        }
        /******/ installedChunks[chunkId] = 0;
        /******/
      }
      /******/ return __webpack_require__.O(result);
      /******/
    };
    /******/
    /******/ var chunkLoadingGlobal = (self[
      "webpackChunkcreate_html_boilerplate"
    ] = self["webpackChunkcreate_html_boilerplate"] || []);
    /******/ chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
    /******/ chunkLoadingGlobal.push = webpackJsonpCallback.bind(
      null,
      chunkLoadingGlobal.push.bind(chunkLoadingGlobal)
    );
    /******/
  })();
  /******/
  /************************************************************************/
  /******/
  /******/ // startup
  /******/ // Load entry module and return exports
  /******/ // This entry module depends on other loaded chunks and execution need to be delayed
  /******/ var __webpack_exports__ = __webpack_require__.O(
    undefined,
    [
      "vendors-node_modules_swiper_swiper_min_css-node_modules_swiper_swiper_esm_js",
    ],
    () => __webpack_require__("./source/js/index.js")
  );
  /******/ __webpack_exports__ = __webpack_require__.O(__webpack_exports__);
  /******/
  /******/
})();



