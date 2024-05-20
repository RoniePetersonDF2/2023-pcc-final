<hr>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Informações gerais</h5>
                <canvas id="dashboardChart"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const sessoesQuantidade = <?= $sessoes_quantidade ?>;
const funcionariosQuantidade = <?= $funcionarios_quantidade ?>;
const produtosQuantidade = <?= $produtos_quantidade ?>;
const categoriasQuantidade = <?= $categorias_quantidade ?>;


const dashboardChart = document.getElementById('dashboardChart');
new Chart(dashboardChart, {
    type: 'bar',
    data: {
        labels: ['Sessões', 'Funcionários', 'Produtos', 'Categorias'],
        datasets: [{
            label: 'Quantidade',
            data: [sessoesQuantidade, funcionariosQuantidade, produtosQuantidade, categoriasQuantidade],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});
</script>