// initialize the map on the "map" div with a given center and zoom
var map = new L.Map('map', {
	zoom: 6,
	minZoom: 3,
});

// create a new tile layer
var tileUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
	layer = new L.TileLayer(tileUrl, {
		attribution: 'Maps © <a href=\"www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors',
		maxZoom: 18
	});

// add the layer to the map
map.addLayer(layer);

var TrackCoba = [
	[-7.279411, 112.788984],
	[-7.27931, 112.789692],
	[-7.279251, 112.790078],
	[-7.279028, 112.79025],
	[-7.278932, 112.790443],
	[-7.278935, 112.790573],
	[-7.278975, 112.790659],
	[-7.279097, 112.790774],
	[-7.279179, 112.790815],
	[-7.279289, 112.790833],
	[-7.279379, 112.790801],
	[-7.279446, 112.790774],
	[-7.279504, 112.790747],
	[-7.279754, 112.790978],
	[-7.27998, 112.791182],
	[-7.280015, 112.791917],
	[-7.280015, 112.791917],
];






map.fitBounds(TrackCoba);

//========================================================================
var x;
var y;
x = 38;
y = 54;
var busIcon = L.icon({
	iconUrl: base + 'assets/img/bus_point.png',
	iconSize: [x, y], // size of the icon
	// shadowSize: [50, 64], // size of the shadow
	iconAnchor: [x - 18, y + 2], // point of the icon which will correspond to marker's location
	// shadowAnchor: [4, 62], // the same for the shadow
	popupAnchor: [x - 41, y - 130] // point from which the popup should open relative to the iconAnchor
});

// var marker1 = L.Marker.movingMarker(parisKievLL, [10000]).addTo(map);

// L.polyline(parisKievLL).addTo(map);
// marker1.once('click', function () {
//     marker1.start();
//     marker1.closePopup();
//     marker1.unbindPopup();
//     marker1.on('click', function () {
//         if (marker1.isRunning()) {
//             marker1.pause();
//         } else {
//             marker1.start();
//         }
//     });
//     setTimeout(function () {
//         marker1.bindPopup('<b>Click me to pause !</b>').openPopup();
//     }, 2000);
// });


// marker1.bindPopup('<b>Click me to start !</b>', {
//     closeOnClick: false
// });
// marker1.openPopup();

//========================================================================

var marker2 = L.Marker.movingMarker(TrackCoba,
	9000, {
		autostart: true,
		icon: busIcon,
		loop: true,
		riseOnHover: true
	}).addTo(map);
// L.polyline(TrackCoba, {
// 	color: 'red'
// }).addTo(map);

marker2.bindPopup('<p><b>Kondisi Bis 1</b><br/>Kecepatan<br/>Bahan Bakar<br/>Longitude<br/>Latitude</p>');


marker2.on('end', function () {
	marker2.bindPopup('<b>Simulasi Selesai</b>', {
			closeOnClick: false
		})
		.openPopup();
});

//=========================================================================

// var marker3 = L.Marker.movingMarker(TrackCoba,
// 	[2000, 2000, 2000, 2000], {
// 		autostart: true,
// 		loop: true
// 	}).addTo(map);

// marker3.loops = 0;
// marker3.bindPopup('', {
// 	closeOnClick: false
// });

//=========================================================================

var marker4 = L.Marker.movingMarker([
	[-7.279411, 112.788984]
], [], {
	icon: busIcon
}).addTo(map);

// marker3.on('loop', function (e) {
// 	marker3.loops++;
// 	if (e.elapsedTime < 50) {
// 		marker3.getPopup().setContent("<b>Loop: " + marker3.loops + "</b>")
// 		marker3.openPopup();
// 		setTimeout(function () {
// 			marker3.closePopup();

// 			if (!marker1.isEnded()) {
// 				marker1.openPopup();
// 			} else {
// 				if () {

// 				}

// 			}

// 		}, 2000);
// 	}
// });
// marker4.getLatLng().equals([-7.279411, 112.788984]);
let arrayLatLng = [
	[-7.279411, 112.788984]
];
map.on("click", function (e) {
	marker4.moveTo(e.latlng, 2000);
	nowLatLng = [e.latlng.lat, e.latlng.lng];
	arrayLatLng.push(nowLatLng)
	L.polyline(arrayLatLng, {
		color: 'red'
	}).addTo(map);
	console.log(arrayLatLng);
});



//=========================================================================

// var marker5 = L.Marker.movingMarker(
//     barcelonePerpignanPauBordeauxMarseilleMonaco,
//     10000, {
//         autostart: true
//     }).addTo(map);

// marker5.addStation(1, 2000);
// marker5.addStation(2, 2000);
// marker5.addStation(3, 2000);
// marker5.addStation(4, 2000);

// L.polyline(barcelonePerpignanPauBordeauxMarseilleMonaco, {
//     color: 'green'
// }).addTo(map);
