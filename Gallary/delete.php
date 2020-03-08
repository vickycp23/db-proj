
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="style.css">
<title>Title</title>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
 html,body{
                background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
                background-size: cover;
                    background-repeat: no-repeat;
                  height: 100%;
                    font-family: 'Numans', sans-serif;
                    background-attachment: fixed;
       }
     .carding{
     margin-top: 151px;
    margin-left: 30%;
    margin-right: 238px;
     }
     .btn{
        margin-left: 37%;

     }
     #oldpass{

     }
     #newpass{
        margin-left: -1%;
     }
     #cnfpass{

     }
     .control-label{
        font-size: 17px;
    color: red;
     }
     .card-title{
        color: aliceblue;

     }

</style>
</head>
<body>
<div class="container">
    <div class="card carding">
      <div class="card-body">
        <h5 class="card-title">change password</h5>
        <form action="delete.php" method="post">
        <div class="row">
            
       
        <i class="far fa-h2">
        <div class="form-group">
            <label for="inputold pass" class="col-sm-2 control-label">old_pass:</label>
            <div class="col-sm-10">
                <input type="password" name="oldpass" id="oldpass" class="form-control" required="required" title="old pass">
            </div>
        </div>
        </i>
        </div>
        <div class="row">
            
      <i class="far fa-h3 ">
      <div class="form-group">
          <label for="inputnew_pass" class="col-sm-2 control-label">new_pass:</label>
          <div class="col-sm-10">
              <input type="password" name="newpass" id="newpass" class="form-control" required="required" title="new password">
          </div>
      </div>
      </i>
      </div>
      <div class="row">
          <i class="far fa-h3">
          <div class="form-group">
              <label for="inputcnf_pass" class="col-sm-2 control-label">cnf_pass:</label>
              <div class="col-sm-10">
                  <input type="password" name="cnfpass" id="cnfpass" class="form-control" required="required" title="confirm password">
              </div>
          </div>
          
          </i>
      </div>
      <div class="row">
          <button type="submit"  name="delete"class="btn btn-primary">change passsword</button>
      </div>
       </form>
      </div>

    </div>
</div>
</body>
</html>


<?php

session_start();
if(isset($_SESSION['user_id']))
{
$user_id=$_SESSION['user_id'];
}
include_once('connection.php');
if (isset($_POST['delete'])) {
   
    $oldpassword=mysqli_real_escape_string($con,$_POST['oldpass']);
    $newpassword=mysqli_real_escape_string($con,$_POST['newpass']);
    $confpassword=mysqli_real_escape_string($con,$_POST['cnfpass']);
    $oldpass=md5($oldpassword);
    $newpass=md5($newpassword);
    $conpass=md5($confpassword);
    $pass="select * from user where userid=$user_id";
    $res=mysqli_query($con,$pass);

    if(mysqli_num_rows($res)==1){
        while ($row=mysqli_fetch_array($res)) {
        $sqlipass=$row['password'];
       
        }
        if($sqlipass==$oldpass){
            if($newpass==$conpass){
                   $repast="update user_copy set password='$conpass' where userid='$user_id' ";
                   mysqli_query($con,$repast);
                   $repass="update user set password='$conpass' where userid='$user_id' ";
                   $reres=mysqli_query($con,$repass);
                   if($reres)
                   {
                    ?>
                    <div class="alert alert-success alert-dismissible fade in">
                    <a href="homepage.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <a  href="homepage.php" >  <strong>success</strong>password update successfull plz click here</a>
                      </div>
                   <?php
                   }else {
                    ?>
                    <div class="alert alert-success alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>success</strong>password  can not update 
                      </div>
                   <?php  
                   }
            }else{
                ?>
                <div class="alert alert-danger alert-dismissible fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Danger!</strong>new password did not match
                  </div>
               <?php
            }
    
            
    
        }else{
            ?>
                  <div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Danger!</strong> reenter your old password
  </div>
       <?php
        }

    }else {
        echo"not match";
    }
}
?>