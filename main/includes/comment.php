
<!-- Blog Comments Begins -->
						<div class="blog-comments">
							<div class="blog-comment-main">
								<h3>4 Comments</h3>

								

							<?php

							$sql3 = "SELECT * FROM comments WHERE post_id = '$post_id' and is_reply = '0' ";
							$result3 = mysqli_query($conn, $sql3);

							if (mysqli_num_rows($result3) > 0) {
							    // output data of each row
							    while($esas = mysqli_fetch_assoc($result3)) { 

							    	 $parent_id = $esas['id'];
							    	?>
							        
							    	<!-- Esas -->
								<div class="blog-comment">
									<a class="comment-avtar"><img src="../d33wubrfki0l68.cloudfront.net/8955e4aaceaa05ec35ff65521af5363b5ad32973/ab4ee/images/avtar-comment.jpg" alt="image"></a>
									<div class="comment-text">
										<h3><?php echo $esas['name'] ?></h3>
										<h5><?php echo $esas['date_created'] ?></h5>
										<p><?php echo $esas['comment'] ?></p>
										<a  data-toggle="modal" data-target="<?php echo '#reply'.$parent_id  ?>" class="comment-reply"> Reply <i class="fa fa-angle-right" aria-hidden="true"></i> </a>

									
									</div>

									<?php

									$sql4 = "SELECT * FROM comments WHERE post_id = '$post_id' and is_reply = '1'  and parent_id = '$parent_id' ";
									$result4 = mysqli_query($conn, $sql4);

									if (mysqli_num_rows($result4) > 0) {
									    // output data of each row
									    while($cavab = mysqli_fetch_assoc($result4)) { ?>

									<!--Cavab -->
									<div class="blog-comment clearfix">
										<a class="comment-avtar"><img src="../d33wubrfki0l68.cloudfront.net/8955e4aaceaa05ec35ff65521af5363b5ad32973/ab4ee/images/avtar-comment.jpg" alt="image"></a>
										<div class="comment-text">
											<h3><?php echo $cavab['name'] ?></h3>
											<h5><?php echo $cavab['date_created'] ?></h5>
											<p><?php echo $cavab['comment'] ?></p>
										</div>
									</div>
									<!--Cavab Son-->
									<?php }} ?>
								</div>
								<!-- Esas Son-->


							 <?php   }
							} 

						?>

								
								
							</div>
						</div>
						<!-- Blog Commments Ends -->