/**
 * Created by ernesto on 19/02/15.
 */

function initialize() {
    var latitude = $('#latitude').val();
    var longitude = $('#longitude').val();
    var map_canvas = document.getElementById('map_contact');
    if(map_canvas != null)
    {
        var location = new google.maps.LatLng(latitude, longitude);
        var map_options = {
            center: location,
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(map_canvas, map_options);
        new google.maps.Marker({
            position: location,
            map: map
        });
    }
}

$(document).ready(function(){

    google.maps.event.addDomListener(window, 'load', initialize);
})