


<div class="sidebar" id="sidebar">

						<!-- User Haqqinda Melumatlar -->
						<?php 
							$sql = "SELECT * FROM users";
							$result = mysqli_query($conn, $sql);

							if (mysqli_num_rows($result) > 0) {
							    // output data of each row
							    while($user = mysqli_fetch_assoc($result)) { ?>


	    	

						<!-- About -->
						<section class="blurb">
							<h2 class="title">ABOUT ME</h2>

							<a href="single-post.html" class="image"><img class="img-responsive" src="<?php echo $user['avatar']; ?>" alt="about me" /></a>
							<div class="author-widget">
								<h4 class="author-name"><?php echo $user['name'] . " " . $user['surname']; ?></h4>
								<p><?php echo $user['about']; ?></p>
							</div>
							<div class="social">
								
						<?php }} ?>

						<!-- User Haqqinda Melumatlar Son-->

						
						<section>
							<h2 class="title">LATEST POSTS</h2>
							<ul class="posts">

							<!-- En SOn Xeberler -->
							<?php 
								$sql2 = "SELECT * FROM news ORDER BY id DESC";
								$result2 = mysqli_query($conn, $sql2);

								if (mysqli_num_rows($result2) > 0) {
								    // output data of each row
								    while($news = mysqli_fetch_assoc($result2)) { ?>


								<li>
									<article>
										<header>
											<h3><a href="#"><?php echo $news['title']; ?></a></h3>
											<time class="published" datetime="<?php echo $news['date_created']; ?>"><?php echo $news['date_created']; ?></time>
										</header>
										<a href="#" class="image"><img src="<?php echo $news['news_img']; ?>" alt="<?php echo $news['title']; ?>" /></a>
									</article>
								</li>
									
							<?php
							}}
							?>

							<!-- En SOn Xeberler  Son-->

								


							</ul>
						</section>


					</div> <!-- End Sidebar -->