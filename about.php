<?php require_once('connection.php');?>
    <?php function renderClients($ID, $name, $subtitle, $business, $location, $region, $folder, $description, $identity, $prints, $digital, $client, $tags) { 
?>
        <?php echo $client; ?>
            <br />
            <?php } ?>
                <?php function renderRecognitions($ID, $recognition) { 
?>
                    <?php echo $recognition; ?>
                        <br />
                        <?php } ?>
                            <!DOCTYPE html>
                            <html lang="en">

                            <head>
                            <?php require_once('head.php');?>
                            <link rel="stylesheet" href="styles/third.css">
                            </head>

                            <body>
                                <?php require_once('header.php');?>
                                    <div class="space desktop-only"></div>
                                    <div class="small-space mobile-only"></div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4 desktop-only">
                                                <p class="text-bigger">About Kiluth.</p>
                                                <div class="small-space"></div>
                                            </div>
                                            <div class="col-md-8">
                                                <p class="text-bigger"> 
                                                    Welcome to Kiluth, a digital-oriented branding agency. We are a group of young designers, strategists and developers. Our studio is based in Bangkok, Thailand.
                                                    <br />
                                                    <br />Established in 2015, we created artistic designs for brands to communicate with users through screens, prints and packages. Through the experience, we have bonded with minimalistic designs, perfecting the craft, and composing stunning visual messages. Approaching projects with logic and understanding, we create unique and immersive experience, and form identities for brands in a communicative and meaningful fashion.
                                                    <br />
                                                    <br />We are a small agency, consisting of some market researchers, business strategists, graphic designers, web developers and advertising enthusiasts.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!--Map-->
                                    <div class="close opensans" hidden="hidden"> <span>&times;</span> </div>
                                    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v1.1.0/mapbox-gl-geocoder.js'></script>
                                    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v1.1.0/mapbox-gl-geocoder.css' type='text/css' />
                                    <div class="container-fluid map">
                                        <div id="map"> </div> <pre id='info' hidden="hidden"></pre>
                                        <div class="container">
                                            <p class="medium-space text-white map-activate"> Click to find where my clients
                                                <br/> are and what they do. </p>
                                        </div>
                                    </div>
                                    
                                    <footer class="container">
                                        <div class="contact-module">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-3">
                                                    <p>Our Clients</p>
                                                </div>
                                                <div class="col-xs-6 col-sm-3">
                                                    <p> Asia Pacific </p>
                                                    <p class="text-smaller">
                                                        <?php 
$clients = $conn->query( "SELECT * FROM projects WHERE region='Asia'" );
$rowcount=mysqli_num_rows($clients);
if ($rowcount == '0') {
    echo "Not Available";
}
while($pupil = $clients->fetch_assoc()) {
renderClients($pupil[ID], $pupil[name], $pupil[subtitle], $pupil[business], $pupil[location], $pupil[region], $pupil[folder], $pupil[description], $pupil[identity], $pupil[prints], $pupil[digital], $pupil[client], $pupil[tags]);
};
?>
                                                    </p>
                                                </div>
                                                <!-- Add the extra clearfix for only the required viewport -->
                                                <div class="clearfix visible-xs-block"></div>
                                                <div class="col-xs-6 col-sm-3">
                                                    <p> Australia & Oceania </p>
                                                    <p class="text-smaller">
                                                        <?php 
$clients = $conn->query( "SELECT * FROM projects WHERE region='Oceania'" );
$rowcount=mysqli_num_rows($clients);
if ($rowcount == '0') {
    echo "Not Available";
}
while($pupil = $clients->fetch_assoc()) {
renderClients($pupil[ID], $pupil[name], $pupil[subtitle], $pupil[business], $pupil[location], $pupil[region], $pupil[folder], $pupil[description], $pupil[identity], $pupil[prints], $pupil[digital], $pupil[client], $pupil[tags]);
};
?>
                                                    </p>
                                                    <p> America </p>
                                                    <p class="text-smaller">
                                                        <?php 
$clients = $conn->query( "SELECT * FROM projects WHERE region='America'" );
$rowcount=mysqli_num_rows($clients);
if ($rowcount == '0') {
    echo "Not Available";
}
while($pupil = $clients->fetch_assoc()) {
renderClients($pupil[ID], $pupil[name], $pupil[subtitle], $pupil[business], $pupil[location], $pupil[region], $pupil[folder], $pupil[description], $pupil[identity], $pupil[prints], $pupil[digital], $pupil[client], $pupil[tags]);
};
?>
                                                    </p>
                                                </div>
                                                <div class="col-xs-6 col-sm-3">
                                                    <p> Europe </p>
                                                    <p class="text-smaller">
                                                        <?php 
$clients = $conn->query( "SELECT * FROM projects WHERE region='Europe'" );
$rowcount=mysqli_num_rows($clients);
if ($rowcount == '0') {
    echo "Not Available";
}
while($pupil = $clients->fetch_assoc()) {
renderClients($pupil[ID], $pupil[name], $pupil[subtitle], $pupil[business], $pupil[location], $pupil[region], $pupil[folder], $pupil[description], $pupil[identity], $pupil[prints], $pupil[digital], $pupil[client], $pupil[tags]);
};
?>
                                                    </p>
                                                    <p> Africa </p>
                                                    <p class="text-smaller">
                                                        <?php 
$clients = $conn->query( "SELECT * FROM projects WHERE region='Africa'" );
$rowcount=mysqli_num_rows($clients);
if ($rowcount == '0') {
    echo "Not Available";
}
while($pupil = $clients->fetch_assoc()) {
renderClients($pupil[ID], $pupil[name], $pupil[subtitle], $pupil[business], $pupil[location], $pupil[region], $pupil[folder], $pupil[description], $pupil[identity], $pupil[prints], $pupil[digital], $pupil[client], $pupil[tags]);
};
?>
                                                    </p>
                                                    <p> Rest of World </p>
                                                    <p class="text-smaller">
                                                        <?php 
$clients = $conn->query( "SELECT * FROM projects WHERE region='None'" );
$rowcount=mysqli_num_rows($clients);
if ($rowcount == '0') {
    echo "Not Available";
}
while($pupil = $clients->fetch_assoc()) {
renderClients($pupil[ID], $pupil[name], $pupil[subtitle], $pupil[business], $pupil[location], $pupil[region], $pupil[folder], $pupil[description], $pupil[identity], $pupil[prints], $pupil[digital], $pupil[client], $pupil[tags]);
};
?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="enquiries-module">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-3">
                                                    <p>Recognition</p>
                                                </div>
                                                <div class="col-xs-6 col-sm-3">
                                                    <p class="text-smaller">
                                                        <?php 
$recognitions = $conn->query( "SELECT * FROM recognition LIMIT 0, 6" );
$rowcount=mysqli_num_rows($recognitions);
if ($rowcount == '0') {
    echo "Not Available";
}
while($recognition = $recognitions->fetch_assoc()) {
renderRecognitions($recognition[ID], $recognition[recognition]);
};
?>
                                                    </p>
                                                </div>
                                                <!-- Add the extra clearfix for only the required viewport -->
                                                <div class="clearfix visible-xs-block"></div>
                                                <div class="col-xs-6 col-sm-3">
                                                    <p class="text-smaller">
                                                        <?php 
$recognitions = $conn->query( "SELECT * FROM recognition LIMIT 6, 6" );
$rowcount=mysqli_num_rows($recognitions);
if ($rowcount == '0') {
    echo "Not Available";
}
while($recognition = $recognitions->fetch_assoc()) {
renderRecognitions($recognition[ID], $recognition[recognition]);
};
?>
                                                    </p>
                                                </div>
                                                <div class="col-xs-6 col-sm-3">
                                                    <p class="text-smaller">
                                                        <?php 
$recognitions = $conn->query( "SELECT * FROM recognition LIMIT 12, 6" );
$rowcount=mysqli_num_rows($recognitions);
if ($rowcount == '0') {
    echo "Not Available";
}
while($recognition = $recognitions->fetch_assoc()) {
renderRecognitions($recognition[ID], $recognition[recognition]);
};
?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </footer>
                                    <?php 
    $data = array(); //setting up an empty PHP array for the data to go into

$place = $conn->query( "SELECT ID, name, brief, longitude, latitude, folder FROM projects" );
while($row = $place->fetch_assoc()) {
    $data[] = $row;
};

$jsonData =json_encode($data);
$original_data = json_decode($jsonData, true);
$features = array();
foreach($original_data as $key => $value) {
    $features[] = array(
        'id' => $value['ID'],
        'type' => 'Feature',
        'properties' => array(
            'description' => $value['brief'],
            'marker-symbol' => "circle-stroked",
            'marker-size' => "large"
        ),
        'geometry' => array(
             'type' => 'Point', 
             'coordinates' => array(
                  $value['longitude'], 
                  $value['latitude'],
             ),
         ),
    );
}
$new_data = array(
    'type' => 'FeatureCollection',
    'features' => $features,
);

$final_data = json_encode($new_data, JSON_PRETTY_PRINT);
//print_r($final_data);
?>
                                        <script>
                                            //Map
                                            //    Center: [99, 12],
                                            //    Bangkok: [100.50, 13.76],
                                            //    zoom: 6
                                            mapboxgl.accessToken = 'pk.eyJ1IjoicG9vbWllcG9vbSIsImEiOiI0MjVmNTQxNzY4MDZiNDdlMWQ3ZGRiNmUxMjFkNmZjOCJ9.rf96bGij54UcT64-So-GfA';
                                            var map = new mapboxgl.Map({
                                                container: 'map'
                                                , style: 'mapbox://styles/poomiepoom/cipwt978v004udnncjnfstskw'
                                                , center: [99, 12]
                                                , zoom: 6
                                            });
                                            map.on('load', function () {
                                                map.addSource("markers", {
                                                    "type": "geojson"
                                                    , cluster: true
                                                    , clusterMaxZoom: 14, // Max zoom to cluster points on
                                                    clusterRadius: 20, // Radius of each cluster when clustering points (defaults to 50)
                                                    "data": <?php echo $final_data ?>
                                                });
                                                map.addLayer({
                                                    "id": "markers"
                                                    , "type": "symbol"
                                                    , "source": "markers"
                                                    , "layout": {
                                                        "icon-image": "{marker-symbol}-15"
                                                        , "text-field": "{title}"
                                                        , "text-font": ["Open Sans Semibold"]
                                                        , "text-offset": [0, 0.6]
                                                        , "text-anchor": "top"
                                                    }
                                                });
                                                //Map Clustering
                                                // Display the data in three layers, each filtered to a range of
                                                // count values. Each range gets a different fill color.
                                                var layers = [
        [150, '#fff']


                                                    , [20, '#fff']


                                                    , [0, '#fff']
    ];
                                                layers.forEach(function (layer, i) {
                                                    map.addLayer({
                                                        "id": "cluster-" + i
                                                        , "type": "circle"
                                                        , "source": "markers"
                                                        , "paint": {
                                                            "circle-color": layer[1]
                                                            , "circle-radius": 15
                                                        }
                                                        , "filter": i == 0 ? [">=", "point_count", layer[0]] : ["all"


                                                            , [">=", "point_count", layer[0]]


                                                            , ["<", "point_count", layers[i - 1][0]]]
                                                    });
                                                });
                                                // Add a layer for the clusters' count labels
                                                map.addLayer({
                                                    "id": "cluster-count"
                                                    , "type": "symbol"
                                                    , "source": "markers"
                                                    , "layout": {
                                                        "text-field": "{point_count}"
                                                        , "text-font": [
                    "Open Sans Light"
                ]
                                                        , "text-size": 10
                                                    }
                                                });
                                            });
                                            // Marker Click
                                            map.on('click', function (e) {
                                                var features = map.queryRenderedFeatures(e.point, {
                                                    layers: ['markers']
                                                });
                                                if (!features.length) {
                                                    return;
                                                }
                                                var feature = features[0];
                                                // Populate the popup and set its coordinates
                                                // based on the feature found.
                                                var popup = new mapboxgl.Popup().setLngLat(feature.geometry.coordinates).setHTML(feature.properties.description).addTo(map);
                                                // Use queryRenderedFeatures to get features at a click event's point
                                                // Use layer option to avoid getting results from other layers
                                                var features = map.queryRenderedFeatures(e.point, {
                                                    layers: ['markers']
                                                });
                                                // if there are features within the given radius of the click event,
                                                // fly to the location of the click event
                                                if (features.length) {
                                                    // Get coordinates from the symbol and center the map on those coordinates
                                                    map.flyTo({
                                                        center: features[0].geometry.coordinates
                                                    });
                                                }
                                                //            setTimeout(function () {
                                                //                map.zoomIn();
                                                //            }, 300);
                                            });
                                            // Use the same approach as above to indicate that the symbols are clickable
                                            // by changing the cursor style to 'pointer'.
                                            map.on('mousemove', function (e) {
                                                var features = map.queryRenderedFeatures(e.point, {
                                                    layers: ['markers']
                                                });
                                                map.getCanvas().style.cursor = (features.length) ? 'pointer' : '';
                                                document.getElementById('info').innerHTML =
                                                    // e.point is the x, y coordinates of the mousemove event relative
                                                    // to the top-left corner of the map
                                                    JSON.stringify(e.point) + '<br />' +
                                                    // e.lngLat is the longitude, latitude geographical position of the event
                                                    JSON.stringify(e.lngLat);
                                            });
                                            //Geocoder
                                            //map.addControl(new mapboxgl.Geocoder());
                                            var iOS = !!navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform);
                                            if (iOS == true) {
                                                //iOS
                                                $('.map-activate').click(function () {
                                                    window.location.replace("map.php");
                                                });
                                            } else {
                                                    //Not iOS
                                                    $('.map-activate').click(function () {
                                                        $('.map').addClass("map-expand");
                                                        $('#map').css("z-index", "1");
                                                        $('html, body').animate({
                                                            scrollTop: $(".map").offset().top
                                                        }, 1000);
                                                        $('.close').fadeIn();
                                                        $('#info').fadeIn();
                                                        $('.scroll-to-top').css("z-index", "-10");
                                                        // left: 37, up: 38, right: 39, down: 40,
                                                        // spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
                                                        var keys = {
                                                            37: 1
                                                            , 38: 1
                                                            , 39: 1
                                                            , 40: 1
                                                        };

                                                        function preventDefault(e) {
                                                            e = e || window.event;
                                                            if (e.preventDefault) e.preventDefault();
                                                            e.returnValue = false;
                                                        }

                                                        function preventDefaultForScrollKeys(e) {
                                                            if (keys[e.keyCode]) {
                                                                preventDefault(e);
                                                                return false;
                                                            }
                                                        }

                                                        function disableScroll() {
                                                            if (window.addEventListener) // older FF
                                                                window.addEventListener('DOMMouseScroll', preventDefault, false);
                                                            window.onwheel = preventDefault; // modern standard
                                                            window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
                                                            window.ontouchmove = preventDefault; // mobile
                                                            document.onkeydown = preventDefaultForScrollKeys;
                                                        }

                                                        function enableScroll() {
                                                            if (window.removeEventListener) window.removeEventListener('DOMMouseScroll', preventDefault, false);
                                                            window.onmousewheel = document.onmousewheel = null;
                                                            window.onwheel = null;
                                                            window.ontouchmove = null;
                                                            document.onkeydown = null;
                                                        }
                                                        disableScroll();
                                                    });
                                                    $('.close').click(function () {
                                                        $('.map').addClass("map-collapse");
                                                        setTimeout(function () {
                                                            $('.map').removeClass("map-expand");
                                                        }, 1000);
                                                        setTimeout(function () {
                                                            $('.map').removeClass("map-collapse");
                                                        }, 1500);
                                                        $('#map').css("z-index", "-1");
                                                        $('.close').fadeOut();
                                                        $('#info').fadeOut();
                                                        $('.scroll-to-top').css("z-index", "10");
                                                        // left: 37, up: 38, right: 39, down: 40,
                                                        // spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
                                                        var keys = {
                                                            37: 1
                                                            , 38: 1
                                                            , 39: 1
                                                            , 40: 1
                                                        };

                                                        function preventDefault(e) {
                                                            e = e || window.event;
                                                            if (e.preventDefault) e.preventDefault();
                                                            e.returnValue = false;
                                                        }

                                                        function preventDefaultForScrollKeys(e) {
                                                            if (keys[e.keyCode]) {
                                                                preventDefault(e);
                                                                return false;
                                                            }
                                                        }

                                                        function disableScroll() {
                                                            if (window.addEventListener) // older FF
                                                                window.addEventListener('DOMMouseScroll', preventDefault, false);
                                                            window.onwheel = preventDefault; // modern standard
                                                            window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
                                                            window.ontouchmove = preventDefault; // mobile
                                                            document.onkeydown = preventDefaultForScrollKeys;
                                                        }

                                                        function enableScroll() {
                                                            if (window.removeEventListener) window.removeEventListener('DOMMouseScroll', preventDefault, false);
                                                            window.onmousewheel = document.onmousewheel = null;
                                                            window.onwheel = null;
                                                            window.ontouchmove = null;
                                                            document.onkeydown = null;
                                                        }
                                                        enableScroll();
                                                    });
                                                }
                                        </script>
                            </body>

                            </html>