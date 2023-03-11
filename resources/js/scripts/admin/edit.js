document.addEventListener('DOMContentLoaded', () => {
  const photos = {
    deleteButton: document.getElementById('shop_photos_remove'),
    formDelete: document.getElementById('shop_photos_form'),
    list: document.getElementById('shop_photos_list'),
    count: document.getElementById('shop_photos_count'),

    init() {
      this.deleteButton.addEventListener('click', this.confirm);
    },

    confirm() {
      $modal.options.setConfirm(() => photos.delete());
    },

    async delete() {
      const data = new FormData(this.formDelete);
      const resp = await fetch('/admin/shops/update_photos', {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: data

      });
      const result = await resp.json();
      if (result.ok) {
        this.updateList(result.items, result.count);
      }
    },

    updateList(items, count) {
      this.list.innerHTML = items;
      this.count.innerHTML = count;
    },
  }

  photos.init();
});
