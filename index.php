
<?php session_start(); ?>

<?php 
if (!isset($_SESSION['uname']) ) {
  header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>

<head>
  <!-- link to css-->
  <link rel="stylesheet" href="style.css" >
  <!--bootstrap form control-->
  <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css”>
   
  <!-- this links to the css file, fonts from google -->
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Noto+Serif+JP&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&display=swap" rel="stylesheet">


    <!-- this links to the javascript file-->
    <script src="mJScode.js" > </script>

		<title> Image Gallery </title>
    
  </head>


  <body id = "content-page">

  <header>

 
        <h1>Image Gallery</h1>

        <!-- this welcomes the user with their username-->
        <?php if (isset($_SESSION['uname']) ) {
        ?>
          <h2> Welcome 
            <?php
            echo $_SESSION['uname']
            ?>
          </h2>
          <?php
        }
        ?>

        <!-- this is the log out button -->
        <?php
         echo "<button type=\"button\" 
        onclick=\"logoutFunction()\">
         Log out</button>";

      ?>

<!-- Box to upload files and save them to page -->
<div class="upload_container">
  <form action="upload.php" method="post" enctype="multipart/form-data">
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
  </form>
  </div>  

</header>


<!--side bar-->
<div id="sidebar">
  <p><strong>Pictures </strong></p>

<?php
        $images = glob("uploads/*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);
        foreach($images as $i){
          $name = basename($i);
          $path =  'uploads/'.$name;
          $imagename = 'uploads/'.$name;
          printf('<div class="sidebar"> <img class = original src="'.$path.'" onclick="myFunction(this)"></div>');

        }
      ?>   
 	</div>


<!-- Page content -->
<main>
 
<!-- The expanding image container -->
<div class="container">

<!-- Expanded image -->


  <img id="expandedImg"  style="width:600px">

  <!-- Close the image -->
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

</main>


</body>

</html>