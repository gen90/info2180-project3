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

    if ($check->rowCount() === 0){
        $statement = $conn -> prepare("INSERT INTO Users (password, email) VALUES ('$hash', 'admin@hireme.com')");
        $statement -> execute();
    }


