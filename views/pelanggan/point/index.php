		<?php
			switch ($_GET['op']){
				case 'belanja':		include "belanja.php";		break;
				case 'detail':		include "detail.php";		break;
				case 'beli':		include "beli.php";		break;
				case 'delete':		include "delete.php";	break;
				case 'detail':		include "detail.php";	break;
				default :			include "view.php";		break;
			}
		?>
 