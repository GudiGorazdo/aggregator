import "../expand";

document.querySelectorAll('.hero__btn').forEach(button => {
		button.addEventListener('click', (e) => {
			app.modal.showMessage({text: 'Данный функционал находится в разработке'});
		});
	})
