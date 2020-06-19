<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Complex Marker Icons</title>
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
	<p>Đây là bản đồ</p>
	<div id="map"></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

      // The following example creates complex markers to indicate locations near
      // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
      // to the base of the flagpole.

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
          center: {lat: 20.9246022, lng: 104.9969083}
        });
		$.ajax('/mp/api/get_locations.php', {
       // type: 'GET',  // http method
        dataType: 'json',
	//	data : {}
        success: function (data, status, xhr) {
			var ls = []; 
			data.data.map(item=>{
				ls.push([item.name,parseFloat(item.lat),parseFloat(item.lon)])
				
			});
			console.log(ls);
			setMarkers(map,ls);
        },
        error: function (jqXhr, textStatus, errorMessage) {
                console.log('Error' + errorMessage);
        }
      });
      }

      // Data for the markers consisting of a name, a LatLng and a zIndex for the
      // order in which these markers should display on top of each other.
     
      function setMarkers(map,locations) {
        // Adds markers to the map.

        // Marker sizes are expressed as a Size of X,Y where the origin of the image
        // (0,0) is located in the top left of the image.

        // Origins, anchor positions and coordinates of the marker increase in the X
        // direction to the right and in the Y direction down.
        var image = {
          url: 'icon/Circled/16x16/Restaurant_ForkKnife_Parallel_Circle_Blue.png',
          // This marker is 20 pixels wide by 32 pixels high.
          size: new google.maps.Size(20, 32),
          // The origin for this image is (0, 0).
          origin: new google.maps.Point(0, 0),
          // The anchor for this image is the base of the flagpole at (0, 32).
          anchor: new google.maps.Point(0, 32)
        };
        // Shapes define the clickable region of the icon. The type defines an HTML
        // <area> element 'poly' which traces out a polygon as a series of X,Y points.
        // The final coordinate closes the poly by connecting to the first coordinate.
        var shape = {
          coords: [1, 1, 1, 20, 18, 20, 18, 1],
          type: 'poly'
        };
        for (var i = 0; i < locations.length; i++) {
          var location = locations[i];
          var marker = new google.maps.Marker({
            position: {lat: location[1], lng: location[2]},
            map: map,
            icon: image,
            shape: shape,
            title: location[0],
            zIndex: location[3]
          });
        }
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDX4sSXD8RHHuDN0AwoECksIURo62g7YrY&callback=initMap">
    </script>
  </body>
</html>