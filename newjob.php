<?php
    include "schema.php";

    $jobName = strip_tags($_POST["jtitle"]);
    $desc = strip_tags($_POST["jdescription"]);
    $category = strip_tags($_POST["category"]);
    $company = strip_tags($_POST["company"]);
    $location = strip_tags($_POST["jlocat"]);
    $datePosted= date('Y/m/d', time());
    
    $insert=  $conn -> prepare("INSERT INTO Jobs (job_title, job_description, category, 
                        company_name, company_location, date_posted) VALUES ('$jobName', '$desc', '$category',
                        '$company', '$location', '$datePosted')");
    $insert -> execute();
    
    header('location: dashboard.php');
  