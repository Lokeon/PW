<?php for ($i = 0; $i < count($respuestas[0]); $i++): ?>
<script>
    var ctx = document.getElementById("<?php printf("pregunta%d", $i + 1); ?>");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["NS", "1", "2", "3", "4", "5"],
            datasets: [{
                label: '# de eleciones',
                data: <?php print(json_encode(getRespuestaPreguntaX($respuestas, $i))); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            annotation: {
                annotations: [{
                type: 'line',
                mode: 'horizontal',
                scaleID: 'y-axis-0',
                value: 2,
                borderColor: 'rgb(75, 192, 192)',
                borderWidth: 2,
                label: {
                    enabled: true,
                    content: 'Media'
                }
            }]
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
<?php endfor; ?>