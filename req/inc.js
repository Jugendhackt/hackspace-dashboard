function init() {
	// create a map in the "map" div, set the view to a given place and zoom
	var map = L.map('map').setView([51.505, -0.09], 13);

	// add an OpenStreetMap tile layer
	L.tileLayer('http://tiles.odcdn.de/planet/{z}/{x}/{y}.png', {
		attribution : '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	// add a marker in the given location, attach some popup content to it and open the popup
	var iconred = L.icon({
		iconUrl : 'img/flag.png',
		iconSize : [25, 38],
		iconAnchor : [1, 19],
		popupAnchor : [12, -15]
	});
	var icongreen = L.icon({
		iconUrl : 'img/flag2.png',
		iconSize : [25, 38],
		iconAnchor : [1, 19],
		popupAnchor : [12, -15]
	});
	L.marker([51.5, -0.09], {
		icon : iconred
	}).addTo(map).bindPopup('A pretty CSS3 popup. <br> Easily customizable.');
	L.marker([51.6, -0.09], {
		icon : icongreen
	}).addTo(map).bindPopup('A pretty CSS3 popup. <br> Easily customizable.');
}