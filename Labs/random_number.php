<?php

//Top Row 
echo  "______" . "<br>";
 echo "|  Number  |" . "  Odd/Even  |" . "<br>";
 echo "--------   " . "<br>";
 
 //odd or even function
function odd_or_even($number)
{
 return ($number % 2 == 0)?"even":"odd";

};
 //Loop Magic
for ($i=0; $i<=9; $i++)
{
    $n = rand(0,100000000);     //random number function 
     
	   echo "| ". $n . "|". odd_or_even($n). "<br>"; //displays values from 0 to 5
 }