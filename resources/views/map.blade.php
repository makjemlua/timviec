<!doctype html>
<html lang="en">
  <head>
    <title>Laravel 7/6 Google Autocomplete Address Tutorial - nicesnippets.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>



  </head>
  <body class="bg-dark">
    <div class="container mt-5">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 col-12 m-auto">
                <div class="card shadow">
                	<form action="" method="POST">
                		@csrf
	                    <div class="card-header">
	                        <h5 class="card-title"> Laravel 7/6 Google Autocomplete Address Tutorial - nicesnippets.com</h5>
	                    </div>
	                    <div class="card-body">
	                        <div class="form-group">
	                            <label for="autocomplete"> Location/City/Address </label>
	                            <input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Select Location" autocomplete="off">
	                        </div>
	                        <input type="hidden" name="latitude" id="latitude" class="form-control">
	                        <input type="hidden" name="longitude" id="longitude" class="form-control">
	                        @foreach($maps as $map)
								<input type="hidden" name="lat" id="lat" value="{{ $map->latitude }}">
								<input type="hidden" name="long" id="long" value="{{ $map->longitude }}">
	                        @endforeach
	                    </div>
	                    <div class="card-footer">
	                        <button type="submit" class="btn btn-success"> Submit </button>
	                    </div>
	                </form>
                </div>
            </div>
        </div>
    </div>

<div id="googleMap" style="width:500px;height:400px;"></div>
  </body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
{{-- javascript code --}}
<script src="https://maps.google.com/maps/api/js?key=AIzaSyARuxTvO42oUK9Bj5j-fCGKPbvA-VsMIhY&libraries=places&callback=initAutocomplete" type="text/javascript"></script>
<script>
   $(document).ready(function() {
        $("#lat_area").addClass("d-none");
        $("#long_area").addClass("d-none");
   });

   $(document).ready(function() {
	  $(window).keydown(function(event){
	    if(event.keyCode == 13) {
	      event.preventDefault();
	      return false;
	    }
	  });
	});
</script>
<script>
   google.maps.event.addDomListener(window, 'load', initialize);

   function initialize() {
       var input = document.getElementById('autocomplete');
       var autocomplete = new google.maps.places.Autocomplete(input);
       autocomplete.addListener('place_changed', function() {
           var place = autocomplete.getPlace();
           $('#latitude').val(place.geometry['location'].lat());
           $('#longitude').val(place.geometry['location'].lng());
           $("#lat_area").removeClass("d-none");
           $("#long_area").removeClass("d-none");
       });
   }
</script>

<script>
function initialize() {
    var latitude = document.getElementById("lat").value;
    var longitude = document.getElementById("long").value;
    var zoom = 11;

    var LatLng = new google.maps.LatLng(latitude, longitude);

  var mapProp = {
    center: LatLng,
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
  var marker = new google.maps.Marker({
      position: LatLng,
      map: map,
      title: 'Drag Me!',
      icon: 'http://maps.google.com/mapfiles/kml/pal3/icon21.png',
      draggable: true
    });
  google.maps.event.addListener(marker, 'dragend', function(event) {

      document.getElementById('la').value = event.latLng.lat();
      document.getElementById('lo').value = event.latLng.lng();



});
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
