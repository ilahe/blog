

	    	
	<!-- Slider -->
	<div class="clearfix"></div>
	<div class="slider container">
		<div class="featured-area">

			<div class="owl-carousel owl-theme">
				<?php 
			$sql = "SELECT * FROM news ORDER BY id DESC";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($news = mysqli_fetch_assoc($result)) { ?>


				<div class="feat-item item">
					<img src='<?php echo $news['news_img']; ?>' alt="slide 1">
					<div class="feat-overlay">
						<div class="feat-inner">

							<h2><a href="single-post.html"><?php echo $news['title']; ?></a></h2>
							<a href="<?php echo "post.php?id=". $news["id"]; ?>" class="feat-more">read more</a>
						</div>
					</div>

				</div>

				<?php }} ?>

			</div> <!-- End owl-carousel -->
		</div> <!-- End featured-area -->
	</div><!-- End slider -->