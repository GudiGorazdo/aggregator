ymaps.ready(function () {
	const coord = JSON.parse(document.getElementById("shop_coord").value);
	var myMap = new ymaps.Map("map", {
		center: [coord.lat, coord.long],
		zoom: 10,
		controls: [],
	}),
		markCollection = new ymaps.GeoObjectCollection(null, {
			iconColor: "#6c757d",
		});

	myMap.controls.add("zoomControl");
	myMap.controls.remove("typeSelector");
	myMap.controls.remove("geolocationControl");
	myMap.controls.remove("trafficControl");
	myMap.controls.remove("FullscreenControl");

	const mark = new ymaps.Placemark([coord.lat, coord.long]);
	markCollection.add(mark);
	myMap.geoObjects.add(markCollection);
});
