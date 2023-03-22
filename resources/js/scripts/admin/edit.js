import Dropzone from "dropzone";

document.addEventListener('DOMContentLoaded', () => {
  const mainForm = {
    el: document.getElementById('shop-main-form'),
    formDelete: document.getElementById('shop_photos_form'),
    latitude: document.getElementById('lat'),
    longitude: document.getElementById('long'),
    rating: document.querySelectorAll('[id^="service"]'),
    telegram: document.getElementById('tg_input'),
    whatsapp: document.getElementById('whatsapp_input'),
    phone: document.getElementById('phone_input'),
    descriptionDesktop: document.getElementById('descriotion_desktop'),
    descriptionMobile: document.getElementById('descriotion_mobile'),
    phone: document.getElementById('phone_main'),
    additionalPhones: document.querySelectorAll('[id^="phone_additional"]'),
    webs: document.querySelectorAll('[id^="web_"]'),
    open: document.querySelectorAll('[id^="open_day"]'),
    close: document.querySelectorAll('[id^="close_day"]'),
    address: document.getElementById('address'),

    photos: [],
    services: [],
    workMode: {
    1: {
        open: '',
        close: '',
      },
    2: {
        open: '',
        close: '',
      },
    3: {
        open: '',
        close: '',
      },
    4: {
        open: '',
        close: '',
      },
    5: {
        open: '',
        close: '',
      },
    6: {
        open: '',
        close: '',
      },
    7: {
        open: '',
        close: '',
      },

    },

    data: null,

    init() {
      this.el.addEventListener('submit', this.submit.bind(this));
    },

    async submit(e) {
      e.preventDefault();
      this.data = new FormData(this.formDelete);
      this.photos.forEach(photo => this.data.append('photos[]', photo));
      this.data.append('_method', 'PATCH');
      this.data.append('latitude', this.latitude.value);
      this.data.append('longitude', this.longitude.value);
      this.rating.forEach(service => this.services.push({
        id: service.name, 
        rating: service.value,
      }));
      this.data.append('services', JSON.stringify(this.services));
      this.data.append('telegram', this.telegram.value);
      this.data.append('whatsapp', this.whatsapp.value);
      this.data.append('phone', this.phone.value);
      this.data.append('phone', this.phone.value);
      this.additionalPhones.forEach(phone => this.data.append('additional_phones[]', phone.value));
      this.webs.forEach(web => this.data.append('web[]', web.value));
      this.open.forEach(mode => this.workMode[parseInt(mode.name)]['open'] = mode.value);
      this.close.forEach(mode => this.workMode[parseInt(mode.name)]['close'] = mode.value);
      this.data.append('work_mode', JSON.stringify(this.workMode));
      this.data.append('address', this.address.value);
      if (window.innerWidth > 768) {
        this.data.append('description', this.descriptionDesktop.value);
      } else {
        this.data.append('description', this.descriptionMobile.value);
      }
      const resp = await fetch(`/admin/shop/${this.el.dataset.id}`, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: this.data,
      });
      const result = await resp.json();
      console.log(result);
      this.data = null;
      this.photos = [];
      this.services = [];
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
