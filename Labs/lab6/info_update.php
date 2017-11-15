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

?>
<html lang="en">
    <head>
          <meta charset="utf-8">
        <title>
            Update Info
        </title>
          <link href="css/styles.css" rel="stylesheet" type="text/css"/>
          
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
         <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

    </head>
<body class="container-fluid">
    

    <h1 align="center">
        Update Info 
    </h1>
    <div>
        <form method="post" id="update_info" class=jelly>
            Firstname: <input class="jelly" type="text" name="firstname"  value="<?php echo $_GET["first"] ?>"><br/>
            Lastname: <input class="jelly" type="text" name="lastname" value="<?php echo $_GET["last"] ?>"><br/>
            Email: <input class="jelly" type="text" name="email" value="<?php echo $_GET["email"] ?>"><br/>
             <input class="jelly" type="submit" name="updateBtn" value="update">
            <input class="jelly" type="submit" name="cancelBtn" value="cancel">
        </form>
    </div>

</body>
    
</html>

<?php

if(isset($_POST['updateBtn']))
{
     $update_sql = "UPDATE admin 
                    SET firstname = :newFirst,
                        lastname = :newLast,
                        email = :newEmail
                    WHERE id = :id ";
                    
    //Prepare our UPDATE SQL statement.
        $update_stmt = $dbConn->prepare($update_sql);
        
    //The Primary Key of the row that we want to update.
        $id =  $_GET["id"];
        //Bind our value to the parameter :id.
                    $update_stmt->bindValue(':id', $_GET["id"]);

        
         //bind 
                    $update_stmt->bindValue(':newFirst', $_POST['firstname']);
                    $update_stmt->bindValue(':newLast', $_POST['lastname']);
                    $update_stmt->bindValue(':newEmail', $_POST['email']);
        
        //execute 
                    $updateExec= $update_stmt->execute();
                     
                     
        if($updateExec)
                        {
                      
                        ?> Update Success<?php
                        sleep(1);
                        echo "<script>window.close();</script>";
         }
        else
        {
                        ?>Update Fail<?php
         }
                    $add_stmt=null;
   
}

if (isset($_POST['cancelBtn']))
{
    echo "<script>window.close();</script>";
}


?>