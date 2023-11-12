import ModalWindow from './plugins/modal/ModalWindow';
import "./scripts/layouts/header";

// document.addEventListener('click', e => console.log(e.target));
window.app = {};
app.modal = new ModalWindow({
	classes: {
		message: {
			container: 'site-message',
			close: 'btn btn--close site-message__close',
			title: 'site-message__title',
			text: 'site-message__text',
		}
	},

	// раскоментировать в случае если потребуется использовать
	// isOpen: function (instance, event) { console.log('open') },
	// isClose: function (instance, event) { console.log('close') },
});

