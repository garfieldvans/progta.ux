		<?php
			switch ($_GET['op']){
					case 'tambah':			include "tambah.php";		break;
					case 'kurang':			include "deletepro.php";		break;
				case 'hapus':		include "hapus.php";		break;
				case 'checkout':	include "checkout.php";		break;
				case 'edit':		include "form.php";		break;
				case 'delete':		include "delete.php";	break;
				default :			include "view.php";		break;
			}
		?>
 