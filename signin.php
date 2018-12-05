<?php
 include "schema.php";     

        $user = strip_tags($_POST['username']);
        $pword = strip_tags($_POST['password']);


  
        $check = $conn->prepare("SELECT * FROM Users WHERE email=:email");
        $check-> bindValue(':email', $user, PDO::PARAM_STR);
        $check-> execute();
        $row = $check->fetch(PDO::FETCH_ASSOC);
        if($check->rowCount()==1){
            
            if(password_verify($pword,$row['password'])){
                $_SESSION['login_user']=$user;
                $_SESSION['id']= $row['id'];
                echo 1;
            }
        }else{
            echo 0;
        }
  


