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



?>

<div class="col-lg-12">
    <div class="card shadow-sm mb-4">
        <div class="card-header">
            <div class="w-100 row d-flex justify-content-between">
                <div class="col-lg-12">
                    <?php foreach ($fetch as $b) { ?>
                        <a href="index.php?page=poq&id_barang=<?= $b['id_barang'] . "&pemesanan=" . $_GET['pemesanan'] . "&penyimpanan=" . $_GET['penyimpanan'] . "&bulan=" . $_GET['bulan'] ?>"><?= $b['id_barang'] . "     |" ?></a>
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
                                <th>Pemesanan</th>
                                <th>Penyimpanan</th>
                                <th>EOQ</th>
                                <th>R</th>
                                <th>POQ</th>
                                <th>RMSE</th>
                            </thead>
                            <tbody>
                                <?php
                                $j = 1;
                                $eoqChart = [];
                                $poqChart = [];
                                $rArr = [];
                                for ($i = 0; $i < count($data); $i++) { ?>
                                    <?php
                                    $eoq = ceil(sqrt(2 * $permintaan[$i] * $_GET['pemesanan'] / $_GET['penyimpanan']));
                                    $r = $permintaan[$i] / 4;
                                    $poq = ceil($permintaan[$i] / $r);
                                    $rmse =  round(pow(($poq - $eoq), 2), 2);
                                    ?>

                                    <tr>
                                        <td><?= $data[$i]['Month'] . " " . $data[$i]["Year"] ?></td>
                                        <td><?= $permintaan[$i] ?></td>
                                        <td><?= $_GET['pemesanan'] ?></td>
                                        <td><?= $_GET['penyimpanan'] ?></td>
                                        <td><?= $eoq ?></td>
                                        <td><?= $r ?></td>
                                        <td><?= $poq ?></td>
                                        <td><?= $rmse ?></td>
                                    </tr>
                                <?php
                                    array_push($eoqChart, $eoq);
                                    array_push($poqChart, $poq);
                                    array_push($rArr, $r);
                                    $rmseTotal = +$rmse;
                                    $j++;
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
                    <h2>Grafik EOQ - POQ</h2>
                    <canvas id="myChart" height="182"></canvas>
                </div>
                <div class="col-12 mt-5">
                    <h2>Analisa <?= $idbarang . " " . $_GET['bulan'] . " "  ?> Bulan Kedepan</h2>
                </div>
                <br><br>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-md">
                            <thead>
                                <th>Time Periode</th>
                                <th>EOQ</th>
                                <th>R</th>
                                <th>POQ</th>
                                <th>RMSE</th>
                            </thead>
                            <tbody>
                                <?php
                                $tmpArrPOQ = [];
                                $tmpArrEOQ = [];
                                $labelsFuture = [];
                                $m = 1;
                                for ($i = 0; $i < $_GET['bulan']; $i++) {
                                    if ($i == 0) {
                                        $lastPermintaan = count($permintaan) > 0 ?  $permintaan[count($permintaan) - 1] : 0;
                                        $tmpR = count($rArr) > 0 ?  $rArr[count($rArr) - 1] : 0;
                                    }
                                    $eoqFuture = sqrt(2 * $lastPermintaan * $_GET['pemesanan'] / $_GET['penyimpanan']);
                                    if ($i > 0) {
                                        $lastPermintaan = $eoqFuture;
                                        $tmpR = $tmpR / 4;
                                    }
                                    $poqFuture = $eoqFuture != 0 && $tmpR != 0 ?  $eoqFuture / $tmpR : 0;
                                    $rmseN =  round(pow(($poqFuture - $eoqFuture), 2), 2);
                                    $dateString = count($data) > 0 ?  $data[count($data) - 1]["Year"] . "-" . $data[count($data) - 1]['Month'] : 0;
                                    $date = strtotime($dateString);
                                    $final = explode('-', date("Y-F", strtotime("+" . $m . " month", $date)));
                                ?>
                                    <tr>
                                        <td><?= $final[1] . " " . $final[0] ?></td>
                                        <td><?= round($eoqFuture, 2) ?></td>
                                        <td><?= round($tmpR, 2) ?></td>
                                        <td><?= round($poqFuture, 2) ?></td>
                                        <td><?= round($rmseN, 2) ?></td>
                                    </tr>
                                <?php
                                    $m++;
                                    array_push($labelsFuture, $final[1] . " " . $final[0]);
                                    array_push($tmpArrEOQ,   round($eoqFuture, 2));
                                    array_push($tmpArrPOQ,  round($poqFuture, 2));
                                    $rmseTotalFuture = +$rmseN;
                                } ?>
                                <tr>
                                    <td colspan="4">Jumlah : </td>
                                    <td><span style="font-weight:bold"></span><?= round($rmseTotalFuture, 2) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="4">RMSE : </td>
                                    <td><span style="font-weight:bold"><?= isset($rmseTotalFuture) ? round(sqrt($rmseTotalFuture / $_GET['bulan']), 2) : 0 ?></span> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <h2>Grafik EOQ - POQ</h2>
                    <canvas id="chartPrediksi" height="182"></canvas>
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
            label: 'EOQ',
            data: <?= json_encode($eoqChart) ?>,
            fill: false,
            backgroundColor: "#4676e8",
            borderColor: '#4676e8',
            tension: 0.1
        }, {
            label: 'POQ',
            data: <?= json_encode($poqChart) ?>,
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



    const labelsJsonPred = <?= json_encode($labelsFuture) ?>;
    labelsPred = [];
    labelsJsonPred.forEach(element => {
        labelsPred.push(element.Month)
    });

    const dataPred = {
        labels: labelsJsonPred,
        datasets: [{
            label: 'EOQ',
            data: <?= json_encode($tmpArrEOQ) ?>,
            fill: false,
            backgroundColor: "#4676e8",
            borderColor: '#4676e8',
            tension: 0.1
        }, {
            label: 'POQ',
            data: <?= json_encode($tmpArrPOQ) ?>,
            fill: false,
            backgroundColor: "#e85e46",
            borderColor: '#e85e46',
            tension: 0.1
        }]
    };
    const configPred = {
        type: 'line',
        data: dataPred,
        options: {
            scales: {
                y: {
                    suggestedMin: 50,
                    suggestedMax: 100
                }
            }
        }
    };
    new Chart(
        document.getElementById('chartPrediksi'),
        configPred
    );
</script>