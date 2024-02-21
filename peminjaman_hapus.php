<?php
require_once "koneksi.php";

$id = $_GET["id"];
$query = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE id_peminjaman = '$id'");
echo "<script>location.href = '?page=kategori'</script>";
