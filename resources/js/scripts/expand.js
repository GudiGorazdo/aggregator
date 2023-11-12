/**
 * скрипт для блоков, увеличивающих свой размер по событию
 *
 * ${this.attributes.path}="value" -- html атрибут кнопки
 * ${this.attributes.target}="value" -- html атрибут блока
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
	classes: {
		active: 'active',
	},
	attributes: {
		path: 'data-expand-path',
		target: 'data-expand-target',
		totalHeight: 'data-expand-total-height',
		startHeight: 'data-expand-start-height',
	},
	itemsPath: null,
	itemsTarget: null,
	transition: 0.3,

	init() {
		this.itemsPath = document.querySelectorAll(`[${this.attributes.path}]`);
		this.itemsTarget = document.querySelectorAll(`[${this.attributes.target}]`);
		this.toggle = this.toggle.bind(this);
		this.itemsPath.forEach(button => {
			button.transition = button.dataset.expandTransition ?? this.transition;
			button.addEventListener('click', this.toggle);
		});
	},

	toggle(event) {
		const button = event.target;
		const path = button.dataset.expandPath;
		const container = document.querySelector(`[${this.attributes.target}="${path}"]`);
		const opened = button.classList.contains(this.classes.active);
		if (opened) this.close(button, container);
		else this.open(button, container);
	},

	open(button, container) {
		document.querySelectorAll(`[${this.attributes.path}="${button.dataset.expandPath}"]`).forEach(item => item.classList.add(this.classes.active));
		const startHeight = container.clientHeight;
		container.style.height = `${startHeight}px`;
		container.setAttribute(this.attributes.startHeight, startHeight);
		const totalHeight = container.scrollHeight;
		container.setAttribute(this.attributes.totalHeight, totalHeight);
		container.style.transition = `all ${button.transition}s ease-in-out`;
		setTimeout(() => container.style.height = `${totalHeight}px`, 10);
		setTimeout(() => container.style.height = '', button.transition * 1000);
	},

	close(button, container) {
		document.querySelectorAll(`[${this.attributes.path}="${button.dataset.expandPath}"]`).forEach(item => item.classList.remove(this.classes.active));
		container.style.height = `${container.dataset.expandTotalHeight}px`;
		setTimeout(() => container.style.height = `${container.dataset.expandStartHeight}px`, 10);
		setTimeout(() => {
			container.removeAttribute(this.attributes.startHeight);
			container.removeAttribute(this.attributes.totalHeight);
			container.removeAttribute('style');
		}, button.transition * 1000);
	},
}.init();
