<?php require("../db.php"); ?>
<?php require("../functions.php"); ?>
<?php session_start(); ?>

<?php 
	
	if (isset($_POST['newssubmit'])) {
		$target_dir = "../../img/blog/";
		upload_img($target_dir);
		$table = 'news';
		$col1 = 'title';
		$col2 = 'news_img';
		$col3 = 'content';
		$col4 = 'category';
		$col5 = 'author_id';
		$val1 = clear_input($_POST['title'], $conn);
		$val2 = $target_file;
		$val3 = $_POST['content'];
		$val4 = clear_input($_POST['category'], $conn);
		$val5 = clear_input($_SESSION["user_id"], $conn);
		$successMsg = 'Xəbər əlavə edildi';
		$errorMsg = 'Xəbər əlavə edilmədi';
		$location = 'xeberler';
		add($table, $col1, $col2, $col3, $col4, $col5, $val1, $val2, $val3, $val4, $val5, $conn, $successMsg, $errorMsg, $location);
	} else {
		echo "You cannot access to this page";
	}

?>

