<?php
session_start();

require_once "../config/connect.php";
require_once "../config/modules.php";

delete("tb_user", ['id_user' => $_GET['id']], $conn);

echo "<script>alert('Berhasil Delete Data');window.location.href='../index.php?page=pengguna'</script>";
