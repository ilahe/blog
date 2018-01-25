<!--Navigation-->
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main_nav" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href='index.php' class='navbar-brand'><img src="../d33wubrfki0l68.cloudfront.net/10fb8ea3421c6fbf36315e0dad88ec2e1d9ac693/3aee6/images/logo.png" alt="logo"></a>
			</div>
			<div class="collapse navbar-collapse" id="main_nav">
				<div class=" pull-right hidden-xs hidden-sm">
					<ul class="nav social-links">
					<?php 
					$sql1 = "SELECT * FROM social_network";
					$result1 = mysqli_query($conn, $sql1);

					if (mysqli_num_rows($result1) > 0) {
					    // output data of each row
					    $social = mysqli_fetch_assoc($result1);

	    	

	    			?>
						<li><a href="<?php echo $social['fb']; ?>"><i class="fa fa-facebook"></i></a></li>
						<li><a href="<?php echo $social['insta']; ?>"><i class="fa fa-instagram"></i></a></li>
						<li><a href="<?php echo $social['tw']; ?>"><i class="fa fa-twitter"></i></a></li>
						<li><a href="<?php echo $social['yt']; ?>"><i class="fa fa-youtube-play"></i></a></li>

						<?php } ?>
					</ul>

				</div>
				<ul class="nav navbar-nav navbar-left">
					<li><a href="index.php" >Home </a></li>
					<?php 
					$sql = "SELECT * FROM category ORDER BY id DESC";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
					    // output data of each row
					    while($cat = mysqli_fetch_assoc($result)) { ?>

					<li><a href='post.php?cat=<?php echo $cat["name"]; ?>' ><?php echo $cat["name"]; ?></a></li>

					<?php }} ?>

					<li><a href='contact.php'>Contact</a></li>

				</ul>
			</div>
		</div>
	</nav>