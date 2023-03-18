document.addEventListener('DOMContentLoaded', (e) => {
  const searchByName = {
    input: document.getElementById('search'),
    button: document.getElementById('search_button'),
    list: document.getElementById('search_list'),
    loader: document.getElementById('search_loader'),
    items: [],

    init() {
      this.input.addEventListener('input', this.debounce(this.search.bind(this)));
      this.input.addEventListener('active', () => {
        if (this.items.length > 0) {
          this.show();
        }
      });
      this.input.addEventListener('focus', () => {
        if (this.items.length > 0) {
          this.show();
        }
      });
      document.addEventListener('click', this.checkMiss.bind(this))
    },

    debounce(func, wait = 500) {
      let timeoutId;
      return function (...args) {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
          func.apply(this, args);
        }, wait);
      }
    },

    async search() {
      if (this.input.value.length > 2) {
        this.showLoader();
        const resp = await fetch(`/admin/shops/${this.input.value}`);
        // const resp = await fetch(`/admin/shops?title=${this.input.value}`);
        const result = await resp.json();
        if (result.ok) {
          this.items = result.shops.length > 0 ? result.shops : [{ error: true, message: 'Ничего не найдено'}];
          this.addItems();
          this.show();
        }
        this.hideLoader();
      } else {
        this.items = [];
        this.list.innerHTML = '';
        this.hide();
        this.hideLoader();
      }
    },

    addItems() {
      this.list.innerHTML = '';
      if (this.items.length == 1 && this.items[0].error) {
        this.list.innerHTML += `
          <li class="admin-panel-search_item px-2 py-2">
            ${this.items[0].message}
          </li>
        `;
        return;
      }
      this.items.forEach(item => {
        this.list.innerHTML += `
          <li class="admin-panel-search_item">
            <a class="admin-panel-search_link" href="/shop/${item.id}">${item.name}</a>
          </li>
        `;
      });
    },

    checkMiss(e) {
      if (this.list.contains(e.target)) return;
      if (e.target == this.input) return;
      this.hide();
    },

    show() {
      this.list.removeAttribute('hidden');
    },

    hide() {
      this.list.setAttribute('hidden', true);
    },

    showLoader() {
      this.loader.removeAttribute('hidden');
    },

    hideLoader() {
      this.loader.setAttribute('hidden', true);
    },
  }
  searchByName.init();
});
