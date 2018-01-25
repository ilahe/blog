<div class="col-sm-10"><h1>Xəbər Əlavə Et</h1></div>

<form action="process/add.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <div class="col-sm-10">
      <input type="text" class="form-control" name="title" id="text" placeholder="Başlıq">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-10">
      <textarea class="form-control" name="content" id="content" placeholder="Kontent"></textarea>
      <script>
                CKEDITOR.replace('content');
      </script>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-10">
      <select class="form-control" name="category" id="category">
        <?php 

        $sql = "SELECT * FROM category";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            while($cat = mysqli_fetch_assoc($result)) { ?>
  
  <option value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>

      <?php }
        } else {
           echo $_SESSION['errorMsg'] = $errorMsg . mysqli_error($conn);
        }
        

        ?>
        
        
      </select>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-10">
      <input type="file" class="form-control" name="fileToUpload" id="file" placeholder="Şəkil">
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="newssubmit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>