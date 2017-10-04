   <?php
         
        function random_number($number)
            {
                 $n = rand(0,6);  
              return $n ;
             };
            
            $n= random_number($number);
            
        switch($n)
            {
            
            case 0 : 
            
            include("result1.html");
            break;
             
             case 1 : 
            
            include("result2.html");
              break;
            
             case 2 : 
            
             include("result3.html");
              break;
            
             case 3 : 
            
             include("result4.html");
            
              break;
            
             case 4 : 
            
            include("result5.html");
              break;
            
             case 5 : 
            
            include("result6.html");
              break;
            
             case 6 : 
            
          include("result7.html");
              break;
            };
        ?>