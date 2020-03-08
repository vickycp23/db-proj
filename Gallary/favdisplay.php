<?php

include 'connection.php';
include 'h1.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<style>
    .image1{

        width:300px;
        height:300px;
    }

</style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <?php
    $user_id=$_SESSION['user_id'];
    $sql="select i.image from upload i,fav f,user u  where f.user_id='$user_id' and i.upload_id=f.image_id ";
    $re=mysqli_query($con,$sql);
    //$result=mysqli_num_rows($re);
    
    
    while($row=mysqli_fetch_array($re)){
     ?>
     <div class="col-sm-4">
        <img class="image1" src="data:image/jpeg;base64,<?php echo base64_encode($row['image']) ?>">
        </div>
        <div>
<?php
    }

    ?>





    <?php
         $sql="select v.video_name from user u ,fav2 f2, video v where f2.user_id='$user_id' and v.video_id=f2.video_id" ;
         $re=mysqli_query($con,$sql);
         //$result=mysqli_num_rows($re);
         if(mysqli_num_rows($re)>0)
         {
         while($row=mysqli_fetch_array($re)){
          ?>
             <div class="col-sm-4">
     
             <video width="300px" height="300px"controls="controls">
                   <source   src="uploadss/<?php echo $row['video_name']; ?>" type="video/mp4">
             </video>
         </div>
     <?php
         }
     }
         ?>
</body>
</html>