/**
 * скрипт для блоков, увеличивающих свой размер по событию
 *
 * data-expand-path="value" -- html атрибут кнопки
 * data-expand-target="value" -- html атрибут блока
 * data-expand-transition="0.3" -- плавность анимации
 *
 * так же может работать с элементами у которых задано свойство display: none,
 * добавляя высоту плавно, если есть список, в котором видны
 * только первые элементы, а у остальных задано свойство display: none,
 * то можно задать для списка, например, такие стили и список будет
 * открываться плавно
 *
 * ul {
 *   overflow: hidden;
 * }
 *
 * ul>li:nth-child(n+6) {
 *   display: none;
 * }
 *
 * ul[data-expand-start-height]>li:nth-child(n+6) {
 *   display: block;
 * }
 *
 */

const expand = {
	activeClass: 'active',
	totalHeightAttribute: 'data-expand-total-height',
	startHeightAttribute: 'data-expand-start-height',
	itemsPath: null,
	itemsTarget: null,
	transition: 0.3,

	init() {
		this.itemsPath = document.querySelectorAll('[data-expand-path]');
		this.itemsTarget = document.querySelectorAll('[data-expand-target]');
		this.toggle = this.toggle.bind(this);
		this.itemsPath.forEach(button => {
			button.transition = button.dataset.expandTransition ?? this.transition;
			button.addEventListener('click', this.toggle);
		});
	},

	toggle(event) {
		const button = event.target;
		const path = button.dataset.expandPath;
		const container = document.querySelector(`[data-expand-target="${path}"]`);
		const opened = button.classList.contains(this.activeClass);
		if (opened) this.close(button, container);
		else this.open(button, container);
	},

	open(button, container) {
		document.querySelectorAll(`[data-expand-path="${button.dataset.expandPath}"]`).forEach(item => item.classList.add(this.activeClass));
		const startHeight = container.clientHeight;
		container.style.height = `${startHeight}px`;
		container.setAttribute(this.startHeightAttribute, startHeight);
		const totalHeight = container.scrollHeight;
		container.setAttribute(this.totalHeightAttribute, totalHeight);
		container.style.transition = `height ${button.transition}s ease-in-out`;
		setTimeout(() => container.style.height = `${totalHeight}px`, 10);
		setTimeout(() => container.style.height = 'unset', button.transition * 1000);
	},

	close(button, container) {
		document.querySelectorAll(`[data-expand-path="${button.dataset.expandPath}"]`).forEach(item => item.classList.remove(this.activeClass));
		container.style.height = `${container.dataset.expandTotalHeight}px`;
		setTimeout(() => container.style.height = `${container.dataset.expandStartHeight}px`, 10);
		setTimeout(() => {
			container.removeAttribute(this.startHeightAttribute);
			container.removeAttribute(this.totalHeightAttribute);
			container.removeAttribute('style');
		}, button.transition * 1000);
	},
}.init();
