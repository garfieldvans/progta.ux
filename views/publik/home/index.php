
	<?php

		switch (@$_GET['op']){
			case 'detail':		include "detail.php";	break;
			case 'list':		include "list.php";	break;
			case 'list_a':		include "list_a.php";	break;
			default :			include "view.php";		break;
		}
	?>
