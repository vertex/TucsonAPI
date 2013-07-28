<!doctype html>
<html lang="en" ng-app>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tucson API - Parking Meters</title>
    <link rel='stylesheet' href='http://twitter.github.io/bootstrap/dist/css/bootstrap.css'/>

    <!-- Google Maps and Places API -->
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>

    <!-- jQuery -->
    <script type="text/javascript" src='http://code.jquery.com/jquery-1.10.2.min.js'></script>
    <script type="text/javascript" src='https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.js'></script>

  </head>
  <body>
    <div class="navbar">
      <a class="navbar-brand" href="">TucsonAPI</a>
      <ul class="nav navbar-nav">
        <li class="active"><a href="">Login</a></li>
      </ul>
    </div>
    <div class="container">
      @yield('content')
    </div>
    <script>

    </script>
  </body>
</html>