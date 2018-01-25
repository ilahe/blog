<?php 

/*
* Check login
*/
	function check_login($email,$password,$conn){
		
         $sql = "SELECT * FROM users WHERE password = '$password' AND email = '$email'";
         $result = mysqli_query($conn, $sql);

        //Eger TRUE qaytarirsa demeli bele istifadeci var
         if (mysqli_num_rows($result) > 0){

            while($user = mysqli_fetch_assoc($result)) {
                    
                    $_SESSION["username"] = $user['username'];
                    $_SESSION["full_name"] = $user['name'] . " " . $user['surname'];
                    $_SESSION["logged_id"] = true;
                    $_SESSION["user_id"] = $user['id'];

                    header("Location: dashboard.php");
            }
                
        } else {
                //Eger FALSE qaytarirsa demeli bele istifadeci yoxdur
                $_SESSION["loginerrorMsg"] = "Belə bir istifadəçi mövcud deyil";
                header("Location: login.php");
               }
    }
   

/*
* Clear User Input
*/
function clear_input($data,$conn){
	
	$data = htmlspecialchars(trim(stripslashes($data)));
	return mysqli_real_escape_string($conn, $data);

}//clear_input() function


/*
* Delete
*/

function delete($table, $id, $conn, $successMsg, $errorMsg, $location){

    $sql = "DELETE FROM " . $table .  " WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {

        $_SESSION['successMsg'] = $successMsg;
        header('location: ../dashboard.php?page=' . $location);

    } else {

        $_SESSION['errorMsg'] = $errorMsg . mysqli_error($conn);
        header('location: ../dashboard.php?page=' . $location);

    }
}


/*
* Add
*/

function add($table, $col1, $col2, $col3, $col4, $col5, $val1, $val2, $val3, $val4, $val5, $conn, $successMsg, $errorMsg, $location){

     $sql = "INSERT INTO ". $table ." ($col1, $col2, $col3, $col4, $col5) 
        VALUES ('$val1', '$val2', '$val3', '$val4', '$val5')";

    if (mysqli_query($conn, $sql)) {

        $_SESSION['successMsg'] = $successMsg;
        header('location: ../dashboard.php?page=' . $location);

    } else {

        $_SESSION['errorMsg'] = $errorMsg . mysqli_error($conn);
        echo  $_SESSION['errorMsg']; die();

    }
}



/*
* Select
*/

function select($table, $conn, $loop, $errorMsg, $row){

    $sql = "SELECT * FROM ". $table;

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) { 


            printf($loop); 
        }

    } else {
       echo $_SESSION['errorMsg'] = $errorMsg . mysqli_error($conn);
    }
}



/*
* Update
*/

function update($table, $col1, $col2, $col3, $col4, $col5, $val1, $val2, $val3, $val4, $val5, $conn, $successMsg, $errorMsg, $location, $id){

     $sql = "UPDATE " . $table . " SET $col1='$val1', $col2='$val2', $col3='$val3', $col4='$val4', $col5='$val5' WHERE id='$id'";


    if (mysqli_query($conn, $sql)) {

        $_SESSION['successMsg'] = $successMsg;
        header('location: ../dashboard.php?page=' . $location);

    } else {

        $_SESSION['errorMsg'] = $errorMsg . mysqli_error($conn);
        echo  $_SESSION['errorMsg']; die();

    }
}





/* 
* Img Upload
*/

function upload_img($target_dir){

        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $GLOBALS['target_file'] = $target_file;
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 5000000000000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
}




