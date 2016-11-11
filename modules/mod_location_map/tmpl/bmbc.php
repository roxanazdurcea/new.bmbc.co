<?php
/**
 * @version 3.0
 * @package LocationMap
 * @description Location map for Joomla 3.0
 */
//require_once(dirname(__FILE__)."/mod_location_map.php");
defined('_JEXEC') or die('Restricted access');
$pr = rand();

$doc = JFactory::getDocument();

if (modOSLocationHelper::checkJavaScriptIncluded("maps.googleapis.com") === false) {

    $api_key = $params->get('map_api_key') ? ("key=" .
        $params->get('map_api_key')) :
        JFactory::getApplication()->enqueueMessage(
            "<a target='_blank' href='//developers.google.com/maps/documentation/geocoding/get-api-key'>" .
            "https://developers.google.com/maps/documentation/javascript/get-api-key" . "</a>",
            "For use Google Map - you need set Google map key parameters in Location Map module");
    $doc->addScript("//maps.googleapis.com/maps/api/js?$api_key", 'text/javascript', true, true);

}

?>
<style>
    #map_canvas<?php echo $pr; ?> img {
        max-width: none !important;
    }
</style>
<noscript>Javascript is required to use Google Maps location Joomla module <a
        href="#">Google Maps location module
        for Joomla </a>,

    <a href="#">Google Maps location module
        for Joomla</a></noscript>
<script type="text/javascript">
    function initialize() {
        var mapOptions = {
            zoom: 15,
            center: new google.maps.LatLng(52.647539, 19.057083),
            mapTypeControl: false,
            scrollwheel: false,
            draggable: true,
            panControl: true,
            zoomControl: false
        };
        var map = new google.maps.Map(document.getElementById('mapka'), mapOptions);
        var style =
            [
                {
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f5f5f5"
                        }
                    ]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#616161"
                        }
                    ]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "color": "#f5f5f5"
                        }
                    ]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#bdbdbd"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#eeeeee"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#757575"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e5e5e5"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#9e9e9e"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#757575"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#dadada"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#616161"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#9e9e9e"
                        }
                    ]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e5e5e5"
                        }
                    ]
                },
                {
                    "featureType": "transit.station",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#eeeeee"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#c9c9c9"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#9e9e9e"
                        }
                    ]
                }

            ];
        var map = new google.maps.Map(document.getElementById("mapka"), mapOptions);

        var mapType = new google.maps.StyledMapType(stylez, { name:"Grayscale" });
        map.mapTypes.set('Grayscale', mapType);
        map.setMapTypeId('Grayscale');

        var contentString = '<b>Hello!</b>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString,
            maxWidth: 200
        });

        var companyImage = new google.maps.MarkerImage('http://demo.themerart.net/newvision/assets/img/icon/marker.png',
            new google.maps.Size(50,50),
            new google.maps.Point(0,0),
            new google.maps.Point(25,25)
        );
        var companyPos = new google.maps.LatLng(52.647539, 19.057083);
        var companyMarker = new google.maps.Marker({
            position: companyPos,
            map: map,
            icon: companyImage,
            title:"mexxio.pl",
            zIndex: 3000});

        google.maps.event.addDomListener(window, "resize", function() {
            var center = map.getCenter();
            google.maps.event.trigger(map, "resize");
            map.setCenter(center);
        });

        infowindow.open(map,companyMarker);
        google.maps.event.addListener(companyMarker, 'click', function() {
            infowindow.open(map,companyMarker);
        });
    }
    function loadScript() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
        document.body.appendChild(script);
    }
    window.onload = loadScript;

</script>