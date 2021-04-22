var map = L.map('map', {
	'center': [0, 0],
	'zoom': 0,
	'layers': [
		L.tileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
			'attribution': 'Map data &copy; OpenStreetMap contributors'
		})
	]
});

var markers = {};

function setMarkers(data) {
	data.BMS.forEach(function (obj) {
		if (!markers.hasOwnProperty(obj.id)) {
			markers[obj.id] = new L.Marker([obj.lat, obj.long]).addTo(map);
			markers[obj.id].previousLatLngs = [];
		} else {
			markers[obj.id].previousLatLngs.push(markers[obj.id].getLatLng());
			markers[obj.id].setLatLng([obj.lat, obj.long]);
		}
	});
}

var json = {
	"BMS": [{
		"id": '1',
		"lat": -7.282826,
		"long": 112.794709
	}, {
		"id": '2',
		"lat": -7.294911,
		"long": 112.794709
	}]
}

setMarkers(json);

setInterval(function () {
	let dataJson;
	$.ajax({
		url: base + 'getjson/getdata',
		dataType: 'json',
		async: false,
		success: function (response) {
			dataJson = response;
			console.log(response);
		}
	});
	console.log(dataJson);
	setMarkers(dataJson);
}, 1000);

console.log(markers);
