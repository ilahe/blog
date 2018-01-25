<?php require("db.php"); ?>
<?php require("functions.php"); ?>
<?php require("includes/header.php") ?>
<?php require("includes/navigation.php");

ob_start();
?>



		<div class="container">
			<div class="row">
				<div class="col-md-12">
				<?php require("category.php"); ?>




					<!-- Post -->
					<?php 
					if(isset($_GET["id"]) && $_GET["id"] != ""){
					$post_id = $_GET["id"];

					$sql = "SELECT * FROM news WHERE id = $post_id";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
					    // output data of each row
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
								<h2><a href="#"><?php echo $news["title"]; ?></a></h2>
							</div>
							<div class="meta">
								<time class="published" datetime="2017-01-14"><?php echo $news["date_created"]; ?></time>
								<a href="#" class="author"><span class="name"><?php echo $author_name; ?></span><img src="<?php echo $author_avatar; ?>" alt="<?php echo $author_name; ?>" /></a>
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

	
?>


						<!-- Pagination -->
						<ul class="actions pagination">
							<li><a href="#" class="disabled button big previous">Previous Post</a></li>
							<li><a href="#" class="button big next">Next Post</a></li>
						</ul>
						<div class="post-related post-block">
							<h4 class="heading"><span>You Might Also Like</span></h4>
							<div class="related">
								<ul class="row">
									<li class="item col-lg-4 col-md-4 col-sm-4">
										<div class="thporb">
											<a href="#"><img src="../d33wubrfki0l68.cloudfront.net/b80bf8a16f6952a0c64caf5345af0d780ac015a7/24884/images/relate-post01.jpg" alt="post relate"></a>
										</div>
										<h5 class="item-title">
											<a href="#">Seitan High Life reprehenderit consectetur cupidatat kogi</a>
										</h5>
										<time class="published" datetime="2017-10-06">October 7, 2017</time>
									</li>
									<li class="item col-lg-4 col-md-4 col-sm-4">
										<div class="thporb">
											<a href="#"><img src="../d33wubrfki0l68.cloudfront.net/6ffdc87e6e6ae9755ed06acc494ac797359ce963/5c1d1/images/relate-post02.jpg" alt="post relate"></a>
										</div>
										<h5 class="item-title">
											<a href="#">Seitan High Life reprehenderit consectetur cupidatat kogi</a>
										</h5>
										<time class="published" datetime="2017-10-06">October 7, 2017</time>
									</li>
									<li class="item col-lg-4 col-md-4 col-sm-4">
										<div class="thporb">
											<a href="#"><img src="../d33wubrfki0l68.cloudfront.net/63e1192cba590ec85d1c090bffec7a3bf4dbbe74/cda41/images/relate-post03.jpg" alt="post relate"></a>
										</div>
										<h5 class="item-title">
											<a href="#">Seitan High Life reprehenderit consectetur cupidatat kogi</a>
										</h5>
										<time class="published" datetime="2017-10-06">October 7, 2017</time>
									</li>
								</ul>
							</div>
						</div>
						<?php 
							require("includes/comment.php");
							require("includes/addcomment.php");  
							require("includes/reply.php");
						

						}//isset 
						?>


					


					</div> <!-- End col-12 -->
				</div> <!-- End row -->
			</div> <!-- End Container -->
			
<?php require("includes/footer.php");

ob_end_flush();?>