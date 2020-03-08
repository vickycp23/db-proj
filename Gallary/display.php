<?php
// Include the database configuration file
include 'connection.php';
?>
<?php
session_start();
if(isset($_SESSION['user_id']))
{
include_once "h1.php";
}else {
	include_once("home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
   <!--<link rel="stylesheet"  type="text/css" href="styledisplay.css">-->
   <style>
      html,body{
                background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
                background-size: cover;
                    background-repeat: no-repeat;
                  height: 100%;
                    font-family: 'Numans', sans-serif;
                    background-attachment: fixed;
               }
      .iiimage{
      width:300px;
      height:250px;
      }
      .section{
         margin-top:72px;
      }
      .submit{

background-image: url(images/he2.png);
width: 29px;
background-repeat: no-repeat;
height: 27px;
background-color: transparent;
border: none;

}
.delete{
background-image: url(images/de4.png);
width: 29px;
background-repeat: no-repeat;
height: 27px;
background-color: transparent;
border: none;
}
      </style>
</head>
<body>

   <section class="section">
   <div class="container-fluid">
<?php
// Get images from the database
$sql="select * from upload";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
while($row=mysqli_fetch_assoc($result))
{
 $iddd= $row['upload_id'];
 $image=$row['image'];
 
 ?>

 <div class=" col-sm-3">
<form action="fav3.php" method="post" class="forms">

 <input type="hidden" name="idd" class="id" value="<?= $row['upload_id'] ?>">
 <img class="iiimage" src="data:image/jpeg;base64,<?php echo base64_encode($row['image']) ?>">
 
    <div class="row">
       <div class="">
          <?php
          if(isset($_SESSION['user_id'])){
             ?>
      <button class="submit" type="submit" name="subm"></button>
   
       <button class="delete" type="submit" name="del"></button>
          <?php
         } 
         ?>
       </div>
     </div>


</form>
</div>
<?php
 }
}else{
   ?>
   <h1> no images</h1>
   <?php
}
?>
<?php
// Include the database configuration file
include 'connection.php';

// Get images from the database
$sql="select * from video";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
while($row=mysqli_fetch_array($result))
{
$iddd= $row['video_id'];
?>




<div class="col-sm-3">
<form action="fav2.php" class="forms" method="post">
 <input type="hidden" name="idd" class="id" value="<?= $row['video_id'] ?>">
<video width="300px" height="250px" controls="controls">
<source   src=" uploadss/<?php echo $row['video_name']; ?>" type="video/mp4">
</video>
<div class="row">
   <?php 
   if(isset($_SESSION['user_id'])){ 
     ?>
            <button class="submit" type="submit" name="submit"></button>
            <button class="delete" type="submit" name="delet"></button>
      <?php  }
      ?>
        </div>       
</form>
</div>


<?php } 


}else{
   ?>
   <h1> no videos</h1>
   <?php
}
?>
</div>
   </section>
   <style>
h1{
   margin-top: 270px;
    margin-left: 450px;
}
}
</style>

</body>
</html>