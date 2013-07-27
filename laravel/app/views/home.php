<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tucson API - Parking Meters</title>
        <link rel='stylesheet' href='http://twitter.github.io/bootstrap/dist/css/bootstrap.css'/>

        <!-- Google Maps and Places API -->
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>

        <!-- jQuery -->
        <script type="text/javascript" src='http://code.jquery.com/jquery-1.10.2.min.js'></script>
        
    </head>
    <body>
        <div class="container">
            <div class="row show-grid">
              <div class="col-lg-8">
                <div id="map_canvas" style="height: 500px; width: 100%;"></div>
              </div>
              <div class="col-lg-4" style='padding-top: 2px;'>
                <!--<a href='#'>Load Meters</a>-->
                <button id='load-meters' type="submit" class="btn btn-default">Load Meters</button>
              </div>
            </div>

            <div class='row show-grid'>
                <div class="col-lg-8">
                    <div style='width: 100%; height: 100%;'>
                        <div style='float: left; width: 49%;'>Latitude:</div>
                        <div style='float: left; width: 49%;' id='lat'></div>
                        <div style='float: left; width: 49%;'>Longitude:</div>
                        <div style='float: left; width: 49%;' id='lon'></div>
                    </div>
                </div>
                <div class='col-lg-4'>
                    &nbsp;
                </div>
            </div>
        </div>

        <script type='text/javascript'>
            var map = null;

            var currentLat = null;

            var currentLng = null;

            var treeList = [];

            function initialize() {
             var mapOptions = {
                zoom: 11,
                center: new google.maps.LatLng(32.1858, -110.8833),
                mapTypeId: google.maps.MapTypeId.ROADMAP
             };

             map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

             google.maps.event.addListener(map, 'mousemove', function(event) {
                $('#lat').html('').html(event.latLng.lat().toFixed(4));
                $('#lon').html('').html(event.latLng.lng().toFixed(4));
               
             });

             google.maps.event.addListener(map, 'mousedown', function(event) {
                
             });
            }

            google.maps.event.addDomListener(window, 'load', initialize);

            $(document).ready(function() {
                $('#load-meters').click(function() {
                    var url = null;
                    var meters = [{"_id":"51f4410d02f752ee60b0a369","result":"awesome","foo":"bar","lat":"32.2418","lon":"-110.9647"}, 
                                  {"_id":"51f441f902f7525b66192c54","tree":false,"lat":"32.2029","lon":"-110.9489"}, 
                                  {"_id":"51f446d702f7526066e7bef1","test":"yes","lat":"32.1954","lon":"-110.8212"}];
                    $.each(meters, function(index, value) {
                        var meter = new google.maps.LatLng(value['lat'], value['lon']);
                        var meterMarker = new google.maps.Marker({
                            position: meter,
                            map: map
                        });
                    });

                    if (url != null) {
                        $.post(url, function(data) {
                            console.log(meters);
                        });
                    }
                    return false;
                })
            });
        </script>
    </body>
</html>
