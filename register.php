 <?php
 include "schema.php";
  $fname = strip_tags($_POST['fname']);
  $lname = strip_tags($_POST['lname']);
  $email = strip_tags($_POST['email']);
  $password = strip_tags($_POST['password']);
  $tel = strip_tags($_POST['telephone']);
      date_default_timezone_set('UTC');
    $dateJoined = date('Y/m/d', time());
    $errors = 0;

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email

  $check = $conn->prepare("SELECT * FROM Users WHERE email = :email");
  $check -> bindValue(':email', $email, PDO::PARAM_STR);
  $check -> execute();
  $row = $check->fetch(PDO::FETCH_ASSOC);
  
  if ($check->rowCount()>0) { // if user exists
      echo 1;
      $errors = 1;
  }

  // Finally, register user if there are no errors in the form
  if (($errors) == 0) {
  	$password = password_hash($password, PASSWORD_DEFAULT);//encrypt the password before saving in the database
  	 $check = $conn->prepare("INSERT INTO Users (email, password,firstname,lastname,telephone,date_joined) VALUES(:email, :password,:fname,:lname,:tel,'$dateJoined')");
  	 $check -> bindValue(':email', $email, PDO::PARAM_STR);
  	 $check -> bindValue(':password', $password, PDO::PARAM_STR);
  	 $check -> bindValue(':fname', $fname, PDO::PARAM_STR);
  	 $check -> bindValue(':lname', $lname, PDO::PARAM_STR);
  	 $check -> bindValue(':tel', $tel, PDO::PARAM_STR);
  	 $check -> execute();
  	 echo 0;
}