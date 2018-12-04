
<!DOCTYPE html>
<?php include("schema.php"); ?>
<html>
    <head>
        <title>HireMe - Dashboard</title>
        <link rel="stylesheet" href="dashboard.css" type="text/css" />
        <script src="dashboard.js"  ></script>
        <script>
                function sendJobId(id){
                    let form = document.jobTrig;
                    form.elements[0].value = id;
                    form.submit();
                }
                
        </script>
    </head>
    <body>
        <?php if(empty($_SESSION['login_user'])){header('location: signin.php');} ?>
        <header>HireMe </header>
        <div id="main">
            <div id = "options">
                <ul>
                    <li>Home</li>
                    <?php if($_SESSION['login_user'] =='admin@hireme.com'){
                        print " <li><a href = 'signup.php'>Add User</a></li>";
                    }?>
                    
                    <li><a href= "newjob.html">New Job</a></li>
                    <li><a href ="logout.php">Logout</a></li>
                </ul>
            </div>
            <div id = "sidebar">
                <h1>Dashboard</h1>
                
                <button id = "post" type="button">Post a Job</button>
                <h3>Available Jobs</h3>
                <div id="appliedjobs">
                    <table>
                        <tr>
                            <th>Company </th>
                            <th>Job Title </th>
                            <th>Category </th>
                            <th>Date Posted </th>
                            <th></th>
                        </tr>
                        
                        <?php
                            $count = 0;
                            $query= "SELECT id, company_name, job_title, category, date_posted FROM Jobs;";
                            $data = $conn->query($query);
                            $data->setFetchMode(PDO::FETCH_ASSOC);
                            date_default_timezone_set('UTC');
                            $today = date("Y-m-d H:i:s");
                            $num = $data->rowCount();
                            
                            print "<form  method='post' name='jobTrig' action='jobdetails.php' >";
                            print "<input type='hidden' name='submission' value='' >";
                            print "</form>";
                                
                            foreach($data as $row){
                                if ($count >= ($num - 5)){
                                    $id= $row['id'];
                                    $compNam = $row['company_name'];
                                    $jTit = $row['job_title'];
                                    $cat = $row['category'];
                                    $date = $row['date_posted'];
                                    $diff=strtotime($today) - strtotime($date) ;
                                    print " <tr> ";
                                    print "<td>$compNam</td>";
                                    
    
                                    
                                    print "<td> <a href='' class='title' onclick= 'sendJobId($id)'> $jTit </a> </td>";
                                    print "<td>$cat</td>";
                                    print "<td>$date</td>";
                                    if($diff<=86400){
                                        print "<td>NEW</td>";
                                    }
                                    print " </tr> ";
                                }
                                $count ++; 
                                
                            }
                        ?>
                    </table>
                    
                    <h3>Applied Jobs</h3>
                    
                    <table>

                        
                        <?php
                        try{
                            $appJob= "SELECT job_id, date_applied FROM `Job Applied For` WHERE user_id = {$_SESSION['id']};";
                            $jobIDs = $conn->query($appJob);
                            $jobIDs->setFetchMode(PDO::FETCH_ASSOC);
                             if($jobIDs->rowCount()==0){
                                print "<p>You have not Applied to Any Jobs</p>";
                            }
                            else{
                            print "<form  method='post' name='appjobTrig' action='jobdetails.php' >";
                            print "<input type='hidden' name='appjobIn' value='' >";
                            print "</form>";
                            print "                        <tr>
                            <th>Company </th>
                            <th>Job Title </th>
                            <th>Category </th>
                            <th>Date Applied</th>
                            <th></th>
                        </tr>";
                           
                            foreach($jobIDs as $row){
                                $jobDet = $conn-> query("SELECT id, company_name, job_title, category, date_posted FROM Jobs WHERE id= {$row['job_id']};");
                                $jobData= $jobDet -> fetch(PDO::FETCH_ASSOC);
                                $jobID= $jobData['id'];
                                $compNamAp = $jobData['company_name'];
                                $jTitAp = $jobData['job_title'];
                                $catAp = $jobData['category'];
                                $dateAp = $row['date_applied'];
                                print " <tr> ";
                                print "<td>$compNamAp</td>";
                                print "<td> <a href='' class='title' onclick= 'sendJobId($jobID)'> $jTitAp </a> </td>";
                                print "<td>$catAp</td>";
                                print "<td>$dateAp</td>";
                                print " </tr> ";
                            }
                            }
                        }catch (PDOException $ex){ echo "No jobs Applied for Yet";}
                            
                        ?>
                    </table>
                </div>
            </div> 
            
        </div>
    </body>
</html>