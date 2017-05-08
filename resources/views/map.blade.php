<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Google Map API - Guzzle</title>

    <link rel="stylesheet" href="/css/googleMap.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>

<div id="map"></div>
<div id="txt">Distance from <label id="newLocation"> - </label> to Devtech DOO is <label id="distance"></label></div>

{{--jQuery--}}
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>

{{--Google Map API PHP script--}}
<script type="text/javascript" src="js/googleMap.js"></script>

{{--Google MAP--}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXSN5-KefqORJYNTpUxuIxERpAiiW4uek&callback=initMap&libraries=places,geometry"
        async
        defer></script>
</body>
</html>
