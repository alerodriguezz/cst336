
<html lang="en">
    
    <head>
        
         <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
          <meta charset="utf-8">
    </head>
    <h1 align="center">
        Log-In Page
    </h1>
    <body class="container-fluid">
        <div id="credentials" align="center">
            <form method="get">
                      Usernmame: <input type="text" class="jelly" name="userName" required minlength="1"><br>
                      Password: <input type="password" class="jelly" name="pass" required minlength="1"><br>
                                                                                              
                      <input type="submit" class="jelly" name="submitBtn"value="login">
            </form>
        </div>
    </body>
    
    
</html>

<?php

if(isset($_GET['submitBtn']))
{   //checks credentials
     if($_GET['userName']=="admin"&&$_GET['pass']=="s3cr3t") {
         
       header("Location: admin.php");
    exit;
     }
     
    //if wrong credentials error message is dispayed
    
    echo "<script type='text/javascript'>alert('Invalid username or password. Please Try Again');</script>";
  
}


?> 