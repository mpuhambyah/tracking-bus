var map = L.map('map', {
	'center': [0, 0],
	'zoom': 0,
	'layers': [
		L.tileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
			'attribution': 'Map data &copy; OpenStreetMap contributors'
		})
	]
});

var realtime = [];
var arrayLatLng = [];
var temp_nowLatLng = "[]";

for (let i = 0; i < 2; i++) {
	realtime[i] = L.realtime({
		// url: 'https://wanderdrone.appspot.com/',
		url: base + 'getjson/getdata',
		type: 'json'
	}, {
		interval: 500,
		pointToLayer: function (feature, latlng) {
			marker = L.marker(latlng, {
				'icon': L.icon({
					iconUrl: 'assets/img/bus_point[' + i + '].png ',
					iconSize: [38, 54], // size of the icon
					iconAnchor: [20, 55], // point of the icon which will correspond to marker's location
					popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
				})
			});
			return marker
		}
	}).addTo(map);
}

realtime[0].on('update', function (e) {
	var popupContent = function (fId) {
			var feature = e.features[fId],
				c = feature.geometry.coordinates;
			return c;
		},
		bindFeaturePopup = function (fId) {
			realtime[0].getLayer(fId).bindPopup(popupContent(fId));
		},
		updateFeaturePopup = function (fId) {
			realtime[0].getLayer(fId).getPopup().setContent("Bus at " + popupContent(fId));
		},
		polyline = function (fId) {
			nowLatLng = [popupContent(fId)[1], popupContent(fId)[0]];
			if (nowLatLng[0] != temp_nowLatLng[0] && nowLatLng[1] != temp_nowLatLng[1]) {
				arrayLatLng.push(nowLatLng);
			}
			temp_nowLatLng = nowLatLng;
		};

	map.fitBounds(realtime[0].getBounds(), {
		maxZoom: 15
	});

	Object.keys(e.enter).forEach(bindFeaturePopup);
	Object.keys(e.update).forEach(updateFeaturePopup);
	Object.keys(e.update).forEach(polyline);
	L.polyline(arrayLatLng, {
		color: 'red'
	}).addTo(map);
});

realtime[1].on('update', function (e) {});
