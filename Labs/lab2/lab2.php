<?php

 $n = rand(0,3);  

 switch ($n) {
    case 0:
        echo '<img src="images/cat.jpg">';
        break;
    case 1:
        echo '<img src="images/frog.jpg">';
        break;
    case 2:
        echo '<img src="images/sloth.jpg">';
        break;
    case 3:
        echo '<img src="images/wiener_dog.jpg">';
}