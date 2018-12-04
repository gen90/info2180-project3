<?php
    session_start();
    
    include 'schema.php';
    $dupCheck = $conn->query("SELECT id FROM `Job Applied For` WHERE job_id= {$_SESSION['jobID']} AND user_id= {$_SESSION['id']}");
    if ($dupCheck-> rowCount() == 0){
        date_default_timezone_set('UTC');
        $dateApplied= date('Y/m/d', time());
        
        $apply = $conn->prepare("INSERT INTO `Job Applied For` (job_id, user_id, date_applied) VALUES({$_SESSION['jobID']}, {$_SESSION['id']}, '$dateApplied')");
      	$apply -> execute();
    }
  	header('location: dashboard.php'); 