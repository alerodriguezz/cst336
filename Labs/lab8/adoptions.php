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
        
        <!--table-->
        <div>
            <table border="1" cellspacing="5" cellpadding="2" >
               <?php
                for($i=0; $row = $result->fetch(); $i++){
                ?>
                	<tr cellpadding="10">
                		<td class="animal"><?php echo "Name: ".$row['name'];?><br>
                		    <?php  echo "Type: ". $row['type']; ?>
                		    <button type="button" class="btn btn-primary btn-lg" class="button" id="<?php echo $row['name'] ?>" data-toggle="modal" data-target="#myModal"> Adopt Me!</button>
                		    	 <?php }?>
                		      </td>
                	</tr>
                </table>
        </div>
        </center>
        
        <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Adopt</button>
                  </div>
                </div>
              </div>
            </div>
        
    </body>
</html>

<script>

</script>