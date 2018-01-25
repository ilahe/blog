<!-- Post -->
					<?php 
					if(isset($_GET["cat"]) && $_GET["cat"] != ""){
					$cat = $_GET["cat"];

					$sql = "SELECT * FROM news WHERE category = '$cat'";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
					    // output data of each row
					    while($news = mysqli_fetch_assoc($result)) { 
					    	
					    	
					    	 ?>

	    	<article class="post">
						<header>
							<div class="title">
								<h2><a href="#"><?php echo $news["title"]; ?></a></h2>
							</div>
							<div class="meta">
								<time class="published" datetime="2017-01-14"><?php echo $news["date_created"]; ?></time>
								<a href="#" class="author"><span class="name"><?php echo $author["name"]; ?></span><img src="<?php echo $author["avatar"]; ?>" alt="<?php echo $author["name"]; ?>" /></a>
							</div>
						</header>
						<div class="image featured"><img src="<?php echo $news["news_img"]; ?>" alt="<?php echo $news["title"]; ?>" /></div>

							<p><?php echo $news["content"]; ?></p>

							<footer>

								<div class="social actions">
									<ul class="icons">
										<li><a href="#" target="_blank"><i class="fa fa-facebook"></i> </a></li>
										<li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#" target="_blank"><i class="fa fa-instagram"></i> </a></li>
										<li><a href="#" target="_blank"><i class="fa fa-pinterest"></i> </a></li>
										<li><a href="#" target="_blank"><i class="fa fa-google-plus"></i> </a></li>
										<li><a href="#" target="_blank"><i class="fa fa-tporblr"></i> </a></li>


									</ul>
								</div>
							</footer>
				</article>

	    <?php }
	}

	}//isset
?>