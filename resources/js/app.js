import ModalWindow from './plugins/modal/ModalWindow';
import "./scripts/layouts/header";

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

	isOpen: function (instance, event) { console.log('open') },

	isClose: function (instance, event) { console.log('close') },
});

