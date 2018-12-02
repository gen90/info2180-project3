<?php
    $host = getenv('IP');
    $username = getenv('C9_USER');
    $password = '';
    $dbname = 'hireMe';
    $errors =array();
    try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); }
    
    catch (PDOException $ex){ echo "FAIL";}
    
    session_start();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $hash = password_hash('password123',PASSWORD_DEFAULT);
    $check = $conn->query("SELECT * FROM Users");
    //  $statement = $conn -> prepare("INSERT INTO Users (password, email) VALUES ('$hash', 'admin@hireme.com')");
    //      $statement -> execute();
    if ($check->rowCount() === 0){
        $statement = $conn -> prepare("INSERT INTO Users (password, email) VALUES ('$hash', 'admin@hireme.com')");
        $statement -> execute();
    }
    
  // to login 
   if(isset($_POST['submit_login'])){

        $user = $_POST['username'];
        $pword = $_POST['password'];
        if (empty($user)) {
  	        array_push($errors, "Username is required");
        }
        if (empty($pword)) {
            array_push($errors, "Password is required");
        }

  if (count($errors) == 0) {
        $check = $conn->query("SELECT * FROM Users WHERE email='$user'");
        $row = $check->fetch(PDO::FETCH_ASSOC);
        if($check->rowCount()==1){
            if(password_verify($pword,$row['password'])){
                $_SESSION['login_user']=$username;
                header('location: home.html');
            }
            else{
               array_push($errors, "Invalid Password"); 
            }
        }else{
            array_push($errors, "Invalid Username or Password");
            
        }

   }
}

//register user
if (isset($_POST['submit_reg'])) {
  // receive all input values from the form
  $fname =$_POST['fname'];
  $lname = $_POST['lname'];
  $email =$_POST['email'];
  $password = $_POST['password'];
  $tel = $_POST['telephone'];
      date_default_timezone_set('UTC');
    $dateJoined = date('Y/m/d', time());
    $errors = array();

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fname)) { 
    array_push($errors, "First Name is required");
  }
  
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email

  $check = $conn->query("SELECT * FROM Users WHERE email = '$email'");
  $row = $check->fetch(PDO::FETCH_ASSOC);
  
  if ($check->rowCount()>0) { // if user exists
      array_push($errors, "User already exists");
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = password_hash($password, PASSWORD_DEFAULT);//encrypt the password before saving in the database
  	 $check = $conn->prepare("INSERT INTO Users (email, password,firstname,lastname,telephone,date_joined) VALUES('$email', '$password','$fname','$lname','$tel','$dateJoined')");
  	 $check -> execute();
  	$_SESSION['username'] = $username;
  //	$_SESSION['success'] = "You are now logged in";
  	header('location: home.html');
  }
}