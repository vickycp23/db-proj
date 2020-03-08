<?php
// Include the database configuration file
include 'connection.php';
?>
<?php
include_once "homepage.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <link rel="stylesheet"  type="text/css" href="styledis.css">
</head>
<body>

   <section>
<?php
// Get images from the database
$sql="select * from upload";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{

echo'<form action="fav.php" method="post">';
$id=$row['upload_id'];
$imagename=$row['imagename'];
echo'<div class="outside">';
echo'<div class="inside">';
       //   $image2=$row['image'];
        // $image="data:image/jpeg;base64,'.base64_encode($image2).'";
 echo'<img class="iimage" src="data:image/jpeg;base64,'.base64_encode($row['image']).'"width=""height="">';
 //echo $image_id;
 echo '<input type="submit" name="submit">';
 include'imagefooter.php';
 
//echo $row['image'];
//echo "<img  src='$image'>";
echo'</div>';
echo'</div>';
echo'<form>';
}


?>
   </section>
</body>
</html>