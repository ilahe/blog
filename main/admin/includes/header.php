<?php require("head.php") ?>
<?php
          if(isset($_GET['page'])){

            $page = clear_input($_GET['page'], $conn);

          } else{

            $page = 'esas';

          }


 ?>

  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">PHP Blog</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link <?php if($page == 'esas'){echo 'active';} ?>" href="#">Əsas</a>
          </li>
        </ul>

          <a class="btn btn-primary" href="../">Sayta Bax</a>
          <a class="btn btn-danger" href="logout.php">Çıxış</a>

      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        