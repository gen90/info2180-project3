<?php
    include "schema.php";
    
    $jobName = $_POST["jtitle"];
    $desc = $_POST["jdescription"];
    $category = $_POST["category"];
    $company = $_POST["company"];
    $location = $_POST["jlocat"];
    $datePosted= date('Y/m/d', time());
    
    $insert=  $conn -> prepare("INSERT INTO Jobs (job_title, job_description, category, 
                        company_name, company_location, date_posted) VALUES ('$jobName', '$desc', '$category',
                        '$company', '$location', '$datePosted')");
    $insert -> execute();
    
    header('location: dashboard.php');
  