<?php
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$perPage = 8;

//Limitation
$start = ($page > 1) ? ($page * $perPage) - $perPage :0;

		//Total
    	$sqll = "SELECT COUNT(*) as TOTAL FROM news";
	    $resultt = mysqli_query($conn, $sqll);
	    $xeberr = mysqli_fetch_assoc($resultt);
	    $total = $xeberr['TOTAL'];
	    $pages = ceil($total/$perPage);

$sql = "SELECT * FROM news ORDER BY id DESC LIMIT {$start}, {$perPage}";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

		

   while($news = mysqli_fetch_assoc($result)) { 

            $sql_2 = "SELECT * FROM users 
                            RIGHT JOIN news ON users.id = news.author_id";
                            $result_2 = mysqli_query($conn, $sql_2);

                            if (mysqli_num_rows($result) > 0) {

                            while($author = mysqli_fetch_assoc($result_2)) {
                                    $author_name = $author['name'] . " " . $author['surname'];
                                    $author_avatar = $author['avatar'];
                             }
                        }

            

            ?>

                    <article class="post">
                        <header>
                            <div class="title">
                                <h2><a href="<?php echo "post.php?id=". $news["id"]; ?>"><?php echo $news["title"]; ?></a></h2>
                            </div>
                            <div class="meta">
                                <time class="published" datetime="2017-01-14"><?php echo $news["date_created"]; ?></time>
                                <a href="#" class="author"><span class="name"><?php echo $author_name; ?></span><img src="<?php echo $author_avatar; ?>" alt="<?php echo $author_name; ?>" /></a>
                            </div>
                        </header>
                        <a href="<?php echo "post.php?id=". $news["id"]; ?>" class="image featured"><img src="<?php echo $news["news_img"]; ?>" alt="<?php echo $news["title"]; ?>" /></a>
                        <p><?php echo $news["content"]; ?></p>
                        <footer>
                            <ul class="actions">
                                <li><a href="<?php echo "post.php?id=". $news["id"]; ?>" class="button big">Oxumağa Davam Et</a></li>
                            </ul>
                        </footer>
                    </article>

<?php }
?>


<ul class="actions pagination">
 <li><a href='<?php echo $_SERVER["PHP_SELF"];?>?page=<?php echo 1; ?>'> << </a></li>



<?php
    for($x = $page; $x <= min($page + 3, $pages); $x++):   ?>
    	

    	
		  <li class="<?php if($page == $x){echo "active";} ?>"><a href='/bt/xeber.php?cat=<?php echo $finalcat; ?>&page=<?php echo $x; ?>'><?php echo $x; ?></a></li>
		

    <?php endfor;

    ?>
</ul>