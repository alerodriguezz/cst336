<?php
 //connect to database 
$servername = "localhost";
$username = getenv('USERNAME');
$password = getenv('PASSWORD');
$dbname = "lab6";
//connect
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
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <h1 align="center">
        Admin
    </h1>
    <div id="add_del">
            <form method="post" class="jelly">
                <fieldset id="add" class="jelly">
                    <h2>Add Users</h2>
                        Firstname: <input class="jelly" type="text" name="firstname" required minlength="1"><br>
                        Lastname: <input class="jelly" type="text" name="lastname" required minlength="1"><br>
                        Email: <input class="jelly" type="text" name="email" required minlength="1"><br>
                        <input type="submit" name="addBtn" value="add">
                         <input type="submit" name="deleteBtn" value="delete">
                </fieldset>
            </form>
    </div>
    <div id ="updateBtn" align="center">
                <button>Update</button>
                
     </div>
            
     <div id="table" align="center">
                <table border="1" cellspacing="0" cellpadding="2" >
                <thead>
                	<tr>
                		<th> ID </th>
                		<th> Firstname </th>
                		<th> Lastname </th>
                		<th> Email </th>
                	</tr>
                </thead>
                <tbody>
               
               <?php
                for($i=0; $row = $result->fetch(); $i++){
                ?>
                	<tr class="device">
                		<td><?php echo $row['id']; ?></td>
                	<td><a href="javascript:void(0);" onClick=window.open("info.php","Ratting","width=550,height=170,0,status=0,");><?php echo $row['firstname']; ?></a></td>
                		<td><?php echo $row['lastname']; ?></td>
                		<td><?php echo $row['email']; ?></td>
                	</tr>
                	<?php
                		}
                	?>
                </tbody>
                </table>
        </div>
        
    
      <center><a href="login.php" align="center"><button>Log Out</button></a></center>
</html>
<?php

//if add button is pressed 
if (isset($_POST['addBtn'])) {
                //prepare query
                 $add_stmt = $dbConn->prepare("INSERT INTO admin (firstname, lastname, email)
                         VALUES (:firstname, :lastname, :email)");
                         
                    //bind 
                    $add_stmt->bindParam(':firstname', $_POST['firstname']);
                    $add_stmt->bindParam(':lastname', $_POST['lastname']);
                    $add_stmt->bindParam(':email', $_POST['email']);
                    
                    //execute 
                    $addExec= $add_stmt->execute();
                     
                      if($addExec)
                        {
                            $message = "add success";
                        ?> "<script type='text/javascript'>alert('$message');</script>"<?php
                        }else{
                            $message = "error adding";
                        ?><script type='text/javascript'>alert('$message');</script>"<?php
                        }
                    $add_stmt-null;
                    header('location:admin.php');
}

//if delete button is pressed 
if (isset($_POST['deleteBtn'])) {
              
             //prepare query
                     $deleteStmt = $dbConn->prepare('DELETE FROM admin WHERE firstname = :id');
                          
            //execute
                      $delExec= $deleteStmt->execute(array(':id'=> $_POST['firstname'] ));
                     
                      if($delExec)
                        {
                            $message = "delete success";
                        ?> "<script type='text/javascript'>alert('$message');</script>"<?php
                        }else{
                            $message = "error deleting";
                        ?><script type='text/javascript'>alert('$message');</script>"<?php
                        }
   
               $del_stmt=null;
                         
               header('location:admin.php');
                    
}

$dbConn = null;
?>