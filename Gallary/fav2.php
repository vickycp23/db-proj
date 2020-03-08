<?php
include 'connection.php';
session_start();
if(isset($_SESSION['user_id']))
{
    $user_id=$_SESSION['user_id'];
}
if(isset($_POST['submit']))
{
    $video_id=$_POST['idd'];
    //$image=$_POST['image'];
   // echo $image;
   // echo $id;
    
   //echo $user_id;
   $sq = "select * from fav2 where video_id='$video_id' and user_id='$user_id';";
   $re = mysqli_query($con, $sq);
   if(mysqli_num_rows($re)==0)
   {
   $sql = "INSERT INTO fav2(video_id,user_id) values ('$video_id','$user_id');";
     $r = mysqli_query($con, $sql);
   if ($r == true) {
    echo  "<script> alert('add to fav2');
    window.location.href='display.php';
    </script>";
  } else {
        
    echo  "<script> alert('can not add to fav2');
                    window.location.href='displayvid.php';
                    </script>"; 
                  }
}else{

       $sqll="delete from fav2 where video_id='$video_id' and user_id='$user_id'; ";
       mysqli_query($con, $sqll);
          

  echo  "<script> alert('removed  from  fav');
  window.location.href='display.php';
  </script>";
}
}

?>


<?php
if(isset($_POST['delet'])){
      $video_id=$_POST['idd'];
      if(isset($_SESSION['user_id'])){
  $sqli="delete from video where video_id='$video_id' and user_id='$user_id';";
  //$sqli="call dele('".$video_id."','".$user_id."')";
  $result=mysqli_query($con, $sqli);
  
  if($result){
  
      echo  "<script> alert('delete success');
      window.location.href='display.php';
      </script>";
  }
  
  }else{

    echo  "<script> alert('you can't');
    window.location.href='index.php';
    </script>";

  }
}
?>