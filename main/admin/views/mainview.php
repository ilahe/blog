<?php 

if (isset($_GET['form'])) {
	$form = clear_input($_GET['form'],$conn);
} else{
	$form = "";
}
	
	
	switch ($form) {
		case 'newsform':
			require("newsform.php");
			break;

		case 'catform':
			require("catform.php");
			break;

		case 'userform':
			require("userform.php");
			break;

		case '':
			echo "Bu səhifəyə daxil ola bilməzsiniz!";
		break;

		default:
			echo "Belə səhifə mövcud deyil!";
		break;
	}

?>