<?php
include("ketnoi.php");
$sql = "select * from vitri";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["date"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Marker Clustering</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: 20.9246022, lng: 104.9969083}
        });

        // Create an array of alphabetical characters used to label the markers.
        var labels = 'ABCDEFGHI';

        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        var markers = locations.map(function(location, i) {
          return new google.maps.Marker({
            position: location,
            label: labels[i % labels.length]
          });
        });

        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      }
      var locations = [
        {lat: 21.046733, lng: 105.788150},
        {lat: 21.045936, lng: 105.785581},
        {lat: 21.045525, lng: 105.782234},
        {lat: 21.046666, lng: 105.779144},
        {lat: 21.048278, lng: 105.775861},
        {lat: 21.050591, lng: 105.772117},
        {lat: 21.068633, lng: 105.761742},
        {lat: 21.069754, lng: 105.763094},
        {lat: 21.068593, lng: 105.762976}
        
      ]
    </script>
    <!-- Replace following script src -->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclustererplus@4.0.1.min.js">
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDX4sSXD8RHHuDN0AwoECksIURo62g7YrY&callback=initMap">
    </script>
  </body>
</html>