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
            TabTrack
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
    
    <body class="container-fluid home_body">
        
            <center>
                <div id="home_header" align="center">
                    <h1>Sessions</h1>
                </div>
            </center>
            

            
          <button id="newSession" class="newSession" onclick="newSession();">
                 <div>
                     <p>+</p><br>
                      <h2>new session</h2>
                </div>
         </button>
    
</html>

<script>

console.log(sessionStorage.getItem("url"));

    function newSession() {
    console.log("new session...")
     // create a new div element 
    var newSesh = document.createElement("button");
    // and give it some content 
  var newContent = document.createTextNode("Session Info"); 
  // add the text node to the newly created div
  newSesh.appendChild(newContent);
  newSesh.className = "newSession";
  newSesh.setAttribute("id", "aSession");
   
// add the newly created element and its content into the DOM 
  var currentDiv = document.getElementById("newSession"); 
   document.body.appendChild(newSesh, currentDiv); 
   
   
   
   //this would have been the code that retrieves user session info 
var querying = browser.tabs.query({currentWindow: true});
querying.then(logTabs, onError);

//then everytime the user clicks a button, this function would retrieve all existing tab session info

console.log("done.");
}

  function logTabs(tabs) {
  for (let tab of tabs) {
    // tab.url requires the `tabs` permission
    console.log(tab.url);
  }
}


function onError(error) {
  console.log("Error: ${error}");
}


 	

</script>

  