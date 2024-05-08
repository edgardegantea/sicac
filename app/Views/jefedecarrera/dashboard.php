<?= $this->extend('template/mainJefeCarrera'); ?>

<?= $this->section('content'); ?>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div style="width: 80%; margin: auto;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        // Obtener los datos pasados desde el controlador
        var claves = <?php echo json_encode($claves); ?>;
        var valores = <?php echo json_encode($valores); ?>;
        
        // Crear del gráfico
        var ctx = document.getElementById('myChart').getContext('2d');

        // Crear la instancia del gráfico
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: claves,
                datasets: [{
                    label: 'Nivel Alcanzado',
                    data: valores,
                    backgroundColor: 'rgba(1, 111, 9, 0.75)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 1 // Establecer el máximo en 1 para mostrar porcentajes
                    },
                    xAxes: [{
                        stacked: true, // Apilar barras horizontalmente
                        ticks: {
                            reverse: true 
                        }
                    }]
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return (context.raw * 100).toFixed(2) + '%';
                            }
                        }
                    }
                }
            }
        });
    </script>
<?= $this->endSection(); ?>