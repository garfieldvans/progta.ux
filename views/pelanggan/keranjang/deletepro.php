<?php 
session_start();
$id_produk=$_GET['id'];
if($_SESSION['keranjang'][$id_produk]<2){

	echo "<script>location='?page=keranjang&op=hapus&id=$id_produk';</script>";
}
else{
$_SESSION['keranjang'][$id_produk]-=1;}

echo "<script>location='?page=keranjang';</script>";
?>