
<?php session_start(); ?>

<?php

// Sources used: W3 school + Course resources
//images uploaded to file called upload
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// to check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo '<script language = "javascript">; alert("File is an image - " . $check["mime"] . ".") ; location.href = "http://localhost/imageGallery"; </script>';
  
    $uploadOk = 1;
  } else {
  
  echo '<script language = "javascript">; alert("File is not an image!") ; location.href = "http://localhost/imageGallery"; </script>';
    $uploadOk = 0;
  }
}

//to check if file already exists
if (file_exists($target_file)) {
 echo '<script language = "javascript">; alert("Sorry, file already exists.") ; location.href = "http://localhost/imageGallery"; </script>';
  $uploadOk = 0;
}

//to check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
 echo '<script language = "javascript">; alert("Sorry, your file is too large") ; location.href = "http://localhost/imageGallery"; </script>';
  $uploadOk = 0;
}

// Allow certain file formats: jpg, png, jpeg, gif
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 echo '<script language = "javascript">; alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.") ; location.href = "http://localhost/imageGallery"; </script>';
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
 echo '<script language = "javascript">; alert("Sorry, your file was not uploaded.") ; location.href = "http://localhost/imageGallery"; </script>';

 // if everything is ok, try to upload file and tell user that it is uploaded. 
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo '<script language = "javascript">; alert("File uploaded! (To gallery and database)"); location.href = "http://localhost/imageGallery"; </script>';
  
      //to save new uploaded photos to database
    $filename = $_FILES["fileToUpload"]["name"];

    $db = mysqli_connect("localhost", "root", "", "table");
 
    // Get all the submitted data from the form
    $sql = "INSERT INTO image (filename) VALUES ('$filename')";
 
    // Execute query
    mysqli_query($db, $sql);


  } else {
   // echo "Sorry, there was an error uploading your file.";
   echo '<script language = "javascript">; alert("Sorry, there was an error uploading your file.") ; location.href = "http://localhost/imageGallery"; </script>';
  }
}
?>