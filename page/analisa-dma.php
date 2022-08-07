<?php


require_once "config/modules.php";

function my_array_unique($array, $keep_key_assoc = false)
{
    $duplicate_keys = array();
    $tmp = array();

    foreach ($array as $key => $val) {
        if (is_object($val))
            $val = (array)$val;

        if (!in_array($val, $tmp))
            $tmp[] = $val;
        else
            $duplicate_keys[] = $key;
    }

    foreach ($duplicate_keys as $key)
        unset($array[$key]);

    return $keep_key_assoc ? $array : array_values($array);
}

$query = "SELECT * FROM `tb_barang`";

$ex = mysqli_query($conn, $query);

$fetch = mysqli_fetch_all($ex, MYSQLI_ASSOC);

$idbarang = isset($_GET['id_barang']) ? $_GET['id_barang'] : $fetch[0]['id_barang'];
$data = readDataAllRow($conn, "SELECT DISTINCT '*',MONTHNAME(tanggal) as `Month` , ' ', YEAR(tanggal) AS `Year` FROM tb_transaksi where tipe_transaksi = 1 and id_barang='$idbarang' order by tanggal ASC");



$dataPemakaian = readDataAllRow($conn, "SELECT tanggal,pemakaian FROM  tb_transaksi where tipe_transaksi = 1 and id_barang='$idbarang' order by tanggal ASC");

$dataTrans  = array();

foreach ($dataPemakaian as $a) {
    $month = explode('-',  $a['tanggal'])[0] . "-" . explode('-',  $a['tanggal'])[1];
    if (!isset($dataTrans[$month])) {
        $dataTrans[$month] = array();
    }
    $dataTrans[$month][] = $a['pemakaian'];
}
$in = 0;
$array_permonth = [];
foreach ($dataTrans as $k => $v) {
    $array_permonth[$in] = array_sum($v);
    $in++;
}

$permintaan = $array_permonth;

$i = 0;
$number_of_slice = 3;
foreach ($array_permonth  as $k => $d) {
    $array_permonth[$k] =  array_sum(array_slice($array_permonth, $i, $number_of_slice)) / $number_of_slice;
    $i++;
}



$ma = array_slice($array_permonth, 0, count($array_permonth) - ($number_of_slice - 1));
$tmpMa = array_slice($array_permonth, 0, count($array_permonth) - ($number_of_slice - 1));
$j = 0;
$dma = [];
foreach ($ma  as $k => $d) {
    $ma[$k] =  array_sum(array_slice($ma, $j, $number_of_slice)) / $number_of_slice;
    $j++;
}
$dma = array_slice($ma, 0, count($ma) - ($number_of_slice - 1));
$tmpMa = array_slice($tmpMa, 2, count($tmpMa));


$at = [];
$bt = [];
$ft = [];
for ($a = 0; $a < count($dma); $a++) {
    array_push($at, 2 * $tmpMa[$a] - $dma[$a]);
    array_push($bt, (2 / (3 - 1)) * ($tmpMa[$a] - $dma[$a]));
    array_push($ft, (2 * $tmpMa[$a] - $dma[$a]) * 1 + ((2 / (3 - 1)) * ($tmpMa[$a] - $dma[$a])) * 1);
}


?>

<div class="col-lg-12">
    <div class="card shadow-sm mb-4">
        <div class="card-header">
            <div class="w-100 row d-flex justify-content-between">
                <div class="col-lg-12">
                    <?php foreach ($fetch as $b) { ?>
                        <a href="index.php?page=dma&id_barang=<?= $b['id_barang'] ?>"><?= $b['id_barang'] . "     |" ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h2>Analisa <?= $idbarang . " "  ?></h2>
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-md">
                            <thead>
                                <th>Time Periode</th>
                                <th>Permintaan</th>
                                <th>SMA</th>
                                <th>DMA</th>
                                <th>AT</th>
                                <th>BT</th>
                                <th>Ft</th>
                                <th>RMSE</th>
                            </thead>
                            <tbody>
                                <?php
                                $j = count($data) - 1;
                                $atChart = [];
                                $maChart = [];
                                $dmaChart = [];
                                for ($i = 0; $i < count($data); $i++) { ?>
                                    <?php $rmse =  round(pow(((isset($ft[$j]) ? $ft[$j] : 0) - (isset($at[$j]) ? $at[$j] : 0)), 2), 2)  ?>
                                    <tr>
                                        <td><?= $data[$i]['Month'] . " " . $data[$i]["Year"] ?></td>
                                        <td><?= $permintaan[$i] ?></td>
                                        <td><?= isset($ma[$j]) ? round($ma[$j], 2) : 0  ?></td>
                                        <td><?= isset($dma[$j]) ? round($dma[$j], 2) : 0  ?></td>
                                        <td><?= isset($at[$j]) ? round($at[$j], 2) : 0  ?></td>
                                        <td><?= isset($bt[$j]) ? round($bt[$j], 2) : 0  ?></td>
                                        <td><?= isset($ft[$j]) ? round($ft[$j]) : 0  ?></td>
                                        <td><?= $rmse ?></td>
                                    </tr>
                                <?php
                                    array_push($atChart, isset($at[$j]) ? round($at[$j], 2) : 0);
                                    array_push($maChart, isset($ma[$j]) ? round($ma[$j], 2) : 0);
                                    array_push($dmaChart, isset($dma[$j]) ? round($dma[$j], 2) : 0);
                                    $rmseTotal = +$rmse;
                                    $j--;
                                } ?>
                                <tr>
                                    <td colspan="7">Jumlah : </td>
                                    <td><span style="font-weight:bold"><?= isset($rmseTotal) ? $rmseTotal : 0  ?></span> </td>
                                </tr>
                                <tr>
                                    <td colspan="7">RMSE : </td>
                                    <td><span style="font-weight:bold"><?= isset($rmseTotal) ? round(sqrt($rmseTotal / count($data)), 2) : 0 ?></span> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <h2>Grafik Aktual-SMA-DMA</h2>
                    <canvas id="myChart" height="182"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labelsJson = <?= json_encode($data) ?>;
    labels = [];
    labelsJson.forEach(element => {
        labels.push(element.Month)
    });


    const data = {
        labels: labels,
        datasets: [{
            label: 'Aktual',
            data: <?= json_encode($atChart) ?>,
            fill: false,
            backgroundColor: "rgb(75, 192, 192)",
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }, {
            label: 'DMA',
            data: <?= json_encode($dmaChart) ?>,
            fill: false,
            backgroundColor: "#4676e8",
            borderColor: '#4676e8',
            tension: 0.1
        }, {
            label: 'SMA',
            data: <?= json_encode($maChart) ?>,
            fill: false,
            backgroundColor: "#e85e46",
            borderColor: '#e85e46',
            tension: 0.1
        }]
    };
    const config = {
        type: 'line',
        data: data,
    };
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>