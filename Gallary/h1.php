<?php include_once("connection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>gallery home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="homepage.php"> <p class="h4">Home</p></a>
    </li>
    <li class="nav-item">
    <a  class="nav-link"  href="search.php"> <p class="h4">Search</p></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="display.php"> <p class="h4">Explore</p></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="upload.php">  <p class="h4">upload</p></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="favdisplay.php"> <p class="h4">My fav</p></a>
    </li>
    </ul>
    <ul class="navbar-nav ml-auto">
          <?php
          $user="";
              if(session_start())
              {
                  if(isset($_SESSION['username']))
                  {
               $user = $_SESSION['username'];
            ?>
                <li class='nav-ltem'>
                
                <a class="nav-link" href="profile.php"> <p class="h4"><?=$user?></p></a>

                </li>
        <?php
            }else{
                  echo "photo gallery";
              }
            }else{
                        echo "photogallery";
              }

           ?>

           
  
    <li class="nav-item ">
      <a class="nav-link" href="logout.php" > <p class="h4">logout</p></a>
    </li>
</ul>
</nav>
</body>
</html>