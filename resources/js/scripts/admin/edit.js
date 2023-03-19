import Dropzone from "dropzone";

document.addEventListener('DOMContentLoaded', () => {
  /*const oldPhotos = {*/
    /*deleteButton: document.getElementById('shop_photos_remove'),*/
    /*formDelete: document.getElementById('shop_photos_form'),*/
    /*list: document.getElementById('shop_photos_list'),*/
    /*count: document.getElementById('shop_photos_count'),*/

    /*init() {*/
      /*//this.deleteButton.addEventListener('click', this.confirm);*/
    /*},*/

    /*confirm() {*/
      /*$modal.options.setConfirm(() => oldPhotos.delete());*/
    /*},*/

    /*async delete() {*/
      /*const data = new FormData(this.formDelete);*/
      /*const resp = await fetch('/admin/shop/delete_photos', {*/
        /*method: 'POST',*/
        /*headers: {*/
          /*'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),*/
        /*},*/
        /*body: data*/

      /*});*/
      /*const result = await resp.json();*/
      /*if (result.ok) {*/
        /*this.updateList(result.items, result.count);*/
      /*}*/
    /*},*/

    /*updateList(items, count) {*/
      /*this.list.innerHTML = items;*/
      /*this.count.innerHTML = count;*/
    /*},*/
  /*};*/
  /*oldPhotos.init();*/

  const mainForm = {
    el: document.getElementById('shop-main-form'),
    formDelete: document.getElementById('shop_photos_form'),
    photos: [],
    data: null,

    init() {
      this.el.addEventListener('submit', this.submit.bind(this));
    },

    async submit(e) {
      e.preventDefault();
      this.data = new FormData(this.formDelete);
      this.photos.forEach(photo => this.data.append('photos[]', photo));
      this.data.append('_method', 'PATCH');
      const resp = await fetch(`/admin/shop/${this.el.dataset.id}`, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: this.data,
      });
      const result = await resp.json();
      console.log(result);
    },
  };
  mainForm.init();

  let myDropzone = new Dropzone("#shop_add_photos", {
    addRemoveLinks: true,
    acceptedFiles: 'image/png, image/jpeg, image/jpg, image/webp',
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    },
  });

  myDropzone.on("addedfile", file => {
    mainForm.photos.push(file);
  });
  myDropzone.on("removedfile", file => {
    mainForm.photos = mainForm.photos.filter(photo => photo !== file);
  });
});
