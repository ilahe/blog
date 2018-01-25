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
		$id = clear_input($_POST['newsid'], $conn);

				$sql = "SELECT * FROM news WHERE id = $id";

		        $result = mysqli_query($conn, $sql);

		        if (mysqli_num_rows($result) > 0) {

		            while($news = mysqli_fetch_assoc($result)) {

		            	$title = $news["title"];
		            	$news_img = $news["news_img"];
		            	$content = $news["content"];
		            	$category = $news["category"];
		            	$id = $news["id"];

		             }
		        }

		        isset($_POST['title']) ? $val1 = clear_input($_POST['title'], $conn) : $val1 = $title;

		        isset($_POST['fileToUpload']) ? $val2 = $target_file : $val2 = $news_img;

		        isset($_POST['content']) ? $val3 = $_POST['content'] : $val3 = $content;

		        isset($_POST['category']) ? $val4 = clear_input($_POST['category'], $conn) : $val4 = $category;

				$val5 = clear_input($_SESSION["user_id"], $conn);

		$successMsg = 'Xəbər əlavə edildi';
		$errorMsg = 'Xəbər əlavə edilmədi';
		$location = 'xeberler';
		
		update($table, $col1, $col2, $col3, $col4, $col5, $val1, $val2, $val3, $val4, $val5, $conn, $successMsg, $errorMsg, $location, $id);
	} else {
		echo "You cannot access to this page";
	}

?>

