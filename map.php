<?php require_once('connection.php');?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php require_once('head.php');?>
            <link rel="stylesheet" href="styles/css/third.css"> </head>

    <body>
        <!--Map-->
        <a href="about.php"><div class="close opensans"> <span>&times;</span> </div></a>
        <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v1.1.0/mapbox-gl-geocoder.js'></script>
        <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v1.1.0/mapbox-gl-geocoder.css' type='text/css' />
        <div id="map"> <pre id='info'></pre> </div>
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
                $('#map').css("z-index", "1");
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
            </script>
    </body>

    </html>