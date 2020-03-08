
<?php
       
       include_once "connection.php";
       session_start();
       if(isset($_SESSION['user_id']))
       {
           $user_id=$_SESSION['user_id'];
           echo $user_id;
       }
       if(isset($_POST['dele']))
                    {     

                        $sqli="delete from user where userid=$user_id";
                        //$sqli="call deleteuser('".$user_id."')";
                      
                        $res=mysqli_query($con,$sqli);
                        if($res)
                        {
                            session_destroy();
                            echo  "<script> alert('user deleted');
                    window.location.href='index.php';
                    </script>"; 
                  
                        
                        }

                    }
                    ?>