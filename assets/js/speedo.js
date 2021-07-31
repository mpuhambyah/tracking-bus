$("#circularGaugeContainer").dxCircularGauge({
	rangeContainer: {
		offset: 20,
		ranges: [{
				startValue: 800,
				endValue: 1000,
				color: '#41A128'
			},
			{
				startValue: 1000,
				endValue: 1500,
				color: '#2DD700'
			}
		]
	},
	scale: {
		startValue: 0,
		endValue: 1500,
		majorTick: {
			tickInterval: 250
		},
		label: {
			format: 'currency'
		}
	},
	title: {
		text: 'Sales MTD',
		subtitle: 'test',
		position: 'top-center'
	},
	tooltip: {
		enabled: true,
		format: 'currency',
		customizeText: function (arg) {
			return 'Current ' + arg.valueText;
		}
	},
	subvalueIndicator: {
		type: 'textCloud',
		format: 'thousands',
		text: {
			format: 'currency',
			customizeText: function (arg) {
				return 'Goal ' + arg.valueText;
			}
		}
	},
	value: 900,
	subvalues: [825]
});
