<?php 
$errorMsg = "";
$successMsg = "";
if (isset($_POST['reply_submit'])) {

  if(isset($_POST['name']) && $_POST['name'] != "" && isset($_POST['mail']) && $_POST['mail'] != "" && isset($_POST['comment']) && $_POST['comment'] != ""){

    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $comment = $_POST['comment'];
    $is_reply = 1;
    $esas_id = $_POST['esas_id'];

    $sql = "INSERT INTO comments (name, mail, comment, post_id, is_reply, parent_id)
    VALUES ('$name', '$mail', '$comment', '$post_id', '$is_reply', '$esas_id')";

    if ($conn->query($sql) === TRUE) {
        header("location: " . $_SERVER['PHP_SELF'] . "?id=" . $post_id);  
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

  } else {
    $errorMsg = "You have empty fills!";
  }

  


}//isset
?>

<?php 


          $sql = "SELECT * FROM comments WHERE post_id = '$post_id' and is_reply = 0";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($comment = mysqli_fetch_assoc($result)) { 
                    $comment_id = $comment['id'];
                ?>

          <!-- Modal -->
          <div id="<?php echo 'reply'.$comment_id; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Reply to <?php echo $comment['name']; ?></h4>
                </div>
                <div class="modal-body">
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

                <input type="hidden" name="esas_id" value="<?php echo $comment_id; ?>">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                  <div class="form-group contactus-btn">
                    <input type="submit" name="reply_submit" value="Post Comment" class="cntct-btn">
                  </div>
                </div>
              </form>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">

              </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>

<?php }} ?>