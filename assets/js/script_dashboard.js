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
var color = ['', 'red', 'green', 'yellow'];

const $button = document.querySelector('#sidebar-toggle');
const $wrapper = document.querySelector('#wrapper');

var datawrapper;

var customPopup = '<img src="https://www.pngkey.com/png/full/51-517748_bus-icon-png-white.png" width="50"></img>';

// specify popup options 
var customOptions = {
	'maxWidth': '500',
	'className': 'custom'
}

function setMarkers(data) {
	data.BMS.forEach(function (obj) {
		let temp;
		if (!markers.hasOwnProperty(obj.id)) {
			latlng_polyline[obj.id] = [];
			markers[obj.id] = new L.Marker([obj.lat, obj.long]).addTo(map);
			markers[obj.id].previousLatLngs = [];
		} else {
			temp = markers[obj.id].getLatLng();
			markers[obj.id].previousLatLngs.push(markers[obj.id].getLatLng());
			markers[obj.id].setLatLng([obj.lat, obj.long]);
			// if (latlng_polyline[obj.id].length) {
			// 	if (latlng_polyline[obj.id][latlng_polyline[obj.id].length - 1][0][0] == temp.lat && latlng_polyline[obj.id][latlng_polyline[obj.id].length - 1][0][1] == temp.lng) {
			// 		// console.log('oke');
			// 	} else {
			// 		latlng_polyline[obj.id].push([
			// 			[parseFloat(obj.lat), parseFloat(obj.long)],
			// 			[temp.lat, temp.lng]
			// 		]);
			// 		// console.log(latlng_polyline[obj.id]);
			// 	}
			// } else {
			// 	latlng_polyline[obj.id].push([
			// 		[parseFloat(obj.lat), parseFloat(obj.long)],
			// 		[temp.lat, temp.lng]
			// 	]);
			// 	// console.log(latlng_polyline[obj.id]);
			// }

			// latlng_polyline[obj.id].push([
			// 	[parseFloat(obj.lat), parseFloat(obj.long)],
			// 	[temp.lat, temp.lng]
			// ]);
		}


		// console.log(latlng_polyline);
		// markers[obj.id].previousLatLngs = [obj.lat, obj.long];
		// L.polyline(latlng_polyline[obj.id], {
		// 	color: color[obj.id]
		// }).addTo(map);

		$button.addEventListener('click', (e) => {
			e.preventDefault();
			$('#wrapper').addClass('toggled');
			clearInterval(datawrapper);
		});

		map.on('click', function () {
			$('#wrapper').addClass('toggled');
			clearInterval(datawrapper);
		});

		markers[obj.id].once('click', function () {
			markers[obj.id].bindPopup(customPopup, customOptions).openPopup();
		});

		markers[obj.id].on('click', function () {
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
						console.log(data.id);
						$('.bus-name').html(data.name);
						$('#image').html('<img src="' + base + '/assets/img/' + data.image + '" alt="bus-image" class="img-fluid mb-3" style="border-radius: 15px;">');
						$('#speed').html(data.speed);
						$('#location').html(data.latitude + ', ' + data.longitude);
						$('#time').html(data.time);
					}
				});
			}, 500);
			map.flyTo([obj.lat, obj.long], 15, {
				animate: true,
				duration: 5
			});
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
						console.log(dataJson);
					}
				} else {
					dataJson = response;
					setMarkers(dataJson);
				}
			});
		}
	});
	// console.log(dataJson);
}, 1000);
