<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    
</body>
</html>



<?php
include_once 'connection.php';

if(mysqli_connect_error())
{
    die('connect Error('.mysqli_connect_error().')'.mysqli_connect_errno());
}else {
    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $pas = mysqli_real_escape_string($con, $_POST['password']);
        if(strlen($pas)>=8){ 
       
        $password = md5($pas);
        // user name & email already exist?
         if(empty($username)||empty($email)|| empty($pas))
         {
            // header("location:signup.php");
             echo "<script>alert('emailerror');
                    window.location.href='signup.php';
                    </script>";
             exit();
         }else {
                  $sq = "SELECT * FROM  user WHERE email='$email'";
                 $result = mysqli_query($con, $sq);
                 $check = mysqli_num_rows($result);

                   if ($check > 0) {
                           echo "<script>
                                  alert('emailerror');
                                  window.location.href='signup.php';
                                </script>";
                              //  header("location:signup.php? signup email already exist  error");

                   }else {
                          //insert page  code
                              $sql = "INSERT INTO user(username,email,password) values ('  $username','$email','$password');";
                               $r = mysqli_query($con, $sql);
                           if ($r == true) {
                                header("location:login.php");
                            } else {
                                 header("location:signup.php");
                                 }
                         }
               }
    }else{
        ?>
                    <div class="alert alert-success alert-dismissible fade in">
                    <a href="signup.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <a href="signup.php">  <strong>password length is less than 8</strong></a>
                      </div>
                   <?php  
    } 
  }
 }

?>
