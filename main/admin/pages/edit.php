
<?php 
	
	if (isset($_GET['newsid']) && isset($_GET['page'])) {

				$newsid = clear_input($_GET['newsid'], $conn);

				$sql = "SELECT * FROM news WHERE id = $newsid";

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

        		require("views/editnewsform.php");
	} else {
		echo "You cannot access to this page";
	}

?>