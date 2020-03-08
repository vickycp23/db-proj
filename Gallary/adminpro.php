<?php
include_once("connection.php");
if(!isset($_POST['submit']))
{
    echo '<script type="text/javascript"> alert("Error while submiting");</script>';  
}else{
    if(empty($_POST['username'])&& empty($_POST['email']))
    {
        echo"user empty";
    }
    else{
            //$usererro=test_input($_POST['username']);
         $username=mysqli_real_escape_string($con,$_POST['username']);
       // echo $username;
        $email=mysqli_real_escape_string($con,$_POST['email']);
        //echo $email;
        $pass=mysqli_real_escape_string($con,$_POST['password']);
         $password=sha1($pass);
         //echo $password;
         $sql="select * from admin where username='$username' and password='$password'";
         $result=mysqli_query($con,$sql);
         if(mysqli_num_rows($result)==1)
         {
             while ($row=mysqli_fetch_assoc($result)) {
                if($row['password']==$password){
                    
                    $user=$row['username'];
                    $email=$row['email'];
                   // echo $user ."<br>".$email;
                       if(session_start())
                       {
                           if(isset($_SESSION['username']))
                           {
                               $username=$_SESSION['username'];
                               echo $username;
                           }
                       }else{
                              echo "session not started";
                       }

                } 
                else{
                    echo  "<script> alert('password  match');
                    window.location.href='admin.php';
                    </script>";
                    
                }
                
             }
         }else{
            echo  "<script> alert('password not match');
            window.location.href='admin.php';
            </script>";
         }
         


    }
}