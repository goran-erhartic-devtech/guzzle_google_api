/**
 * Created by goran.erhartic on 8/5/2017.
 */

var markers = [];
var lines = [];

function initMap() {
    //begin map setup
    var devtech = new google.maps.LatLng(45.25345870690877, 19.845862984657288);

    var searchBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(45.229425102968776, 19.774188995361328),
        new google.maps.LatLng(45.28029949181387, 19.882678985595703)
    );

    var map = new google.maps.Map(document.getElementById('map'));

    var marker = new google.maps.Marker({
        position: devtech,
        map: map,
        title: "DevTech DOO"
    });

    var viewBounds = {
        north: 45.23747,
        south: 45.26756,
        east: 19.85218,
        west: 19.79433
    };

    map.fitBounds(viewBounds);
    //end map setup

    //Click on map
    google.maps.event.addListener(map, 'click', function (event) {

        var newPosition = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());
        if (searchBounds.contains(newPosition)) {

            $.ajax({
                url: '/calculateGoogleMapDistance',
                type: "GET",
                data: {
                    'lat': event.latLng.lat(),
                    'lng': event.latLng.lng()
                },
                dataType:'json',
                success: function (data) {
                    document.getElementById('distance').innerHTML = data.distance;
                    document.getElementById('newLocation').innerHTML = data.new_location;
                }
            });

            markers.forEach(function (marker) {
                marker.setMap(null);
            });
            markers = [];

            lines.forEach(function (line) {
                line.setMap(null);
            });
            lines = [];

            markers.push(new google.maps.Marker({
                map: map,
                title: "My Location",
                position: event.latLng
            }));

            var lineCoordinates = [
                devtech,
                {lat: event.latLng.lat(), lng: event.latLng.lng()}
            ];
            var aerialDistance = new google.maps.Polyline({
                path: lineCoordinates,
                geodesic: true,
                strokeColor: '#FF0000',
                strokeOpacity: 1.0,
                strokeWeight: 2
            });

            aerialDistance.setMap(map);
            lines.push(aerialDistance);
        } else {
            document.getElementById('newLocation').innerHTML = '-';
            document.getElementById('distance').innerHTML = '';
            alert('Out of bounds...')
        }
    });
}
