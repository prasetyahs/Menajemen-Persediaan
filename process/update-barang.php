<?php


require_once "../config/connect.php";
require_once "../config/modules.php";

$update = update($_POST, ["id_barang" => $_POST['id_barang']], "tb_barang", $conn);
echo "<script>alert('Berhasil Edit Data');window.location.href='../index.php?page=barang'</script>";
