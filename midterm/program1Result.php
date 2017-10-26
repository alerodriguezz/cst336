<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    
    
    <h1 align="center">
        Winter Vacation
    </h1>
    
    <body>
    
        <div id= "form" align="center">
            <form action="program1Result.html" method="get">
            <fieldset id="month">
             Select Month:<br/>
                 November<input type="radio" value="nov" name="month" required><br />
                 December<input type="radio" value="dec" name="month"><br />
                 January<input type="radio" value="jan" name="month"><br />
                 February<input type="radio" value="feb" name="month"><br />
            </fieldset>
            
            <fieldset id="numOflocations">
             How many locations would you like to visit:
            <select name="locationNum" required>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
              <option value="4">Four</option>
              <option value="5">Five</option>
              <option value="6">Six</option>
            </select> 
            </fieldset>
            
            <fieldset id="country">
                Which country would you like to visit: <br />
                <select name="country" required>
                      <option value="mexico">Mexico</option>
                      <option value="norway">Norway</option>
                      <option value="us">US</option>
       
            </select> 
                
            </fieldset>
            
              <fieldset id="az">
             Visit locations in alpabetical order?:<br/>
                 A-Z<input type="radio" value="az" name="A-Z" required><br />
                 Z-A<input type="radio" value="za" name="Z-A"><br />
             
            </fieldset>
               
            
               
            <button type="submit" action="program1Result.html"  value="Submit"  method="post">Create Itinerary</button>
            </form>
        
         </div>
         
        <div id="table">
                
                <?php 
                //set month days
                $month_selected= $_GET('month');
                $month_days;
                
                 switch($month_selected)
                 {
                     case nov:
                         $month_days=30;
                    break;
                    
                    case dec:
                         $month_days=31;
                    break;
                    
                    case jan:
                        $month_days=31;
                    break;
                    
                    case feb:
                        $month_days=28;
                         
                 }
                 ?>
                 
    <!-- this is where my calendar would have been displayed-->
                 <table>
                     <tr></tr>
                         <td></td>
                          <td></td>
                        <td></td>
                        <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                     <tr></tr>
                           <td></td>
                          <td></td>
                        <td></td>
                        <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                     <tr></tr>
                          <td></td>
                          <td></td>
                        <td></td>
                        <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                     <tr></tr>
                           <td></td>
                          <td></td>
                        <td></td>
                        <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                    <tr></tr>
                          <td></td>
                          <td></td>
                        <td></td>
                        <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                     <tr></tr>
                           <td></td>
                          <td></td>
                        <td></td>
                        <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                    <tr></tr>
                          <td></td>
                          <td></td>
                        <td></td>
                        <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                     
                     
                 </table>
                 
                
                
                
            </table>
            
            
        </div>
    
    
    </body>
</html>