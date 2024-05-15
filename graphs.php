<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Graphs</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Import jQuery for AJAX -->
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div id="header"  class="head" >
            <h1> Graphs </h1>
    </div>
    <div class="chart-container">
        <canvas id="myChart1"></canvas>
    </div>
    <div class="chart-container">
        <canvas id="myChart2"></canvas>
    </div>
    <div class="chart-container">
        <canvas id="myChart3"></canvas>
    </div>
    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        $(document).ready(function(){
		//Function for get the values from data base
            function cargarDatos() {
                $.ajax({
                    url: 'temp.php', // Calls the other php who is reciving all database values
                    type: 'GET',
                    success: function(response) {
                        var data = JSON.parse(response);
                        actualizarGrafica(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            // Function for update de values and add new ones
            function actualizarGrafica(data) {
                myChart.data.labels = data.horas4;
                myChart.data.datasets[0].data = data.temperatura;
                myChart.update();
            }
            // Create graph in 2d
            var ctx = document.getElementById('myChart1').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Temperature',
                        data: [],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: false
                        }
                    }
                }
            });

            // Charge the data base values every 20 sec
            setInterval(cargarDatos, 20000);
        });
    </script>
    

    <script>
        $(document).ready(function(){
            function cargarDatos() {
                $.ajax({
                    url: 'hum.php',
                    type: 'GET',
                    success: function(response) {
                        var data = JSON.parse(response);
                        actualizarGrafica(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function actualizarGrafica(data) {
                myChart.data.labels = data.horas2;
                myChart.data.datasets[0].data = data.hum;
                myChart.update();
            }

            var ctx = document.getElementById('myChart2').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
		    labels: [],
                    datasets: [{
                        label: 'Humidity',
                        data: [],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: false
                        }
                    }
                }
            });

            setInterval(cargarDatos, 20000);
        });
    </script>
    

    <script>
        $(document).ready(function(){

            function cargarDatos() {
                $.ajax({
                    url: 'smoke.php',
                    type: 'GET',
                    success: function(response) {
                        var data = JSON.parse(response);
                        actualizarGrafica(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function actualizarGrafica(data) {
                myChart.data.labels = data.horas3;
                myChart.data.datasets[0].data = data.humo;
                myChart.update();
            }

            var ctx = document.getElementById('myChart3').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Smoke',
                        data: [],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: false
                        }
                    }
                }
            });

	    setInterval(cargarDatos, 20000);
        });
    </script>
    

    <script>
        $(document).ready(function(){
            function cargarDatos() {
                $.ajax({
                    url: 'lamp.php',
                    type: 'GET',
                    success: function(response) {
                        var data = JSON.parse(response);
                        actualizarGrafica(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function actualizarGrafica(data) {
                var horas = [];
                var estados = [];

                for (var i = 0; i < data.length; i++) {
                    horas.push(data[i].time);
                    estados.push(data[i].state == 'on' ? 1 : 0);
                }

                myChart.data.labels = horas;
                myChart.data.datasets[0].data = estados;
                myChart.update();
            }

	    var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Lamp State',
                        data: [],
			borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            min: 0,
                            max: 1,
                            ticks: {
                                stepSize: 1,
                                callback: function(value, index, values) {
                                    return value == 1 ? 'on' : 'off';
                                }
                            }
                        }
                    }
                }
            });
            setInterval(cargarDatos, 20000);
        });
    </script>
</body>
</html>
