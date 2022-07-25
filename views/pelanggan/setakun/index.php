		<?php
			switch ($_GET['op']){
				case 'save':		include "save.php";		break;
				case 'data':		include "form.php";		break;
				default :			include "view.php";		break;
			}
		?>
 