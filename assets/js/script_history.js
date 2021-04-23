var mymap = L.map('mapid', {
	'center': [-7.2819492, 112.792329],
	'zoom': 10,
	'layers': [
		L.tileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
			'attribution': 'Map data &copy; OpenStreetMap contributors'
		})
	]
});

var theMarker = {};
var thePolyline = {};

$('.getId').on('click', function () {
	mymap.removeLayer(thePolyline);
	let arrayLatLng = [
		[]
	];
	// console.log(arrayLatLng);
	const id = $(this).data("id");
	$.ajax({
		url: base + "home/getContentHistory",
		data: {
			id: id,
		},
		method: "post",
		dataType: "json",
		success: function (data) {
			let html_content = "";
			console.log(data);
			html_title = '<h5 class="card-title">' + data.name + '</h5>';
			html_image = '<img class="card-img-top" src="' + data.image + '" alt="Card image cap">';
			html_content += '<p class="card-text">' + data.description + '</p>';
			html_content += '<p class="card-text">' + data.speed + '</p>';
			html_content += '<p class="card-text">' + data.latitude + ', ' + data.longitude + '</p>';
			html_content += '<p class="card-text">' + data.time + '</p>';
			html_content += '<a href="#" data-id-bus="' + data.id + '" class="btn btn-primary getPolyline">Get Polyline</a>';
			$('#card-title').html(html_title);
			$('#card-image').html(html_image);
			$('#card-content').html(html_content);
			if (theMarker != undefined) {
				mymap.removeLayer(theMarker);
			};
			theMarker = L.marker([data.latitude, data.longitude]).addTo(mymap);
			arrayLatLng = [
				[data.latitude, data.longitude]
			];
			$('.getPolyline').on('click', function () {
				const id = $(this).data("id-bus");
				$.ajax({
					url: base + "home/getPolyline",
					data: {
						id: id,
					},
					method: "post",
					dataType: "json",
					success: function (data) {
						$.each(data, function (i, data) {
							nowLatLng = [data.latitude, data.longitude];
							arrayLatLng.push(nowLatLng);
							console.log(arrayLatLng);
						});
						thePolyline = L.polyline(arrayLatLng, {
							color: 'red'
						}).addTo(mymap);
					},
				});
			});
		},
	});
});
