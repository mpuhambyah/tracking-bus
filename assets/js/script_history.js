var mymap = L.map('mapid', {
	'center': [-7.2819492, 112.792329],
	'zoom': 10,
	'layers': [
		L.tileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
			'attribution': 'Map data &copy; OpenStreetMap contributors'
		})
	]
}).addTo(mymap);
