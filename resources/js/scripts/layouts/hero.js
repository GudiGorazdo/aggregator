import "../expand";

document.querySelector('.hero__btn').addEventListener('click', (e) => {
	app.modal.showMessage({
		text: 'Данный функционал находится в разработке',
		// title: 'UVAGA',
		// classes: {
		// 	container: 'TEST',
		// 	close: 'TEST',
		// 	title: 'TEST',
		// 	text: 'TEST',
		// }
	});
});
