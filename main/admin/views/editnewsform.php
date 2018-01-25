<div class="col-sm-10"><h1>Xəbərə Düzəliş Et</h1></div>

<form action="process/edit.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <div class="col-sm-10">
      <input type="text" class="form-control" name="title" value="<?php echo $title; ?>" id="text" placeholder="Başlıq">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-10">
      <textarea class="form-control" name="content" id="content" placeholder="Kontent"><?php echo $content; ?></textarea>
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
  
  <option value="<?php echo $cat['id'] ?>" <?php if($cat["id"] == $category){echo "selected";}  ?> ><?php echo $cat['name'] ?></option>

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

      <br>
      <br>
      <p>Hazırkı şəkil:</p>
      <div style="width: 200px; height: 200px; background: url('<?php echo substr($news_img, 3) ?>') no-repeat center center;"></div>
    </div>
  </div>

  <input type="hidden" name="newsid" value="<?php echo $id ?>">

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="newssubmit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>