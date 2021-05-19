var config = {
  type: 'gauge',
  data: {
  //   labels: ['Success', 'Warning', 'Warning', 'Error'],
    datasets: [{
      data: [140, 180],
      value: 80,
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
        value: 80,
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

  window.onload = function() {
    var ctx = document.getElementById('speedchart').getContext('2d');
    var rpm = new Chart(ctx, config);
    var ctx2 = document.getElementById('rpmchart').getContext('2d');
    var ppm = new Chart(ctx2, config2);
  };