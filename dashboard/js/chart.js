// line chart js starts
var xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
var yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

new Chart("myChart1", {
    type: "line",
    data: {
        labels: xValues,
        datasets: [{
            fill: false,
            lineTension: 0,
            backgroundColor: "rgba(0,0,255,1.0)",
            borderColor: "rgba(0,0,255,0.1)",
            data: yValues
        }]
    },
    options: {
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    min: 6,
                    max: 16
                }
            }],
        }
    }
});
// line chart js ends

// multi-line chart js starts
var xValues = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000];

new Chart("myChart2", {
    type: "line",
    data: {
        labels: xValues,
        datasets: [{
            data: [860, 1140, 1060, 1060, 1070, 1110, 1330, 2210, 7830, 2478],
            borderColor: "red",
            fill: false
        }, {
            data: [1600, 1700, 1700, 1900, 2000, 2700, 4000, 5000, 6000, 7000],
            borderColor: "green",
            fill: false
        }, {
            data: [300, 700, 2000, 5000, 6000, 4000, 2000, 1000, 200, 100],
            borderColor: "blue",
            fill: false
        }]
    },
    options: {
        legend: { display: false }
    }
});
// multi-line chart js ends

// pie chart js starts
new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
        labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
        datasets: [{
            label: "Population (millions)",
            backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
            data: [2478, 5267, 734, 784, 433]
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Predicted world population (millions) in 2050'
        }
    }
});
// pie chart js ends

// radar chart js starts
new Chart(document.getElementById("radar-chart"), {
    type: 'radar',
    data: {
        labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
        datasets: [{
            label: "1950",
            fill: true,
            backgroundColor: "rgba(179,181,198,0.2)",
            borderColor: "rgba(179,181,198,1)",
            pointBorderColor: "#fff",
            pointBackgroundColor: "rgba(179,181,198,1)",
            data: [8.77, 55.61, 21.69, 6.62, 6.82]
        }, {
            label: "2050",
            fill: true,
            backgroundColor: "rgba(255,99,132,0.2)",
            borderColor: "rgba(255,99,132,1)",
            pointBorderColor: "#fff",
            pointBackgroundColor: "rgba(255,99,132,1)",
            pointBorderColor: "#fff",
            data: [25.48, 54.16, 7.61, 8.06, 4.45]
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Distribution in % of world population'
        }
    }
});
// radar chart js ends

// bar chart js starts
new Chart(document.getElementById("bar-chart-grouped"), {
    type: 'bar',
    data: {
        labels: ["1900", "1950", "1999", "2050"],
        datasets: [{
            label: "Africa",
            backgroundColor: "#3e95cd",
            data: [133, 221, 783, 2478],
            borderWidth: 2
        }, {
            label: "Europe",
            backgroundColor: "#8e5ea2",
            data: [408, 547, 675, 734],
            borderWidth: 2
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Population growth (millions)'
        }
    }
});
// bar chart js ends

// speedchart js starts
var speedCanvas = document.getElementById("speedChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var speedData = {
    labels: ["0s", "10s", "20s", "30s", "40s", "50s", "60s"],
    datasets: [{
        label: "Car Speed (mph)",
        data: [0, 59, 75, 20, 20, 55, 40],
    }]
};

var chartOptions = {
    legend: {
        display: true,
        position: 'top',
        labels: {
            boxWidth: 80,
            fontColor: 'black'
        }
    }
};

var lineChart = new Chart(speedCanvas, {
    type: 'line',
    data: speedData,
    options: chartOptions
});
// speedchart js ends

new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
        // labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
        datasets: [{
            label: "Population (millions)",
            backgroundColor: ["#00b5e9", "#fa4251"],
            data: [5267, 2478]
        }]
    },

});