<?php
include ('connection.php');
//session_start();
 if (mysqli_connect_error())
 {
     die('connect Error('.mysqli_connect_error().')'.mysqli_connect_errno());
 }
 else {
    
     if (isset($_POST['submit'])) {
         $email = mysqli_real_escape_string($con, $_POST['email']);
         $pass = mysqli_real_escape_string($con, $_POST['password']);
         $password = md5($pass);
         if (empty($email) || empty($pass)) {
             echo "<script> alert('reenter user name and passworrd')
                    window.location.href='login.php';
                    </script>";
         } else {

             $sql = "select * FROM user WHERE email = '$email'";
             $result = mysqli_query($con,$sql);
             if (mysqli_num_rows($result) > 0) {
                 // output data of each row
                 while($row = mysqli_fetch_assoc($result)) {

                     if($row["password"]==$password)
                     {  
                         
                         session_start();
                         $user=$row['username'];
                         //session_register("user");
                         $_SESSION['username'] = $user;

                         $_SESSION['user_id']=$row['userid'];
                         //echo  " user: " . $row["user"]. "<br>";
                           echo $user;
                         echo  "<script> alert('welcome');
                    window.location.href='homepage.php';
                    </script>";
                         
                     }else{echo  "<script> alert('password does not match');
                    window.location.href='login.php';
                    </script>";
                }
             
               }
             } else {
              echo"  <script> alert('enter email correctly');
                window.location.href='login.php';
                </script>";
             }


         }
     }else{
             echo "<script> alert('unsuccess')</script>";
         }
     
    }

?>