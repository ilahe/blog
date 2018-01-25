<div id="back-to-top">
			<a href="#top"><i class="fa fa-arrow-up"></i></a>
		</div>

		<footer class="text-center footer">
			<div class="container">
				<div class="row">
					<div class="full">
						<ul class="quick-link">

							<?php 
							$sql1 = "SELECT * FROM social_network";
							$result1 = mysqli_query($conn, $sql1);

							if (mysqli_num_rows($result1) > 0) {
							    // output data of each row
							    $social = mysqli_fetch_assoc($result1);?>
						<li><a href="<?php echo $social['fb']; ?>"><i class="fa fa-facebook"></i></a></li>
						<li><a href="<?php echo $social['insta']; ?>"><i class="fa fa-instagram"></i></a></li>
						<li><a href="<?php echo $social['tw']; ?>"><i class="fa fa-twitter"></i></a></li>
						<li><a href="<?php echo $social['yt']; ?>"><i class="fa fa-youtube-play"></i></a></li>

						<?php } ?>

						</ul>

						<div class="copy-right">
							<p>PHP Blog | <?php echo date("Y"); ?></p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div><!-- End Main -->

	<script src='../d33wubrfki0l68.cloudfront.net/bundles/91ba43600f7f89a977bde9e658a693a2235799cb.js'></script>

			<script type="text/javascript">
		// Slider
		jQuery('.owl-carousel').owlCarousel({
			loop:true,
			autoplay:true,
			margin:10,
			nav:true,
			navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
			responsiveClass: true,
			items:1,
			dots:false,
			responsive:{
				0:{
					items:1,
					nav:true
				},	
				600:{
					items:2
				}
			}
		});
     </script>


</body>


</html>