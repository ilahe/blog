<?php require("../db.php"); ?>
<?php require("../functions.php"); ?>
<?php session_start(); ?>

<?php 
	
	if (isset($_GET['newsid'])) {
		
		$newsid = clear_input($_GET['newsid'], $conn);
		$successMsg = 'Uğurlu! Xəbər Silindi.';
		$errorMsg = 'Səhv! Xəbər Silinmədi.';
		$location = 'xeberler';

		delete("news", $newsid, $conn, $successMsg, $errorMsg, $location);


	} else {
		echo "You cannot access to this page";
	}

?>