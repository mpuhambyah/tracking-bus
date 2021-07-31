var config = {
	type: 'gauge',
	data: {
		//   labels: ['Success', 'Warning', 'Warning', 'Error'],
		datasets: [{
			data: [140, 180],
			value: 10,
			backgroundColor: ['#DDE1EC', '#798EFF'],
			borderWidth: 2
		}]
	},
	options: {
		responsive: true,
		title: {
			display: false,
		},
		layout: {
			padding: {
				bottom: 10
			}
		},
		needle: {
			// Needle circle radius as the percentage of the chart area width
			radiusPercentage: 1,
			// Needle width as the percentage of the chart area width
			widthPercentage: 2,
			// Needle length as the percentage of the interval between inner radius (0%) and outer radius (100%) of the arc
			lengthPercentage: 60,
			// The color of the needle
			color: 'rgba(0, 0, 0, 1)'
		},
		valueLabel: {
			formatter: Math.round
		}
	}
};

var config2 = {
	type: 'gauge',
	data: {
		//   labels: ['Success', 'Warning', 'Warning', 'Error'],
		datasets: [{
			data: [140, 180],
			value: 20,
			backgroundColor: ['#DDE1EC', '#798EFF'],
			borderWidth: 2
		}]
	},
	options: {
		responsive: true,
		title: {
			display: false,
		},
		layout: {
			padding: {
				bottom: 10
			}
		},
		needle: {
			// Needle circle radius as the percentage of the chart area width
			radiusPercentage: 1,
			// Needle width as the percentage of the chart area width
			widthPercentage: 2,
			// Needle length as the percentage of the interval between inner radius (0%) and outer radius (100%) of the arc
			lengthPercentage: 60,
			// The color of the needle
			color: 'rgba(0, 0, 0, 1)'
		},
		valueLabel: {
			formatter: Math.round
		}
	}
};


var ctx = document.getElementById('speedchart').getContext('2d');
var rpm = new Chart(ctx, config);
var ctx2 = document.getElementById('rpmchart').getContext('2d');
var ppm = new Chart(ctx2, config2);



setInterval(function () {
	let data;
	$.ajax({
		url: base + 'getjson/getdatauserbus',
		dataType: 'json',
		method: "post",
		async: false,
		success: function (response) {
			data = response;
			console.log(data);
			$("#engineLoad").html(data.speed);
			$("#throttlePosition").html(data.speed);
			$("#distance").html(data.speed);
			$("#heading").html(data.heading);
			$("#gpsPosition").html(`${data.latitude}, ${data.longitude}`);
			$("#gpsSpeed").html(data.speed);
			$("#gpsAlt").html(data.speed);
			$("#gpsSat").html(data.battery);
			$("#batteryState").html(`${data.battery}%`);
			$("#voltage").html(`${data.battery}%`);
			$("#soc").html(`${data.battery}%`);
			if (data.battery >= 0 && data.battery <= 10) {
				$("#battery").addClass("fa-battery-empty");
				$("#battery").removeClass("fa-battery-quarter");
				$("#battery").removeClass("fa-battery-half");
				$("#battery").removeClass("fa-battery-three-quarters");
				$("#battery").removeClass("fa-battery-full");
			} else if (data.battery > 10 && data.battery <= 40) {
				$("#battery").removeClass("fa-battery-empty");
				$("#battery").addClass("fa-battery-quarter");
				$("#battery").removeClass("fa-battery-half");
				$("#battery").removeClass("fa-battery-three-quarters");
				$("#battery").removeClass("fa-battery-full");
			} else if (data.battery > 40 && data.battery <= 60) {
				$("#battery").removeClass("fa-battery-empty");
				$("#battery").removeClass("fa-battery-quarter");
				$("#battery").addClass("fa-battery-half");
				$("#battery").removeClass("fa-battery-three-quarters");
				$("#battery").removeClass("fa-battery-full");
			} else if (data.battery > 60 && data.battery <= 90) {
				$("#battery").removeClass("fa-battery-empty");
				$("#battery").removeClass("fa-battery-quarter");
				$("#battery").removeClass("fa-battery-half");
				$("#battery").addClass("fa-battery-three-quarters");
				$("#battery").removeClass("fa-battery-full");
			} else if (data.battery > 90 && data.battery <= 100) {
				$("#battery").removeClass("fa-battery-empty");
				$("#battery").removeClass("fa-battery-quarter");
				$("#battery").removeClass("fa-battery-half");
				$("#battery").removeClass("fa-battery-three-quarters");
				$("#battery").addClass("fa-battery-full");
			}
		}
	});
	rpm.config.data.datasets[0].value = data.speed
	rpm.update();
	ppm.config.data.datasets[0].value = data.speed
	ppm.update();
}, 1000);
