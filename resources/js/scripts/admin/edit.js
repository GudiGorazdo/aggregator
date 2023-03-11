document.addEventListener('DOMContentLoaded', () => {
    const photos = {
        delete: document.getElementById('shop_photos_remove'),
        formDelete: document.getElementById('shop_photos_form'),

        init() {
            this.formDelete.addEventListener('submit', async (e) => {
                e.preventDefault();
                const data = new FormData(this.formDelete);
                // const resp = await fetch('/admin/shops/update_photos', {
                //     method: 'POST',
                //     headers: {
                //         'Content-Type': 'application/json'
                //       },
                //     body: data
                // });
                const resp = await fetch('/admin/shops/update_photos?id=asdf');
                console.log(resp);
            });
        },
    }
    photos.init();
});
