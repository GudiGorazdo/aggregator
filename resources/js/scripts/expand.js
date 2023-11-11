/**
 * скрипт для блоков, увеличивающих свой размер по событию
 *
 * data-expand-path="value" -- html атрибут кнопки
 * data-expand-target="value" -- html атрибут блока
 */


const expand = {
    activeClass: 'active',
    itemsPath: null,
    itemsTarget: null,

    init() {
        this.itemsPath = document.querySelectorAll('[data-expand-path]');
        this.itemsTarget = document.querySelectorAll('[data-expand-target]');

        this.toggle = this.toggle.bind(this);

        this.itemsPath.forEach(button => {
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
        button.classList.add(this.activeClass);
        const height = container.scrollHeight;
        console.log(container);
        console.log(height);
        container.style.height = `${height}px`;
    },

    close(button, container) {
        button.classList.remove(this.activeClass);
        container.removeAttribute('style');
    },

    getContainerHeight(container) {
        const height = container.scrollHeight;
        container.style.height = height;
    },
}.init();
