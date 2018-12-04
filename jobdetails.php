<!DOCTYPE html>
<html>
    <head>
       <link rel="stylesheet" type="text/css" href="jobdetails.css">
       <!--<script src="jobdetails.js" type="text/javascript"></script>-->
       <?php  
            include 'schema.php';
            $id  = $_POST['submission'];
            $jobQ = $conn->query("SELECT * FROM Jobs WHERE id='$id'");
            $job = $jobQ->fetch(PDO::FETCH_ASSOC);
            $_SESSION['jobID']= $job['id'];
            $title = $job['job_title'];
            print "<title>Job - $title</title>";
       ?>
    </head>
    <body>
        <header>HireMe</header>
        
            <div id="optionbar">
                <ul>
                    <li><a href="dashboard.php">Home</a></li>
                    <?php if($_SESSION['login_user']=="admin@hireme.com"){ print '<li><a href="signup.php">Add User</a></li>';} ?>
                    <li><a href="newjob.html">New Job</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <div id="main">
               
                <!--<h1>Job Details</h1>-->
                <div id="btn">
                <form action= "jobapp.php">
                    <button>Apply Now </button>
                </form>
                </div>
               <div id="desc">
               
                <h1 class= jobTitle><?php echo $job['job_title'];?></h1>
                <h4>Category: </h4><p class= category><?php echo $job['category']; ?></p></br></br>
                
                <h4>Company: </h4><p class= company><?php echo $job['company_name'] ?> </p></br></br>
                <h4>Location: </h4><p class= location> <?php echo $job['company_location'] ?></p></br></br>
                </div>
                
                    </br>
                    <h4>Job Details:</h4>
                    
                    <p class= description> <?php echo $job['job_description'] ?></p>
                
        </div>
        

    </body>
</html>

