<?php
	session_start();
	session_destroy();
	echo "<center class='teks'>Mohon Tunggu....</center>";
	print"<html><head><meta http-equiv='refresh' content='0.1;URL=../../index.php'></meta></head></html>";
?>