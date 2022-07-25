		<?php
			switch ($_GET['op']){
				case 'pembayaran':	include "pembayaran.php";		break;
				case 'nota':		include "nota.php";		break;
				case 'hapus':		include "hapus.php";		break;
				default :			include "view.php";		break;
			}
		?>
 