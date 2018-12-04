<?php
    include "schema.php";?>
        
<!DOCTYPE html>
<html>
    <head>
       <link rel="stylesheet" type="text/css" href="new_style.css">
       <title> Sign Up</title>
      <!--<script src="sign_in.js" type="text/javascript"></script>-->
    </head>
    <body>
        <header>HireMe</header>
        <?php if($_SESSION[login_user]!="admin@hireme.com"){header('location: dashboard.php');} ?>

            <div id="main">
                <h1>User Registration</h1>
                <form method="post" action = "signup.php">
                    
                    <p>First Name</p>
                    <input type="text" name = "fname" required/>
                    <p>Last Name</p>
                    <input type="text" name = "lname" required/> 
                    <p>Email</p>
                    <input type="email" name = "email" required/>                    
                    <p>Password</p>
                    <input type="password" name="password" required/></br>
                    <p>Telephone</p>
                    <input type="tel"name = "telephone" required/></br>
                    
                    <button id="submit" type="submit" name = "submit_reg">Submit</button>
                </form>
                <div id=results>
                   <?php if(!empty($errors)) {foreach ($errors as $er){echo $er;}}?>
                </div>
            </div>

    </body>
</html>
    