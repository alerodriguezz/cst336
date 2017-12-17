<?php
//disclaimer.........only works on c9....because of the env variables
//env variables
$USERNAME= getenv('USERNAME');
$PASSWORD= getenv('PASSWORD');

//Step1 Connect to database 
$dbConn = new PDO("mysql:host=localhost;dbname=tech_checkout", $USERNAME, $PASSWORD);
         
// Setting Errorhandling to Exception
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 


$filter =  $_COOKIE['filter'];

switch($filter){
    case deviceId:
       $sql="SELECT * FROM device
        ORDER BY deviceId";
        break;
    case deviceName:
           $sql="SELECT * FROM device
        ORDER BY deviceName";
        break;
    case deviceType:
        //type query
        $sql="SELECT * FROM device
        ORDER BY deviceType";
        break;
    case price:
          $sql="SELECT * FROM device
        ORDER BY price";
        break;
    case status:
            $sql="SELECT * FROM device
        ORDER BY status"; 
        break;
    default:
        // //write sql query and assign to variable 
        //default query
        $sql = "SELECT * FROM device" ;
}
$result = $dbConn->query($sql);

?>
<html>
<head>
    <title>
        lab5
    </title>
         <link href="css/styles.css" rel="stylesheet" type="text/css"/>
           <meta charset="utf-8">
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<h1 align="center">
    lab5
</h1>

<body>
     <div align="center">
      <form method="post" align="center">
          Filter by: 
          	   <select name="filter" id="filter">
          	      <option value=""> None </option>
          	      <option value="deviceId"> ID </option>
          	   	  <option value="deviceName"> Name </option>
          	   	  <option value="deviceType"> Type </option>
          	   	  <option value="price"> Price </option>
          	   	  <option value="status"> Status </option>
          	   </select>
         
         </form>
        </div>
            <div align="center">
                <table border="1" cellspacing="0" cellpadding="2" >
                    <thead>
                    	<tr>
                    		<th> Device ID </th>
                    		<th> Device Name </th>
                    		<th> Device Type </th></button>
                    		<th> Price </th>
                        	<th> Status </th>
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
                		<td><?php echo $row['price']; ?></td>
                		<td><?php echo $row['status']; ?></td>
                		
                	</tr>
                	<?php
                		}
                	?>
                </tbody>
                </table>
            </div>
</body>
</html>

<script>
   
     $(document).ready(function(){ /* PREPARE THE SCRIPT */
    $("#filter").change(function(){
        console.log("selected option...");/* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
      var query = $(this).val(); /* GET THE VALUE OF THE SELECTED DATA */
      var dataString = "filter="+query; /* STORE THAT TO A DATA STRING */
            console.log(dataString);
            document.cookie=dataString;
      $.ajax({ /* THEN THE AJAX CALL */
        type: "POST", /* TYPE OF METHOD TO USE TO PASS THE DATA */
        url: "index.php", /* PAGE WHERE WE WILL PASS THE DATA */
        data: dataString, /* THE DATA WE WILL BE PASSING */
        success: function(result){ /* GET THE TO BE RETURNED DATA */
          //$("#show").html(result); /* THE RETURNED DATA WILL BE SHOWN IN THIS DIV */
            window.location.href="index.php?"+dataString;
        }
      });

    });
  });    
  
//       function getQueryVariable(variable)
//                 {
//                       var query = window.location.search.substring(1);
//                       var vars = query.split("&");
//                       for (var i=0;i<vars.length;i++) {
//                               var pair = vars[i].split("=");
//                               if(pair[0] == variable){return pair[1];}
//                       }
//                       return(false);
//                 }
  
//   if (getQueryVariable("filter")!=false)
//   {   var pizza= getQueryVariable("filter");
//       console.log(pizza + " has been recieved.");
//       document.cookie = "filter="+pizza;
//   }
  
  
</script>