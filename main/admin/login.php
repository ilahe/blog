<?php require("includes/head.php"); ?>
<?php require("db.php"); ?>


<?php
    $_SESSION["loginerrorMsg"] ='';
    $_SESSION['errorMsg'] = '';
    if(isset($_POST['submit'])){
        if($_POST['email'] != '' && $_POST['password'] != ''){
          
          $email = clear_input($_POST['email'], $conn);
          $password = clear_input($_POST['password'], $conn);
          check_login($email, $password, $conn);

        } else{
          $_SESSION['errorMsg'] = "Email və ya Şifrə boşdur";
        }
    }
 ?>


<?php if($_SESSION['errorMsg'] != ''): ?>
 <div class="alert alert-danger"><?php echo $_SESSION['errorMsg']; ?></div>
<?php ;endif;   ?>


<?php if($_SESSION["loginerrorMsg"]!= ''): ?>
 <div class="alert alert-danger"><?php echo $_SESSION['errorMsg']; ?></div>
<?php ;endif; $_SESSION["loginerrorMsg"] ='';  ?>


  <div class="row">
    <div style="padding: 200px;" class="col-sm-12">

      <form action="login.php" method="post" class="form-signin">
        <h2 class="form-signin-heading">Daxil ol</h2>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email"  autofocus>
        <label for="inputPassword" class="sr-only">Şifrə</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Şifrə" name="password" >
        <div class="checkbox">
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Daxil ol</button>
      </form>

    </div>
  </div>

<?php require("includes/footer.php"); ?>