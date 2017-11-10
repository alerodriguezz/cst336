
<html>
    
    <head>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <h1 align="center">
        Log-In Page
    </h1>
    <body>
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