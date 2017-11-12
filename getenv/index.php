


<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
<?php
    /** 
     * 1. Modify ~/.bashrc to execute the file in this folder called .env
     *    1.1. Open the .bashrc file by running "c9 ~/.bashrc" at the terminal
     *    1.1. Add the line, ". /workspace/Examples/getenv/.env" at the top of the file,
     *         close and save
     * 2. Reload the shell by running ". ~/.bashrc" from the terminal
     */
    
    $test= getenv("TEST_JASON");
    
    echo "Stored ENV (TEST_JASON): $test";
    
   // else
   // {echo "failed";}
    
    
?>
    </body>
</html>