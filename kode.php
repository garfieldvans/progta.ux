<?php

include 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT max(id_pelanggan) as kodeTerbesar FROM tbl_pelanggan");
$data = mysqli_fetch_array($query);
$kodeplg = $data['kodeTerbesar'];

$urutan = (int) substr($kodeplg, 3, 3);

$urutan++;

$huruf = "PLG";
$kodeplg = $huruf . sprintf("%03s", $urutan);
echo $kodeplg;

?>