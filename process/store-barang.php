<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../config/connect.php";
require_once "../config/modules.php";

create($_POST, $conn, "tb_barang");

echo "<script>alert('Berhasil Menambahkan Data');window.location.href='../index.php?page=barang'</script>";