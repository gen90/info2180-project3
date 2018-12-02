
<!DOCTYPE html>
<?php include("schema.php") ?>
<html>
    <head>
        <title>HireMe</title>
        <link rel="stylesheet" href="dashboard.css" type="text/css" />
        
    </head>
    <body>
        <?php if(empty($_SESSION['login_user'])){header('location: signin.php');} ?>
        <header>HireMe
            
        </header>
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
                <button id = "post" type = "posted">Post a Job</button>
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
                            $query= "SELECT company_name, job_title, category, date_posted FROM Jobs;";
                            $data = $conn->query($query);
                            $data->setFetchMode(PDO::FETCH_ASSOC);
                            date_default_timezone_set('UTC');
                            $today = date("Y-m-d H:i:s");
                            $num = $data->rowCount();
                            foreach($data as $row){
                                if ($count >= ($num - 5)){
                                $compNam = $row['company_name'];
                                $jTit = $row['job_title'];
                                $cat = $row['category'];
                                $date = $row['date_posted'];
                                $diff=strtotime($today) - strtotime($date) ;
                                print " <tr> ";
                                print "<td>$compNam</td>";
                                print "<td>$jTit</td>";
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
                </div>
            </div> 
            <div id="avail">  <!---available jobs go here-->
                
            </div>
            <div id="applied">  <!---applied jobs go here-->
                
            </div>
        </div>
    </body>
</html>