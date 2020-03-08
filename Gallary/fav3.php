<?php

include "connection.php";
session_start();
if(isset($_SESSION['user_id']))
{
    $user_id=$_SESSION['user_id'];
}
if(isset($_POST['subm'])){
    $image_id=$_POST['idd'];
    $sq = "select * from fav where image_id='$image_id' and user_id='$user_id';";
    $re = mysqli_query($con, $sq);
    if(mysqli_num_rows($re)==0)
    {
    $sql = "INSERT INTO fav(image_id,user_id) values ('$image_id','$user_id');";
      $r = mysqli_query($con, $sql);
    if ($r == true) {
      echo  "<script> alert('add to fav');
                     window.location.href='display.php';
                     </script>"; 
   } else {
         
     echo  "<script> alert('can not add to fav');
                     window.location.href='display.php';
                     </script>"; }
 }else{
 
        $sqll="delete from fav where image_id='$image_id' and user_id='$user_id'; ";
        mysqli_query($con, $sqll);
           
 
   echo  "<script> alert('removed  from  fav');
   window.location.href='display.php';
   </script>";
 }
   
}


?>
<?php
if(isset($_POST['del'])){
    $image_id=$_POST['idd'];
//$sqll="delete from upload where upload_id='$image_id' and user_id='$user_id';";
$sqli="call deleting('".$image_id."','".$user_id."')";
$result=mysqli_query($con, $sqli);
if($result==true){

    echo  "<script> alert('delete success');
    window.location.href='display.php';
    </script>";
}

}
?>