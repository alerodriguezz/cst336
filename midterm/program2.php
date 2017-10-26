<?php
include('database.php');

//Step1 Connect to database 
$dbConn = new PDO("mysql:host=localhost;dbname=oscars", $USERNAME , $PASSWORD);
         
// Setting Errorhandling to Exception
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 


//write sql query and assign to variable 
$sql = "SELECT * from oscars";
$stmt = $dbConn -> prepare ($sql);
$stmt -> execute ( array ( ':id' => '1')  );

$dbConn= null;
?>

<html>
    <head>
        <title>
            program2
        </title>
        
<body>
    
    <div id="female actresses not born in us">
        
        
    </div>
    
    
    
    
    
    
    
</body>
    </head>
    
    
    
    
    
    
    
</html>