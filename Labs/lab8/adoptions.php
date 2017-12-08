<?php 
//env variables
$USERNAME= getenv('USERNAME');
$PASSWORD= getenv('PASSWORD');

//Step1 Connect to database 
$dbConn = new PDO("mysql:host=localhost;dbname=adoptees_sql", $USERNAME, $PASSWORD);
         
// Setting Errorhandling to Exception
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 


//write sql query and assign to variable 
$sql = "SELECT * FROM adoptees" ;
$result = $dbConn->query($sql);

?>
<html>
    <head>
        <title>
            Lab 8
        </title>
        
         <link href="css/styles.css" rel="stylesheet" type="text/css"/>
           <meta charset="utf-8">
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <!--Navigation Bar Code-->
        <ul>
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="adoptions.php">Adoptions</a></li>
          <li><a href="#contact">About Us</a></li>
        </ul>
        
        <!--Text-->
        <center>
        <h1>CSUMB Animal Shelter</h1>
        The official adoption website of CSUMB
        
        <div>
            <table border="1" cellspacing="0" cellpadding="2" >
               <?php
                for($i=0; $row = $result->fetch(); $i++){
                ?>
                	<tr class="device">
                		<td><?php echo "Name: ".$row['name'];?><br>
                		    <?php  echo "Type: ". $row['type']; ?>
                		    <button class="button"> Adopt Me!</button>
                		      </td>
                		      
                		 <?php }?>
                	</tr>

                </table>
        </div>
        </center>
        
    </body>
</html>