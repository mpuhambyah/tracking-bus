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
var polyline = {};
let latlng_polyline = [];

function setMarkers(data) {
	data.BMS.forEach(function (obj) {
		let temp;
		if (!markers.hasOwnProperty(obj.id)) {
			markers[obj.id] = new L.Marker([obj.lat, obj.long]).addTo(map);
			markers[obj.id].previousLatLngs = [];
		} else {
			temp = markers[obj.id].getLatLng();
			markers[obj.id].previousLatLngs.push(markers[obj.id].getLatLng());
			markers[obj.id].setLatLng([obj.lat, obj.long]);
			latlng_polyline.push([
				[obj.lat, obj.long], temp
			]);
		}
		if (!polyline.hasOwnProperty(obj.id)) {
			polyline[obj.id] = new L.polyline([
				[obj.lat, obj.long],
				[obj.lat, obj.long]
			], {
				color: 'red'
			}).addTo(map);
			polyline[obj.id].previousLatLngs = [obj.lat, obj.long];
		} else {
			polyline[obj.id] = L.polyline(latlng_polyline, {
				color: 'red'
			}).addTo(map);
			polyline[obj.id].previousLatLngs.push(polyline[obj.id].getLatLng());
			polyline[obj.id].setLatLng([obj.lat, obj.long]);
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
}, 500);

console.log(markers);
