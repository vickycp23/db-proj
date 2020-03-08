<?php
include_once 'h1.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
      .rr{
        margin-top: 216px;
      }
      html,body{
                background-image: url('https://images.pexels.com/photos/3244513/pexels-photo-3244513.jpeg?cs=srgb&dl=brown-landscape-under-grey-sky-3244513.jpg&fm=jpg');
                background-size: cover;
                    background-repeat: no-repeat;
                  height: 100%;
                    font-family: 'Numans', sans-serif;
                    background-attachment: fixed;
       }
  </style>
</head>
<body> 
 <div class="section-1-container section-container  rr">
    <div class="container">
        <div class="row">
    
            <div class="col-10 offset-1 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center">
 
                <div class="div-to-align">
                    <?php
                    if(isset($_SESSION['user_id'])){
                        $user_id=$_SESSION['user_id'];
                        //$sql="select * from user_copy where userid=$user_id";
                        $sql="call us('".$user_id."')";
                        $result=mysqli_query($con,$sql);

                        if(mysqli_num_rows($result)==1){
                              while($row=mysqli_fetch_array($result))
                              {
                                ?>
                                <form action="deleteuser.php" method="post">
                                <h3><strong>userid:         </strong><i class="fab fa-h1"><?=$row['userid']?>  </i></h3>
                                <h3><strong>username:<i class="fab fa-h1"><?=$row['username']?>  </i></h3>
                                <h3><strong>email:<i class="fab fa-h1"><?=$row['email']?>  </i></h3>
                                <h3><strong>signup time:<i class="fab fa-h1"><?=$row['time']?>  </i></h3>
                                <h3><strong> signup date:<i class="fab fa-h1"><?=$row['date']?>  </i></h3>
                              
                                <button class="btn-primary" type="submit" name="dele">Delete<button>
                                <button class="btn-danger"><a href="delete.php"> Change password</a><button>
                                </form>

                                <?php
                              }

                        }

                    }else{?>
                                   <i class="fab fa-h1">user not present</i>
                    <?php  }
                    ?>
                      
                </div>
 
            </div>
        </div>
    </div>
</div>



</body>
</html>