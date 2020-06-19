<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Lay toa do</title>
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

  <link rel="stylesheet" type="text/css" href="frm/view.css" media="all">
  <script type="text/javascript" src="frm/view.js"></script>



</head>
<body id="main_body" >




  <div id="frm">

    <img id="top" src="/frmtop.png" alt="">
    <div id="form_container">

      <h1><a>Thêm địa điểm vào bản đồ</a></h1>
      <form id="form_656714" class="appnitro"  method="post" action="xl.php">
        <div class="form_description">
          <h2>Thêm địa điểm vào bản đồ</h2>
        </div>            
        <ul >

          <li id="li_3" >
            <label class="description" for="element_3">Lat </label>
            <div>
              <input id="element_3" name="lat" class="element text medium" type="text" maxlength="255" value=""/> 
            </div> 
          </li>

          <li id="li_4" >
            <label class="description" for="element_4">Long </label>
            <div>
              <input id="element_4" name="lng" class="element text medium" type="text" maxlength="255" value=""/> 
            </div> 
          </li>


          <li id="li_1" >
            <label class="description" for="element_1">Tên địa điểm </label>
            <div>
              <input id="element_1" name="ten" class="element text medium" type="text" maxlength="255" value=""/> 
            </div> 
          </li>
          <li id="li_2" >

            <label class="description" for="element_2">Mô tả địa điểm </label>
            <div>
              <textarea id="element_2" name="note" class="element textarea medium"></textarea> 
            </div>
            <p class="guidelines" id="guide_2"><small>Bạn hãy ghi những điểm hay nổi bật của địa điểm, cũng như những điều cần lưu ý về địa điểm này ví dụ như giờ làm việc, phải liên hệ trước,...</small></p> 
          </li>

          <li class="buttons">
            <input type="hidden" name="form_id" value="656714" />
            
            <input id="saveForm" class="button_text" type="submit" name="submit" value="Thêm" />
          </li>
        </ul>
    </form> 
    <div id="footer">
      <h3>By Hoclaptrinhonlin.com - 2013</h3>
    </div>
  </div>
  <img id="bottom" src="frm/bottom.png" alt="">



</div>
<input type="button" value="getValues" id="getValues" />
<div id="map"></div>


<script type="text/javascript" charset="utf-8" async defer>
jQuery(document).ready(function($) {


  (function() {

    window.onload = function() {

    // Creating a MapOptions object with the required properties
    // var options = {
    //   zoom: 17,
    //   center: new google.maps.LatLng(21.0098, 105.811),
    //   mapTypeId: google.maps.MapTypeId.ROADMAP
    // };
var options= {
  center:new google.maps.LatLng(21.025780,105.811385),
  zoom:9,
};
    
    // Creating the map  
    var map = new google.maps.Map(document.getElementById('map'), options);
    
    // Attaching click events to the buttons
    
    // Getting values
    document.getElementById('getValues').onclick = function() {
      alert('Current Zoom level is ' + map.getZoom());
      alert('Current center is ' + map.getCenter());
      alert('The current mapType is ' + map.getMapTypeId());
    }

    google.maps.event.addListener(map, "rightclick", function(event) {
      var lat = event.latLng.lat();
      var lng = event.latLng.lng();
    // populate yor box/field with lat, lng
    alert("Lat=" + lat + "; Lng=" + lng);
    $('#element_3').val(lat);
    //$("#element_3").attr("disabled", "disabled");    

    $('#element_4').val(lng);
    //$("#element_4").attr("disabled", "disabled");    

/*$.ajax({
  type: 'POST',
  url: 'xl.php',
  data: {'variable': 'myval'},
});
    */

    //$.get("xl.php", {"lat": lat, "lng":lng, "ten":});



  });

  };
})();


});
  </script>

</body>
</html>