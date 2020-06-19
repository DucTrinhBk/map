
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/star.css">
<link href="http://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">
</head>
<body>

  <div class="container">
    <h2 class="text-center">Thêm địa điểm</h2>

    <div>
      <div class="form-group form-inline">
        <label class="control-label col-sm-2 " style="display: inline-block;">Tên người đăng :</label>
        <input type="text" class="form-control col-sm-10" id="user" placeholder="Nhập tên người đăng" name="nameuser" required>
      </div>
      <div class="form-group form-inline">
        <label class="control-label col-sm-2 " style="display: inline-block;">Tên quán:</label>
        <input type="text" class="form-control col-sm-10" id="quan" placeholder="Nhập tên quán" name="namequan" required>
      </div>
      <div class="form-group form-inline">
        <label class="control-label col-sm-2" style="display: inline-block;">Website của quán:</label>
        <input type="text" class="form-control col-sm-10" id="web" placeholder="Nhập Website của quán" name="web" required>
      </div>
      <div class="form-group form-inline">
        <label class="control-label col-sm-2" style="display: inline-block;">Địa chỉ:</label>
        <input type="text" class="form-control col-sm-10" id="diachi" placeholder="Nhập Địa chỉ Website của quán" name="diachi" required>
      </div>
      <div class="form-group form-inline">
        <label class="control-label col-sm-2" style="display: inline-block;">Nhận xét:</label>
        <input type="text" class="form-control col-sm-10" id="nhanxet" placeholder="Nhập nhận xét" name="nhanxet" required>
      </div>
      <input type="hidden" id="lat" value="0"/>
      <input type="hidden" id="long" value="0"/>
      <div class="form-group form-inline">
        <label class="control-label col-sm-2" style="display: inline-block;">Vị trí:</label>

        <div id="demo" class="col-sm-10"><button type="button" class="btn btn-outline-warning" onclick="getLocation()" required>Cập nhật vị trí</button>
          <hr>
          <div id="mapholder"></div>
        </div>
        
      </div>
      <div class="form-group form-inline">
        <label class="control-label col-sm-2" style="display: inline-block;">Đánh giá:</label>

        <div class="cont">
          <div id="form-star" class="stars">
              <input class="star star-5" id="star-5-2" type="radio" name="star"/>
              <label class="star star-5" for="star-5-2"></label>
              <input class="star star-4" id="star-4-2" type="radio" name="star"/>
              <label class="star star-4" for="star-4-2"></label>
              <input class="star star-3" id="star-3-2" type="radio" name="star"/>
              <label class="star star-3" for="star-3-2"></label>
              <input class="star star-2" id="star-2-2" type="radio" name="star"/>
              <label class="star star-2" for="star-2-2"></label>
              <input class="star star-1" id="star-1-2" type="radio" name="star"/>
              <label class="star star-1" for="star-1-2"></label>
          </div>
        </div>
      </div>
      <div class="form-group form-inline">       
        <button id="upload" class="btn btn-warning btn-block btn-lg" onclick="submit()">Submit</button> 
     </div>
   </div>
 </div>

<script>
  (function(i,s,o,g,r,a,m){
    i['GoogleAnalyticsObject']=r;
    i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},
    i[r].l=1*new Date();
    a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];
    a.async=1;
    a.src=g;
    m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46156385-1', 'cssscript.com');
  ga('send', 'pageview');

</script>

 <script src="https://maps.google.com/maps/api/js?key=AIzaSyDX4sSXD8RHHuDN0AwoECksIURo62g7YrY&sensor=false"></script> 

<script>
  //lấy vị trí người sử dụng
var x = document.getElementById("demo");
function getLocation() {
if (navigator.geolocation) {
navigator.geolocation.getCurrentPosition(showPosition, showError);
} else {
x.innerHTML = "Geolocation không được hỗ trợ bởi trình duyệt này.";
}
}

function showPosition(position) {
lat = position.coords.latitude;
lon = position.coords.longitude;
$("#lat").val(lat);
$("#long").val(lon);
latlon = new google.maps.LatLng(lat, lon)
mapholder = document.getElementById('mapholder')
mapholder.style.height = '250px';
mapholder.style.width = 'autu';

var myOptions = {
center:latlon,zoom:14,
mapTypeId:google.maps.MapTypeId.ROADMAP,
mapTypeControl:false,
navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
}

var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
var marker = new google.maps.Marker({position:latlon,map:map,title:"You are here!"});

}

function submit()
{
  var name = $('#user').val();
 var quan = $('#quan').val();
var web = $('#web').val();
var diachi = $('#diachi').val();
var nhanxet = $('#nhanxet').val();
var lat = $("#lat").val();
var lon = $('#long').val();
var radioButtons = $("#form-star input:radio[name='star']");
var selectedIndex = radioButtons.index(radioButtons.filter(':checked'));
var danhgia = (5 - selectedIndex)%6;

$.ajax('/mp/api/insert_new_location.php', {
        type: 'POST',  // http method
        dataType: 'json',
        data: {
          name: name,
          quan: quan,
          web:web,
          diachi: diachi,
          nhanxet: nhanxet,
          danhgia: danhgia,
          lat: lat,
          long: lon
        },  // data to submit
        success: function (data, status, xhr) {
            console.log(data);
        },
        error: function (jqXhr, textStatus, errorMessage) {
                console.log('Error' + errorMessage);
        }
      });
}


function showError(error) {
switch(error.code) {
case error.PERMISSION_DENIED:
x.innerHTML = "Người sử dụng từ chối cho xác định vị trí."
break;
case error.POSITION_UNAVAILABLE:
x.innerHTML = "Thông tin vị trí không có sẵn."
break;
case error.TIMEOUT:
x.innerHTML = "Yêu cầu vị trí người dùng vượt quá thời gian quy định."
break;
case error.UNKNOWN_ERROR:
x.innerHTML = "Một lỗi xảy ra không rõ nguyên nhân."
break;

//chuyển dữ liệu vào api
var settings = {
      "async": true,
      "crossDomain": true,
      "url": "http://localhost:70/Maps/api/update_location.php",
      "method": "POST",
      "headers": {
        "content-type": "application/x-www-form-urlencoded",
        "cache-control": "no-cache",
        "postman-token": "ae77c478-bce2-a591-36b9-491034a5ec58"
      },
      "data": {
        "lat": position.coords.latitude,
        "long": position.coords.longitude
      }
    }

$.ajax(settings).done(function (response) {
  console.log(response);
});
}
}
</script>
<script>
  $('#upload-star').on('click',function(){
     getLocation();
  })
  </script>

</body>
</html>

