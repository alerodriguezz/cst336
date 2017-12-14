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
            Login
        </h1>
        <div id="user_input" class="container-fluid">
            <center>
                 <form method="post">
                            Email: <input class="jelly" type="text" id="email" name="email" required minlength="1"><br>
                            Password: <input class="jelly" type="text" id="pass" name="pass" required minlength="1"><br>
                       
                   <input class="buttons" class="jelly" type="submit" id="loginBtn" name="loginBtn" value="Login">
                </form>
            </center>
        </div>
        
    </body>
</html>
<?php
//if submit button is clicked 
if (isset($_POST['loginBtn'])) {
    
    ?><script>console.log("button was clicked");</script><?php
    //check if both password inputs match
                $email= $_POST['email'];
                $pass= $_POST['pass'];
                //prepare query
                 $search_stmt = $dbConn->prepare("SELECT * FROM users WHERE email = '$email' AND password = '$pass' ");
                    
                    //execute 
                    $result= $search_stmt->execute();
                    
                     if(!empty($result) || $result->rowCount() > 0) {
                             ?> <script> console.log("user exists");</script><?php
                                          $add_stmt=null;
                                sleep(1);
                                header ( "location: home.php" );
                            }
                             else {
                              ?> <script> alert("user does not exist.");</script><?php
                        }
          
                    
}
?>

