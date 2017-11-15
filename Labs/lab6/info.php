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

<html lang="en">
    <head>
        <title>
            Info
        </title>
          <link href="css/styles.css" rel="stylesheet" type="text/css"/>
          <meta charset="utf-8">
          
            <meta name="viewport" content="width=device-width, initial-scale=1">

             <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            
            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            
            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<body class="container-fluid">
    </head>
          <meta charset="utf-8">
           <h1 align="center">
        Info
    </h1>
    
    <div id="user_info">
        <p>
            ID: <?php echo $_GET["id"]; ?> <br/>
            Firstname: <?php echo $_GET["first"]; ?> <br/>
            Lastname:  <?php echo $_GET["last"]; ?><br/>
            Email: <?php echo  $_GET["email"]; ?> <br/>
        </p>
    </div>
    <div >
        <a href="info_update.php?id=<?php echo  $_GET["id"]; ?>&first=<?php  echo $_GET["first"]; ?>&last=<?php  echo $_GET["last"]; ?>&email=<?php  echo $_GET["email"]; ?>"> <button>Update</button></a>
    </div>
    </body>
</html>

<?php
//if update button is pressed 
if (isset($_POST['updateBtn'])) {
               
                    header('location:info_update.php');
}


?>


