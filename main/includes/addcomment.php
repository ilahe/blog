<?php 
$errorMsg = "";
$successMsg = "";
if (isset($_POST['submit'])) {

	if(isset($_POST['name']) && $_POST['name'] != "" && isset($_POST['mail']) && $_POST['mail'] != "" && isset($_POST['comment']) && $_POST['comment'] != ""){

		$name = $_POST['name'];
		$mail = $_POST['mail'];
		$comment = $_POST['comment'];

		$sql = "INSERT INTO comments (name, mail, comment, post_id)
		VALUES ('$name', '$mail', '$comment', '$post_id')";

		if ($conn->query($sql) === TRUE) {
		    $successMsg = "Comment was added!";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

	} else {
		$errorMsg = "You have empty fills!";
	}

	


}//isset
?>






						<!-- Blog Contact Form Begins -->
						<div class="contact-form pad-top-big pad-bottom-big">
							<h3>Leave A Reply</h3>

							<?php if($errorMsg != ""): ?>
								<div class="alert alert-danger"><?php echo $errorMsg; ?></div>
							<?php endif; $errorMsg = ""; ?>

							<?php if($successMsg != ""): ?>
								<div class="alert alert-success"><?php echo $successMsg; ?></div>
							<?php endif; $successMsg = ""; ?>
							
							<form action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $post_id; ?>" method='post'><input type='hidden' name='form-name' value='form 1' />
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad-left">
									<div class="form-group">
										<input type="text" name="name" placeholder="Name" />
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-pad-right">
									<div class="form-group">
										<input type="email" name="mail" placeholder="Email" />
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
									<div class="form-group">
										<textarea name="comment" placeholder="Comment"></textarea>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
									<div class="form-group contactus-btn">
										<input type="submit" name="submit" value="Post Comment" class="cntct-btn">
									</div>
								</div>
							</form>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">

							</div>
						</div>
<!-- Blog Contact Form Ends -->