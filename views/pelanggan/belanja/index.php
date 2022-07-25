		<?php
			switch ($_GET['op']){
				case 'beli':			include "beli.php";		break;
			
				case 'list':			include "list.php";		break;
				case 'detail':		include "detail.php";		break;
				case 'edit':		include "form.php";		break;
				case 'delete':		include "delete.php";	break;
				default :			include "view.php";		break;
			}
		?>
 