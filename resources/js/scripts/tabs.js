/**
 *
 *  ТАБЫ
 * Чтобы использовать надо задать HTML
 * элементам data аттрибуты.
 *
 * Для кнопки      - data-tab-path="example"
 * Для секции      - data-tab-target="example"
 * Для группировки - data-tab-group="example-group"
 *
 * Группировка табов обязательна!
 *
 * При нажатии на кнопку соответствующей секции добавляется
 * клас open (для него есть стили в /resources/styles/layouts/tabs.scss)
 * при этом у соответствующей группы табов этот класс удаляется
 *
 */

const tabs = {
  showClass: "open",
  paths: null,
  targets: null,

  init() {
    this.show = this.show.bind(this);
    this.hideAll = this.hideAll.bind(this);
    this.paths = document.querySelectorAll("[data-tab-path]");
    this.targets = document.querySelectorAll("[data-tab-target]");

    this.paths.forEach((el) => {
      el.addEventListener("click", () => {
        this.hideAll(el);
        this.show(el);
      });
    });
  },

  show(el) {
    this.targets.forEach((target) => {
      if (target.dataset.tabTarget === el.dataset.tabPath) {
        target.classList.add(this.showClass);
      }
    });
  },

  hideAll(el) {
    this.targets.forEach((target) => {
      if (target.dataset.tabGroup === el.dataset.tabGroup) {
        target.classList.remove(this.showClass);
      }
    });
  },
}.init();
