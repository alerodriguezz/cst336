<?php
session_start();

if (!isset($_SESSION['history'])) {  //creates the session array if it doesn't exist yet
     $_SESSION['history'] = array();	
} 

?>
<html>
  <head>
       <link href="css/styles.css" rel="stylesheet" type="text/css"/>
       <meta charset="utf-8"/>
        <meta name="viewport" content="initial-scale=1.0">

       
                <!-- Bootsrtrap Stuff-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<body>
    <center>
    <h1>Simple Map Search</h1><br>
        <fieldset>
             <form method="post">
             Enter a Location: <input type="text" id="geocomplete" name="geocomplete">
        
        </form>
        </fieldset>
       
    <?php   if (!in_array($_POST['geocomplete'], $_SESSION['history'])) { //checks whether item is in array
   $_SESSION['history'][] = $_POST['geocomplete'];
   echo "You searched ". $_POST['geocomplete'];
}

?>
       
        <div id="map" class="jelly"></div>
        <div id="infowindow-content">
          <img src="" width="16" height="16" id="place-icon">
          <span id="place-name"  class="title"></span><br>
          <span id="place-address"></span>
        </div>

     <script>
     
     //boolean value to check if input was valid 
     var valid=false;
     
     //initlializes map
function initMap() {
        var address;
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });

        var autocomplete = new google.maps.places.Autocomplete(document.getElementById("geocomplete"));

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        //passes autocomplete data to anchor pop pup
        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });
        
        //checks if the input was a valid address 
        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            valid=true;
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }
          
       //place info in anchor pop-up
          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });
        

}
/*
if (valid==true)
{
  
    
}
  */          
</script>


   
    </center>
</body>

</html>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8yJ-h6PCeiIbnLgfwy4wT1i-csz1LsIg&libraries=places&callback=initMap"></script>