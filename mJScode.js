function myFunction(imgs) {
    // Get the expanded image
    var expandImg = document.getElementById("expandedImg");
    expandImg.src = imgs.src;
    expandImg.parentElement.style.display = "block";
   
  }


  function logoutFunction(){
    window.location.href = "logout.php";
  }











