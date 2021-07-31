var map = L.map('map', {
	'center': [-7.2819492, 112.792329],
	'zoom': 10,
	'layers': [
		L.tileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
			'attribution': 'Map data &copy; OpenStreetMap contributors'
		})
	]
});




var markers = {};
var polyline = {};
let latlng_polyline = [];

const $button = document.querySelector('#sidebar-toggle');
const $wrapper = document.querySelector('#wrapper');

var datawrapper;
var popUpUrl = base + '/assets/img/marker-point.png';
var customPopup = '<img src="' + popUpUrl + '" width="25"></img>';

// specify popup options 
var customOptions = {
	'maxWidth': '100',
	'className': 'custom'
}

var busIcon = L.icon({
	iconUrl: base + '/assets/img/marker-bus.png',
	iconSize: [38, 95], // size of the icon
});

var busIconClicked = L.icon({
	iconUrl: base + '/assets/img/marker-busClicked.png',
	iconSize: [38, 95], // size of the icon
});

var busIconClicked = L.icon({
	iconUrl: base + '/assets/img/marker-busClicked.png',
	iconSize: [38, 95], // size of the icon
});

var busIconUserBus = L.icon({
	iconUrl: base + '/assets/img/marker-busUser.png',
	iconSize: [38, 95], // size of the icon
});

let id_prev = 0;


function setMarkers(data) {
	data.BMS.forEach(function (obj) {
		let temp;
		if (!markers.hasOwnProperty(obj.id)) {
			latlng_polyline[obj.id] = [];
			markers[obj.id] = new L.Marker([obj.lat, obj.long], {
				icon: busIcon,
				rotationAngle: obj.head
			}).addTo(map);
			markers[obj.id].previousLatLngs = [];
		} else {
			temp = markers[obj.id].getLatLng();
			markers[obj.id].previousLatLngs.push(markers[obj.id].getLatLng());
			markers[obj.id].setLatLng([obj.lat, obj.long]);
			markers[obj.id].setRotationAngle(obj.head);
		}

		if (obj.role_id == 1) {
			if (typeof markers[obj.bus_id] !== 'undefined') {
				markers[obj.bus_id].setIcon(busIconUserBus);
			}
			markers[obj.bus_id].fire('click');
		}

		$button.addEventListener('click', (e) => {
			e.preventDefault();
			markers[obj.id].setIcon(busIcon);
			$('#wrapper').addClass('toggled');
			clearInterval(datawrapper);
		});

		map.on('click', function () {
			markers[obj.id].setIcon(busIcon);
			markers[obj.bus_id].setIcon(busIconUserBus);
			$('#wrapper').addClass('toggled');
			clearInterval(datawrapper);
		});

		markers[obj.id].on('click', function () {
			if (id_prev) {
				markers[id_prev].setIcon(busIcon);
				markers[obj.bus_id].setIcon(busIconUserBus);
			}
			if (id_prev == obj.id) {
				markers[obj.id].setIcon(busIconClicked);
				markers[obj.bus_id].setIcon(busIconUserBus);
			}
			if (obj.id == obj.bus_id) {
				markers[obj.bus_id].setIcon(busIconUserBus);
			} else {
				markers[obj.id].setIcon(busIconClicked);
			}
			id_prev = obj.id;
			clearInterval(datawrapper);
			$('#wrapper').removeClass('toggled');
			const id = obj.id;
			datawrapper = setInterval(function () {
				$.ajax({
					url: base + 'getjson/getdatawrapper',
					dataType: 'json',
					data: {
						id: id,
					},
					method: "post",
					success: function (data) {
						$('.bus-name').html(data.name);
						$('#image').html('<img src="' + base + '/assets/img/' + data.image + '" alt="bus-image" class="img-fluid mb-3" style="border-radius: 15px;">');
						$('#speed').html(data.speed);
						$('#location').html(data.latitude + ', ' + data.longitude);
						$('#time').html(data.time);
						$('#time_ago').html(data.time_ago);
						map.flyTo([data.latitude, data.longitude], 18, {
							animate: true,
							duration: 1
						});
					}
				});
			}, 500);
		});
	});
}

let dataJson;

setInterval(function () {
	$.ajax({
		url: base + 'getjson/getdata',
		dataType: 'json',
		async: false,
		success: function (response) {
			response.BMS.forEach(function (data, i) {
				if (dataJson) {
					if (data.id_data != dataJson.BMS[i].id_data) {
						dataJson = response;
						setMarkers(dataJson);
						// console.log(dataJson);
					}
				} else {
					dataJson = response;
					setMarkers(dataJson);
					// console.log(dataJson);
				}
			});
		}
	});
	// console.log(dataJson);
}, 1000);
