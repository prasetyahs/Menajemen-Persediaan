<?php
require_once "config/modules.php";
$data = readDataAllRow($conn, "SELECT id_barang,stok FROM tb_barang");
$dataVal = [];
$labels = [];
foreach ($data as $d) {
    array_push($labels, $d['id_barang']);
    array_push($dataVal, $d['stok']);
}
?>

<div class="alert alert-primary" role="alert">
    <span class="text-bold">Selamat Data admin utama di Aplikasi Persediaan Barang CV Telaga Berkat.</span>
</div>
<div class="col-12 mt-4">
    <h2>Grafik Data Barang</h2>
    <canvas id="grafikBarang" height="182"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = <?= json_encode($labels) ?>;
    color = [];
    labels.forEach(element => {
        color.push('rgba(50, 72, 168, 0.9)');
    });
    const data = {
        labels: labels,
        datasets: [{
            label: 'Data Barang',
            data: <?= json_encode($dataVal) ?>,
            backgroundColor: color,
            borderColor: color,
            borderWidth: 1
        }]
    };
    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
    const myChart = new Chart(
        document.getElementById('grafikBarang'),
        config
    );
</script>