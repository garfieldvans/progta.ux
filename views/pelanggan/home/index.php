		<?php
			switch ($_GET['op']){
				case 'add':			include "form.php";		break;
				case 'save':		include "save.php";		break;
				case 'edit':		include "form.php";		break;
				case 'delete':		include "delete.php";	break;
				case 'detail':		include "detail.php";	break;
				default :			include "view.php";		break;
			}
		?>
 