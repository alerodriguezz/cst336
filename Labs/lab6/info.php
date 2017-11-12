<?php

 //credentials
$servername = "localhost";
$username = getenv('USERNAME');
$password = getenv('PASSWORD');
$dbname = "lab6";

//Step1 Connect to database 
$dbConn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
         
// Setting Errorhandling to Exception
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

//write sql query and assign to variable 
$display_sql = "SELECT * FROM admin";
$result = $dbConn->query($display_sql);



?>

<html>
    <head>
        <title>
            Info
        </title>
           <h1 align="center">
        Info
    </h1>
    
    <div id="user_info">
        <p>
            Firstname: <?php echo $_GET["first"]; ?> <br/>
            Lastname:  <?php echo $_GET["last"]; ?><br/>
            Email: <?php echo  $_GET["email"]; ?> <br/>
        </p>
    </div>
    <div >
         <button>Update</button>
    </div>
    
    
    </head>
    
    
    
    
</html>