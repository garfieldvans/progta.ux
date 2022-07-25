<?php
	session_start();
	$cek_user = $_SESSION["ses_username"];
	$cek_pass = $_SESSION["ses_password"];
	$cek_lev = $_SESSION["ses_level"];		
	if($cek_user==""){
		header("location:../../?page=login");
	}
?>