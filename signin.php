<?php include ('schema.php') ?>
<!DOCTYPE html>
<html>
    <head>
       <link rel="stylesheet" type="text/css" href="new_style.css">
       <title>Sign In</title>
       <script src="sign_in.js" type="text/javascript"></script>
    </head>
    <body>
        <header>HireMe</header>

            <div id="main">
                <h1>User Login</h1>
                <form method="post" action = "signin.php">
                   
                    <p>Email</p>
                    <input type="username" id="user" name = "username" required/>
                    <p>Password</p>
                    <input id="password" type="password" name="password" required/></br>
                    
                    <button id="submit" type="submit" name = "submit_login">Submit</button>
                </form>
                <div id=results>
                   <?php if(!empty($errors)) {foreach ($errors as $er){echo $er;}}?>
                </div>
            </div>
            <div id="footer"></div>

        </div>
    </body>
</html>
