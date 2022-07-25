		<?php
			switch ($_GET['op']){
				case 'save':		include "save.php";		break;
				default :			include "form.php";		break;
			}
		?>
 