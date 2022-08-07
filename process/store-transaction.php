<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../config/connect.php";
require_once "../config/modules.php";

$data = $_POST;
$idBarang = $data['id_barang'];

$getStok = readDataPerRow($conn, "SELECT stok FROM tb_barang where id_barang = '$idBarang'");

$data['tanggal'] = date('Y-m-d');
$tipeTransaksi = $_POST['tipe_transaksi'];
if ($tipeTransaksi == 0) {
    $data['sisa'] = $getStok['stok'] + $data['pembelian'];
    update(['stok' => $getStok['stok'] + $data['pembelian']], ['id_barang' => $data['id_barang']], "tb_barang", $conn);
} else {
    if ($getStok['stok'] < $data['pembelian']) {
        echo "<script>alert('Stok Kurang Dari Jumlah Pengeluaran');window.location.href='../index.php?page=barang-masuk&tipe_transaksi=$tipeTransaksi'</script>";
    }
    $data['sisa'] = $getStok['stok'] - $data['pembelian'];
    $data['pemakaian'] = $data['pembelian'];
    update(['stok' => $getStok['stok'] - $data['pembelian']], ['id_barang' => $data['id_barang']], "tb_barang", $conn);
}
create($data, $conn, "tb_transaksi");


echo "<script>alert('Berhasil Menambahkan Data');window.location.href='../index.php?page=barang-masuk&tipe_transaksi=$tipeTransaksi'</script>";
