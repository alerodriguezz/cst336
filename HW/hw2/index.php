<!DOCTYPE html>
<html>
    <head>
        <title>hw 2 </title>
        
         <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="gradient">
        <h1 align="center">Where will you travel today?</h1>
        
        <div align="center">
             <img id="collage" src= "img/collage.jpg" align="center" width=800px height=400px  />
             
             
             <figcaption>A collage of the seven wonders of the ancient world.</figcaption>
        </div>
        
        <div align="center">
        
        <! button  code -->
        <form method="post" action="submit.php">
             <img id="world" src= "img/world.png" align="center" width=100px height=100px  />
        <input class="wiggle" value="Click to find out" type="submit" name='go'/>
        </form>
        
         </div>
         
         <! description -->
         <div align="center">
             <p id="description"> Can't decide where to travel? Click the button and this website will randomly <br>
             suggest an exciting location for you. 
                 
             </p>
             
         </div>
         
         <div id="wonders" align="center">
             <?php
                    $wonders= array("Colossus of Rhodes",
                            "Great Pyramid of Giza",
                            "Hanging Gardens of Babylon",
                            "Lighthouse of Alexandria",
                            "Mausoleum at Halicarnassus",
                            "Statue of Zeus at Olympia",
                            "Temple of Artemis at Ephesus"
                            );
                            
                    array_reverse($wonders);
                    asort($wonders);
                            
                    for ($i=0;$i<count($wonders);$i++)
                    {
                        echo $wonders[$i]. ", ";
                    }
                     echo "\n";
                       for ($i=0;$i<count($wonders);$i++)
                    {
                        echo "There are " . $i. " wonders ";
                    }
                    ?>
                    
                    
         </div>
         
    </body>
   
    <! footer code -->
    <div align="center">
     <footer class="footer" align="center" >
        
        <hr> 
        2017 &copy 
        This website is for academic purposes only
        <br>
        <a href="index.html">Home</a>
    </footer>
    </div>
</html>