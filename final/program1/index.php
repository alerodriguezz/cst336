<?php

 //connect to database 
$servername = "localhost";
$username = getenv('USERNAME');
$password = getenv('PASSWORD');
$dbname = "final";
//connect
//Step1 Connect to database 
$dbConn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
         
// Setting Errorhandling to Exception
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

//write sql query and assign to variable 
$display_sql = "SELECT * FROM superhero";
$result = $dbConn->query($display_sql);

?>

<html>
<head>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
          <meta charset="utf-8">
          
            <meta name="viewport" content="width=device-width, initial-scale=1">
            
             <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            
            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            
            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
            
            <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
</head>
<body class-"container-fluid">
    <center>
        <!--Header-->
        <h1>
            What is the real name of the following superhero?
        </h1>
        
        <!-- Random Image Displayed -->
        <?php   
        //generate random number
        
           $pizza= rand (0,15);   
           
           //array that will story hero names 
           
           $heroes=array();
        
        //based of random number, retrieve an image from database
        $display_sql = "SELECT * FROM superhero";
        $result = $dbConn->query($display_sql);

         for($i=0; $row = $result->fetch(); $i++){
             //this displays image 
             if ($i==$pizza){
                 
              ?><img src='img/superheroes/<?php echo $row['image']; ?>.png'><?php
              
                     ?><script>
                     //this is for later ;)
                     var pictureName="<?php echo $row['name'];?>";
                     
                     </script><?php
            
             }
             
             //names stored here
            array_push($heroes, $row['name']);
         }  ?>
         
         <form class="jelly">
                <select id="heroes" name="heroes" required>
                          <option value="">None</option>
                         <?php for($i=0;$i<count($heroes);$i++){ ?>
                         
                         <option value="<?php echo $heroes[$i]; ?>"><?php echo $heroes[$i]; ?></option>
                          <?php }  ?>
                            
                    </select> 
                      <button class="jelly" id="check" onclick="checkAnswer();" name="check">Check Answer </button>
         </form>
       
        
    </center>
    
     <div class="alert" id="wrong">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          Incorrect
    </div>
    
    <div class="ding" id="right">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          Correct
    </div> 
    
</body>


                            <p>In this program, you will display a random superhero from the database. The user should be able to select the "real name" of the superhero (e.g., "Bruce Wayne" for "Batman"). <br> Your program
                                must provide feedback whether the answer was correct or incorrect. <br> Your program must also display how many times users have answered the real name for a specific superhero correctly and incorrectly (using AJAX)<br>
                            </p>
                            <p><a href="http://itcdland.csumb.edu/~milara/cst336/final/superheroes/program1.php" target="_blank"><strong>Program 1 Sample</strong></a><br>
                            </p>
                            <p><strong>
                      Notes:</strong> <br> a) You will use the "superhero" table, which contains duplicated records.<br> b) You will need to create another table to keep track of the times users have answered the real name for each superhero
                                correctly and incorrectly (you decide the table structure)
                            </p>
                            <p><br> Once you finish, come back here and click on the "Copy Rubric" button below. <br> Then press CTRL+C to copy the rubric HTML code into the clipboard. <br> Paste it at the bottom of your program and <b>update the background color</b>                                of the items you've completed. If you're unsure about an item, use white background.<br><br>
                                <input value="Copy Rubric" id="rubric2Btn" class="rubricBtn" type="button">
                            </p>
                            <p></p>
                            <textarea id="rubric2_TA" rows="30" cols="90">    </textarea>


                            <div id="rubric2Div">
                                <table width="600" cellpadding="10px" border="1">
                                    <tbody><tr>
                                        <th>#</th>
                                        <th>Task Description</th>
                                        <th>Points</th>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>1</td>
                                        <td>A random image of a superhero is displayed when refreshing the page <br></td>
                                        <td width="20" align="center">10</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>2</td>
                                        <td>
                                            <p>The "real names" of the superheroes in the dropdown menu come from the database (without duplicates and in alphabetical order) <br>
                                            </p>
                                        </td>
                                        <td width="20" align="center">10</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>3</td>
                                        <td>An error message is displayed if the user clicks on the "Check Answer" button without selecting anything. <br></td>
                                        <td width="20" align="center">5</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>4</td>
                                        <td>The right color-coded feedback (correct or incorrect) is displayed upon clicking on the "Check Answer" button <br></td>
                                        <td width="20" align="center">15</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>5</td>
                                        <td>The number of times the real name for the specific superhero has been answered correctly and incorrectly is stored in the database, via AJAX (you'll need to create a new table, you decide the structure)<br></td>
                                        <td width="20" align="center">15</td>
                                    </tr>

                                    <tr style="background-color:#FFC0C0">
                                        <td>6</td>
                                        <td>The updated number of times for total of correct and incorrect answers (for the specific superhero) is displayed, via AJAX <br></td>
                                        <td width="20" align="center">10</td>
                                    </tr>

                                    <tr style="background-color:#FFC0C0">
                                        <td>7</td>
                                        <td>The spinning images (indicating that data is being loaded) are displayed and replaced when the data is retrieved, via AJAX</td>
                                        <td width="20" align="center">5</td>
                                    </tr>

                                    <tr style="background-color:#99E999">
                                        <td>8</td>
                                        <td>This rubric is properly included AND UPDATED</td>
                                        <td width="20" align="center">2</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>T O T A L </td>
                                        <td width="20" align="center">&nbsp;</td>
                                    </tr>
                                </tbody></table>
                            </div> <br><br>
                        
</html>

<script>

function checkAnswer() {
    console.log("checking...");
    
    
    //get data from dropdown
    var e = document.getElementById("heroes");
    var userChoice = e.options[e.selectedIndex].value;
    
    console.log("User choice...."+userChoice);
    
    console.log("Answer..."+pictureName);
    
    if (userChoice!=pictureName)
    {
         $( "#wrong" ).toggle();
    }
    else{
         $( "#right" ).toggle();
    }
    
}

//Ajax call would go here.....
    
    
</script>
