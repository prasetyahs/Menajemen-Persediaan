<?php

require_once "../config/connect.php";
require_once "../config/modules.php";

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

$data = readDataAllRow($conn, "SELECT tanggal FROM tb_transaksi where tipe_transaksi = 0 and id_barang='BRG01'");
$dataPemakaian = readDataAllRow($conn, "SELECT tanggal,pemakaian FROM tb_transaksi where id_barang='BRG01'");

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
var_dump($ft);


