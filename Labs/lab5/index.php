

<?php
//env variables
$HOST=getenv('HOST');
$DBNAME= getenv('DBNAME');

//Step1 Connect to database 
$dbConn = new PDO("mysql:host=$HOST;dbname=$DBNAME", $USERNAME, $PASSWORD);
         
// Setting Errorhandling to Exception
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 


//write sql query and assign to variable 
$sql = "SELECT * from tech_checkout";
$stmt = $dbConn -> prepare ($sql);
$stmt -> execute ( array ( ':id' => '1')  );

$dbConn= null;
  
?>

<html>
    <head>
        <title>Lab 5 </title>
    </head>
    <body>
        <div align="center">
            <h1 >
                lab5_list
            </h1>
        </div>
        
        
        <table>
            
            
            
            
        </table>

    </body>
</html>