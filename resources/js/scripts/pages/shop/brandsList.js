let brandsListItemsEls = document.querySelectorAll(".brands-list__item--sell");

brandsListItemsEls.forEach(function (el) {
	el.addEventListener("click", () => {
		const targetList = document.querySelector(
			`[data-target="${el.parentElement.dataset.path}"]`,
		);
		const breadcrumbs = document.querySelector(
			`[data-target-breadcrumbs="${el.parentElement.dataset.path}"]`,
		);
		targetList.classList.add("open");
		breadcrumbs.parentElement.classList.add("open");
		el.parentElement.classList.remove("open");
		const close = () => {
			targetList.classList.remove("open");
			breadcrumbs.parentElement.classList.remove("open");
			el.parentElement.classList.add("open");
			breadcrumbs.removeEventListener("click", close);
		};
		breadcrumbs.addEventListener("click", close);
	});
});
