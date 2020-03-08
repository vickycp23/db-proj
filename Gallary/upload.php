<?php
include_once("connection.php");
include 'h1.php';

?>
<?php
 if(isset($_SESSION['user_id']))
 {
     $user_id=$_SESSION['user_id'];
     //echo $user_id;
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style> 
    body{
      background-image: url('https://images.pexels.com/photos/1449840/pexels-photo-1449840.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');
      background:cover;
    }   
    .div{
         background:transperent;
         position: absolute;
         top:50%;
          left:40%;
           margin-top:-100px;
             margin-left:-100px;
    }
    
    
    </style>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container">
<div class="col-md-8 col-md-offset-2">
                                        <form action="upload.php" method="POST" enctype="multipart/form-data">
                                             <input type="file" name="image" class="">
                                      <div class="btn-group btn-group-sm">
                                               <button type="submit" name="submit" value="upload image" class="btn btn-primary">upload image</button>
                                               <button type="submit" name="submit2" value="upload video" class="btn btn-primary">upload video</button>
                                      </div>
                                            </form>
                                              <a href="homepage.php">homepage</a>
                                </div>
                                </div>
<!--
<div class="container">
<div class="col-md-8 col-md-offset-2">
<form method="POST" action="upload.php" enctype="multipart/form-data">
	 COMPONENT START 
		<div class="input-group input-file" name="Fichier1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ratchet/2.0.2/css/ratchet.css" rel="stylesheet"/>
<label for="imageUpload" class="btn btn-primary btn-block btn-outlined">Select files</label>
<input type="file" id="imageUpload" accept="image/*" style="display: none" name="image">

	</div>
	 COMPONENT END 
	<div class="btn-group btn-group-sm">
		<button type="submit"  name="submit" class="btn-success" disabled>upload image</button>
		<button type="submit" name="submit2" class="btn-success" disabled>upload video</button>
	</div>
</form>
<a href="homepage.php">homepage</a>
</div>
</div> -->
    </body>
</html>

<?php


if(isset($_POST['submit']))
{
    $file=$_FILES['image'];
   // print_r($file);
        $image_name = $_FILES['image']['name'];
        $image_temp=$_FILES['image']['tmp_name'];
        $image_type=$_FILES['image']['type'];
        $image_size=$_FILES['image']['size'];
        $tmp=addslashes(file_get_contents($image_temp));
       // $image_type=$_FILES[]
  	// Get text
  	//$image_text = mysqli_real_escape_string($con, $_POST['image_text']);

  	// insert query
  	$sql = "INSERT INTO upload (user_id,imagename, image_type,image_size,image) VALUES ('$user_id','$image_name', '$image_type','$image_size','$tmp')";
  	// execute query
  	mysqli_query($con, $sql);
}
//////////////////////////video  //////////////////
if(isset($_POST['submit2']))
{
    $file=$_FILES['image'];

        $video_name = $_FILES['image']['name'];
        $video_temp=$_FILES['image']['tmp_name'];
        $video_type=$_FILES['image']['type'];
        $video_size=$_FILES['image']['size'];
        $tmp=addslashes(file_get_contents($video_temp));
        move_uploaded_file($video_temp,'uploadss/'.$video_name);
       // $image_type=$_FILES[]
  	// Get text
  	//$image_text = mysqli_real_escape_string($con, $_POST['image_text']);

  	// insert query
  	$sql = "INSERT INTO video (user_id,video_name, video_type,video_size) VALUES ('$user_id','$video_name', '$video_type','$video_size')";
  	// execute query
  	mysqli_query($con, $sql);
}

?>