<?php
//env variables
$USERNAME= getenv('USERNAME');
$PASSWORD= getenv('PASSWORD');

//Step1 Connect to database 
$dbConn = new PDO("mysql:host=localhost;dbname=final_project", $USERNAME, $PASSWORD);
         
// Setting Errorhandling to Exception
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>


<html>
    <head>
        <title>
            Contact Form 
        </title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
         <link href="css/styles.css" rel="stylesheet" type="text/css"/>
         
             <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            
            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            
            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        
    </head>
    <body class="container-fluid">
        <h1 align="center" >
            Sign-Up
        </h1>
        <div id="user_input" class="container-fluid">
            <center>
                 <form method="post">
                            Email: <input class="jelly" type="text" id="email" name="email" required minlength="1"><br>
                            Password: <input class="jelly" type="password" id="pass" name="pass" required minlength="1"><br>
                            Re-Enter Password: <input class="jelly" type="password" id="rePass" name="rePass" required minlength="1"><br>
                       
        
                   <input class="buttons" class="jelly" type="submit" name="submitBtn" id="submitBtn" value="Sign Up">
                </form>
            </center>
        </div>
        
    </body>
</html>

<?php 


//if submit button is clicked 
if (isset($_POST['submitBtn'])) {
    
    ?><script>console.log("button was clicked");</script><?php
    //check if both password inputs match

    if ($_POST['rePass']==$_POST['pass']){


                ?><script> console.log("adding user...");</script><?php
                //prepare query
                 $add_stmt = $dbConn->prepare("INSERT INTO users (email, password)
                         VALUES (:email, :password)");
                         
                    //bind
                    $add_stmt->bindParam(':email', $_POST['email']);
                     $add_stmt->bindParam(':password', $_POST['pass']);
                    
                    //execute 
                    $addExec= $add_stmt->execute();
                     
                      if($addExec)
                        {
                            $message = "add success";
                        ?> <script type='text/javascript'>alert('$message');</script>"<?php
                        }else{
                            $message = "error adding";
                        ?><script type='text/javascript'>alert('$message');</script>"<?php
                        }
                    $add_stmt=null;
                    sleep(1);
                    header('location:login.php');
}

    //else 
    else{
        ?><script>alert("passwords do not match");</script><?php
}


}


?>