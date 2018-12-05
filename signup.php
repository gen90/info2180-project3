<?php
    include "schema.php";?>
        
<!DOCTYPE html>
<html>
    <head>
       <link rel="stylesheet" type="text/css" href="new_style.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
       <script src="signup.js"></script>
       <title> Sign Up</title>
      
    </head>
    <body>
        <header>HireMe</header>
        <?php if($_SESSION[login_user]!="admin@hireme.com"){header('location: dashboard.php');} ?>

            <div id="main">
                <h1>User Registration</h1>
                
                    
                    <p>First Name</p>
                    <input type="text" name = "fname" id = "fname" required/>
                    <p>Last Name</p>
                    <input type="text" name = "lname" id = "lname" required/> 
                    <p>Email</p>
                    <input type="email" name = "email" id = "username" required/>                    
                    <p>Password</p>
                    <input type="password" name="password" id = "password" required/></br>
                    <p>Telephone</p>
                    <input type="tel"name = "telephone" id="telephone" required/></br>
                    
                    <button id="submit" type="submit" name = "submit_reg">Submit</button>
                
                <div id=results>

                </div>
            </div>

    </body>
</html>
    