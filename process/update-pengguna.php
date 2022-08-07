<?php


require_once "../config/connect.php";
require_once "../config/modules.php";

// $idPengguna = $_POST['id_user'];
// $dataRow = readDataPerRow($conn,"SELECT * FROM tb_pengguna where id_user = '$idPengguna'");
// echo "SELECT * FROM tb_pengguna where id_user = '$idPengguna'";
// var_dump($dataRow);die;
$update = update($_POST, ["id_user" => $_POST['id_user']], "tb_user", $conn);


echo "<script>alert('Berhasil Edit Data');window.location.href='../index.php?page=pengguna'</script>";
