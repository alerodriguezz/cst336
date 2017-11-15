

<?php


//env variables
$USERNAME= getenv('USERNAME');
$PASSWORD= getenv('PASSWORD');

//Step1 Connect to database 
$dbConn = new PDO("mysql:host=localhost;dbname=tech_checkout", $USERNAME, $PASSWORD);
         
// Setting Errorhandling to Exception
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 


//write sql query and assign to variable 
$sql = "SELECT * FROM device";
$result = $dbConn->query($sql);

?>

<head>
    <title>
        lab5
    </title>
</head>

<h1 align="center">
    lab5
</h1>

<body>
    
            
            <div align="center">
                <table border="1" cellspacing="0" cellpadding="2" >
                <thead>
                	<tr>
                		<th> Device ID </th>
                		<th> Device Name </th>
                		<th> Device Type </th>
                	</tr>
                </thead>
                <tbody>
               
               <?php
                for($i=0; $row = $result->fetch(); $i++){
                ?>
                	<tr class="device">
                		<td><?php echo $row['deviceId']; ?></td>
                		<td><?php echo $row['deviceName']; ?></td>
                		<td><?php echo $row['deviceType']; ?></td>
                	</tr>
                	<?php
                		}
                	?>
                </tbody>
                </table>
            </div>
</body>