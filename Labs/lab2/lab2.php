
<html>
     <head>
        <title>
            Lab 2
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
    
    <?php
    
    
         //Outputs the generated source code
        
 $m = rand(0,3);  

 switch ($m) {
    case 0:
        echo '<img  class="Boxes" src="images/cat.jpg">';
        break;
    case 1:
        echo '<img  class="Boxes" src="images/frog.jpg">';
        break;
    case 2:
        echo '<img class="Boxes" src="images/sloth.jpg">';
        break;
    case 3:
        echo '<img  class="Boxes" src="images/wiener_dog.jpg">';
}

 $e = rand(0,3);  
    
 switch ($e) {
    case 0:
        echo '<img  class="Boxes" src="images/cat.jpg">';
        break;
    case 1:
        echo '<img  class="Boxes" src="images/frog.jpg">';
        break;
    case 2:
        echo '<img class="Boxes" src="images/sloth.jpg">';
        break;
    case 3:
        echo '<img  class="Boxes" src="images/wiener_dog.jpg">';
}
        
 $o= rand(0,3);  
 switch ($o) {
    case 0:
        echo '<img  class="Boxes" src="images/cat.jpg">';
        break;
    case 1:
        echo '<img  class="Boxes" src="images/frog.jpg">';
        break;
    case 2:
        echo '<img class="Boxes" src="images/sloth.jpg">';
        break;
    case 3:
        echo '<img  class="Boxes" src="images/wiener_dog.jpg">';
}

if ($m==$e&&$e==$o)
{
  $winner++;
}
         echo "Match= " . $winner;
        
        
?>
     
         

</html>