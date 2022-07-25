		<?php
			switch ($_GET['op']){
				case 'nota':			include "nota.php";		break;
				case 'pembayaran':		include "pembayaran.php";		break;
				default :			include "view.php";		break;
			}
		?>
 