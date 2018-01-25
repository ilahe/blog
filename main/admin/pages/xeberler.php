<h1>Xəbərlər <a class="btn btn-primary btn-sm" href="dashboard.php?page=mainview&form=newsform">Yenisini əlavə et</a></h1> 

<ul class="list-group">

<?php

	$sql = "SELECT * FROM news ORDER BY id DESC";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

	    while($news = mysqli_fetch_assoc($result)) { ?>

		  <li class="list-group-item">

		  	<a href="<?php echo 'dashboard.php?page=edit&newsid=' . $news['id']; ?>"><?php echo $news['title']; ?>
		  	</a>

		  	<span class="label"><?php echo substr($news['date_created'], 0, 10); ?></span>

		  	<div class="secim">
			  	<a href="<?php echo 'dashboard.php?page=edit&newsid=' . $news['id']; ?>" class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
			  	<a href="<?php echo 'process/delete.php?newsid=' . $news['id']; ?>" class="sil" ><i class="fa fa-times" aria-hidden="true"></i></a>
		  	</div>
		  </li>

<?php } }else { echo "0 results"; } ?>

</ul>