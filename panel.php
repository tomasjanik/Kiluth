<!--Step 1-->
<div class="container space step1">
    <h2 class="text-center">Admin</h2>
    <div class="small-space"></div>

    <div class="row">
        <!--Welcome-->
        <div class="col-md-6">
            <p>
                Welcome to the admin panel.
                <br /> A work space created for editing this website contents.
                <br class="desktop-only" /> Select an option to begin editing.
            </p>
            <a href="admin.php" class="link-hover">Logout</a>
            <div class="small-space"></div>
        </div>

        <!--Edit Content Menu-->
        <div class="col-md-3">
            <ul class="list-unstyled">
                <li><a href="admin.php?login=<?php echo $_SESSION["token"] ;?>&project_step=2" class="link-hover">Edit Projects</a></li>
                <li><a href="admin.php?login=<?php echo $_SESSION["token"] ;?>&log_step=2" class="link-hover">Edit Logbook</a></li>
                <li><a href="admin.php?login=<?php echo $_SESSION["token"] ;?>&carousel_step=2" class="link-hover">Edit Carousel</a></li>
                <li><a href="admin.php?login=<?php echo $_SESSION["token"] ;?>&map_step=2" class="link-hover">Edit Map</a></li>
                <li><a href="admin.php?login=<?php echo $_SESSION["token"] ;?>&recognition_step=2" class="link-hover">Edit Recognition</a></li>
                <li><a href="database/" class="link-hover">Edit Database</a></li>
            </ul>
        </div>

        <!--Addition Menu-->
        <div class="col-md-3">
            <ul class="list-unstyled">
                <li><a href="case-study.php?project=<?php echo $lastproject;?>" class="link-hover" target="_blank">View Latest Project</a></li>
                <li><a href="log.php?log=<?php echo $lastlog;?>" class="link-hover" target="_blank">View Latest Log</a></li>
                <li><a href="index.php" class="link-hover" target="_blank">View Carousel</a></li>
                <li><a href="about.php" class="link-hover" target="_blank">View Map</a></li>
                <li><a href="admin.php?login=<?php echo $_SESSION["token"] ;?>&email_step=2" class="link-hover">See All Emails</a></li>
                <li><a href="library.php" class="link-hover">View Library</a></li>
            </ul>
        </div>
    </div>

</div>

<!--Step 2 Project-->
<div class="container space step2-project <?php echo $project_step2;?>">
    <div class="divider"></div>
    <div class="row">
        <div class="col-md-6">
            <p>
                Select Project
            </p>
            <div class="small-space"></div>
        </div>
        <div class="col-md-6">
            <ul class="list-unstyled">
                <?php while($item = $allprojects->fetch_assoc()) { ?>
                    <li>
                        <a href="admin.php?login=<?php echo $_SESSION["token"] ;?>&project_step=3&project=<?php echo $item[folder]; ?>" class="link-hover goto3">
                            <?php echo $item[name]; ?>
                        </a>
                    </li>
                    <?php } ?>
                        <li class="small-space">
                            <a href="admin.php?login=<?php echo $_SESSION["token"] ;?>&project_step=3" class="link goto3">
                                        + Add New Project
                                    </a>
                        </li>
            </ul>
        </div>
    </div>
</div>

<!--Step 3 Project-->
<div class="container space step3-project <?php echo $project_step3;?>">
    <div class="divider"></div>
    <div class="row">
        <form action="update-project.php" method="post">
            <!---->
            <div class="col-xs-6 col-sm-3">
                <p>
                    Name
                </p>
                <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Project">
                <div class="small-space"></div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <p>
                    ID
                </p>
                <input type="text" value="<?php echo $ID; ?>" disabled style="cursor: not-allowed" placeholder="Auto">
                <input type="text" name="ID" value="<?php echo $ID; ?>" hidden="hidden">
                <div class="small-space"></div>
            </div>
            <!--Clearfix-->
            <div class="clearfix visible-xs-block"></div>
            <div class="col-xs-6 col-sm-3">
                <p>
                    Subtitle
                </p>
                <input type="text" name="subtitle" value="<?php echo $subtitle; ?>" placeholder="Lorem ipsum">
                <div class="small-space"></div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <p>
                    Sector
                </p>
                <input type="text" name="business" value="<?php echo $business; ?>" placeholder="Manufacturer">
                <div class="small-space"></div>
            </div>
            <!---->

            <!---->
            <div class="col-xs-6 col-sm-3">
                <p>
                    Folder
                </p>
                <input type="text" name="folder" value="<?php echo $folder; ?>" placeholder="no-cap" required>
                <div class="small-space"></div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <p>
                    Client
                </p>
                <input type="text" name="client" value="<?php echo $client; ?>" placeholder="John Kiluthian">
                <div class="small-space"></div>
            </div>
            <!--Clearfix-->
            <div class="clearfix visible-xs-block"></div>
            
            <div class="col-xs-6 col-sm-3">
                <p>
                    Location
                </p>
                <input type="text" name="location" value="<?php echo $location; ?>" placeholder="Country">
                <div class="small-space"></div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <p>
                    Region
                </p>
                <select name="region">
                    <?php 
                            if ($region == "Asia") {
                                $asia = "selected";
                            }
                            if ($region == "Australia") {
                                $aus = "selected";
                            }
                            if ($region == "America") {
                                $ame = "selected";
                            }
                            if ($region == "Europe") {
                                $eur = "selected";
                            }
                            if ($region == "Africa") {
                                $afr = "selected";
                            }
                            if ($region == "None") {
                                $non = "selected";
                            }
                            ?>
                        <option value="Asia" <?php echo $asia; ?>>Asia Pacific</option>
                        <option value="Australia" <?php echo $aus; ?>>Australia & Oceania</option>
                        <option value="America" <?php echo $ame; ?>>America</option>
                        <option value="Europe" <?php echo $eur; ?>>Europe</option>
                        <option value="Africa" <?php echo $afr; ?>>Africa</option>
                        <option value="None" <?php echo $non; ?>>Rest of World</option>
                </select>
                <div class="small-space"></div>
            </div>
            <!---->

            <!---->
            <div class="col-md-6">
                <p>
                    Theme Color
                </p>
                <input type="text" name="themeColor" value="<?php echo $themeColor; ?>" placeholder="#000000">
                <div class="small-space"></div>
            </div>
            <div class="col-md-6">
                <p>
                    Tags
                </p>
                <?php 
                            if (strpos($tags, 'Branding') !== false) {
                                $bra = "checked";
                            }
                            if (strpos($tags, 'Prints') !== false) {
                                $pri = "checked";
                            }
                            if (strpos($tags, 'Digital') !== false) {
                                $dig = "checked";
                            }
                            ?>
                        <input type="checkbox" name="tags1" value="Branding " placeholder="Branding" <?php echo $bra; ?>>
                        <span class="text-smaller">Branding</span>
                    <br />
                    <input type="checkbox" name="tags2" value="Prints " placeholder="Prints" <?php echo $pri; ?>>
                    <span class="text-smaller">Prints</span>
                    <br />
                    <input type="checkbox" name="tags3" value="Digital " placeholder="Digital" <?php echo $dig; ?>>
                    <span class="text-smaller">Digital</span>
                    <br />
                    <div class="small-space"></div>
            </div>
            <!---->

            <!---->
            <div class="col-md-12">
                <p>
                    About Project
                </p>
                <textarea name="description" rows="9"><?php echo $description; ?></textarea>
                <div class="small-space"></div>
            </div>
            <div class="col-md-6">
                <p>
                    Identity
                </p>
                <textarea name="identity" rows="4"><?php echo $identity; ?></textarea>
                <div class="small-space"></div>
            </div>
            <div class="col-md-6">
                <p>
                    Prints
                </p>
                <textarea name="prints" rows="4"><?php echo $prints; ?></textarea>
                <div class="small-space"></div>
            </div>
            <div class="col-md-6">
                <p>
                    Photography
                </p>
                <textarea name="photography" rows="4"><?php echo $photography; ?></textarea>
                <div class="small-space"></div>
            </div>
            <div class="col-md-6">
                <p>
                    Digital
                </p>
                <textarea name="digital" rows="4"><?php echo $digital; ?></textarea>
                <div class="small-space"></div>
            </div>
            <!---->

            <!---->
            <div class="col-md-12 text-center submit-holder small-space">
                <input class="link-hover save" type="submit" name="submit" value="Save Project">
                <br />
                <br />
                <div class="delete">
                    <input class="link-hover" type="submit" name="submit" value="Delete Project">
                </div>
            </div>
            <!---->
        </form>
    </div>
</div>


<!--Step 2 Log-->
<div class="container space step2-log <?php echo $log_step2;?>">
    <div class="divider"></div>
    <div class="row">
        <div class="col-md-6">
            <p>
                Select Entry
            </p>
            <div class="small-space"></div>
        </div>
        <div class="col-md-6">
            <ul class="list-unstyled">
                <?php while($log = $alllogs->fetch_assoc()) { ?>
                    <li>
                        <a href="admin.php?login=<?php echo $_SESSION["token"] ;?>&log_step=3&log=<?php echo $log[folder]; ?>" class="link-hover goto3">
                            <?php echo $log[title]; ?>
                        </a>
                    </li>
                    <?php } ?>
                        <li class="small-space">
                            <a href="admin.php?login=<?php echo $_SESSION["token"] ;?>&log_step=3" class="link goto3">
                                        + Add New Log
                                    </a>
                        </li>
            </ul>
        </div>
    </div>
</div>

<!--Step 3 Log-->
<div class="container space step3-log <?php echo $log_step3;?>">
    <div class="divider"></div>
    <div class="row">
        <form action="update-log.php" method="post">
            <!---->
            <div class="col-xs-6 col-sm-3">
                <p>
                    Title
                </p>
                <input type="text" name="title" value="<?php echo $title; ?>" placeholder="Logbook">
                <div class="small-space"></div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <p>
                    ID
                </p>
                <input type="text" value="<?php echo $logID; ?>" disabled style="cursor: not-allowed" placeholder="Auto">
                <input type="text" name="ID" value="<?php echo $logID; ?>" hidden="hidden">
                <div class="small-space"></div>
            </div>
            <!--Clearfix-->
            <div class="clearfix visible-xs-block"></div>
            <div class="col-xs-6 col-sm-3">
                <p>
                    Date Published
                </p>
                <input type="text" value="<?php echo $date_published; ?>" disabled style="cursor: not-allowed" placeholder="Auto">
                <input type="text" name="date_published" value="<?php echo $date_published; ?>" hidden="hidden">
                <div class="small-space"></div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <p>
                    Folder
                </p>
                <input type="text" name="folder" value="<?php echo $logfolder; ?>" placeholder="no-cap" required>
                <div class="small-space"></div>
            </div>
            <!---->

            <!---->
            <div class="col-md-6">
                <p>
                    Options
                </p>
                <?php 
                            if (strpos($size, 'double') !== false) {
                                $siz = "checked";
                            }
                            if (strpos($hidethumbnail, 'hide') !== false) {
                                $hid = "checked";
                            }
                            ?>
                    <input type="checkbox" name="size" value="double " placeholder="Double" <?php echo $siz; ?>>
                    <span class="text-smaller">Double thumbnail size</span>
                    <br />
                    <input type="checkbox" name="hidethumbnail" value="hide " placeholder="Hide" <?php echo $hid; ?>>
                    <span class="text-smaller">Hide thumbnail in log content</span>
                    <br />
                    <div class="small-space"></div>
            </div>
            <div class="col-md-6">
                <p>
                    Tags
                </p>
                <?php 
                            if (strpos($logtags, 'Insight') !== false) {
                                $ins = "checked";
                            }
                            if (strpos($logtags, 'NewClient') !== false) {
                                $new = "checked";
                            }
                            if (strpos($logtags, 'Launch') !== false) {
                                $lau = "checked";
                            }
                            ?>
                    <input type="checkbox" name="tags1" value="Insight " placeholder="Insight" <?php echo $ins; ?>>
                    <span class="text-smaller">Insight</span>
                    <br />
                    <input type="checkbox" name="tags2" value="NewClient " placeholder="New Client" <?php echo $new; ?>>
                    <span class="text-smaller">New Client</span>
                    <br />
                    <input type="checkbox" name="tags3" value="Launch " placeholder="Launch" <?php echo $lau; ?>>
                    <span class="text-smaller">Launch</span>
                    <br />
                    <div class="small-space"></div>
            </div>
            <!---->

            <!---->
            <div class="col-md-12">
                <p>
                    Content
                </p>
                <textarea name="content" rows="9"><?php echo $content; ?></textarea>
                <div class="small-space"></div>
            </div>
            <!---->

            <!---->
            <div class="col-md-12 text-center submit-holder small-space">
                <input class="link-hover save" type="submit" name="submit" value="Save Project">
                <br />
                <br />
                <div class="delete">
                    <input class="link-hover" type="submit" name="submit" value="Delete Project">
                </div>
            </div>
            <!---->
        </form>
    </div>
</div>


<!--Step 2 Carousel-->
<div class="container space step2-carousel <?php echo $carousel_step2;?>">
    <div class="divider"></div>
    <div class="row">
        <div class="col-md-6">
            <p>
                Select Carousel
            </p>
            <div class="small-space"></div>
        </div>
        <div class="col-md-3">
            <ul class="list-unstyled">
                <?php while($carousel = $allcarousels->fetch_assoc()) {?>
                    <li>
                        <a href="admin.php?login=<?php echo $_SESSION["token"] ;?>&carousel_step=3&carousel=<?php echo $carousel[folder]; ?>" class="link-hover goto3">
                            <?php echo $carousel[ID]; ?>
                                <span style="text-transform: capitalize;">
                                        <?php echo str_replace("-"," ", $carousel[folder]); ?> 
                                        </span>
                        </a>
                    </li>
                    <?php } ?>
            </ul>
        </div>
        <div class="col-md-3">
            <ul class="list-unstyled">
                <p>
                    All Folders Available
                </p>
                <?php $allprojects = $conn->query("SELECT * FROM projects");
                            while($project = $allprojects->fetch_assoc()) { ?>
                    <li>
                        <span class="text-muted text-normal"><?php echo $project[folder]; ?></span>
                    </li>
                    <?php } ?>
            </ul>
        </div>
    </div>
</div>

<!--Step 3 Carousel-->
<div class="container space step3-carousel <?php echo $carousel_step3;?>">
    <div class="divider"></div>
    <div class="row">
        <form action="update-carousel.php" method="post">
            <!---->
            <div class="col-xs-6 col-sm-3">
                <p>
                    Folder
                </p>
                <input type="text" name="folder" value="<?php echo $carouselfolder; ?>" placeholder="no-cap" required>
                <div class="small-space"></div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <p>
                    ID
                </p>
                <input type="text" value="<?php echo $carouselID; ?>" disabled style="cursor: not-allowed" placeholder="Auto">
                <input type="text" name="ID" value="<?php echo $carouselID; ?>" hidden="hidden">
                <div class="small-space"></div>
            </div>
            <!--Clearfix-->
            <div class="clearfix visible-xs-block"></div>
            <div class="col-xs-6 col-sm-3">

            </div>
            <div class="col-xs-6 col-sm-3">
                <p>
                    Options
                </p>
                <?php 
                            if (strpos($active, 'active') !== false) {
                                $act = "checked";
                            }
                            ?>
                    <input type="checkbox" name="active" value="active " placeholder="Active" <?php echo $act; ?>>
                    <span class="text-smaller">Active Carousel</span>
                    <br />
                    <div class="small-space"></div>
            </div>
            <!---->


            <!---->
            <div class="col-md-12">
                <p>
                    Content
                </p>
                <textarea name="text" rows="9"><?php echo $text; ?></textarea>
                <div class="small-space"></div>
            </div>
            <!---->

            <!---->
            <div class="col-md-12 text-center submit-holder small-space">
                <input class="link-hover save" type="submit" name="submit" value="Save Carousel">
            </div>
            <!---->
        </form>
    </div>
</div>


<!--Step 2 Map-->
<div class="container space step2-map <?php echo $map_step2;?>">
    <div class="divider"></div>
    <div class="row">
        <div class="col-md-6">
            <p>
                Select Location
            </p>
            <div class="small-space"></div>
        </div>
        <div class="col-md-6">
            <ul class="list-unstyled">
                <?php while($map = $allmaps->fetch_assoc()) { ?>
                    <li>
                        <a href="admin.php?login=<?php echo $_SESSION["token"] ;?>&map_step=3&map=<?php echo $map[folder]; ?>" class="link-hover goto3">
                            <?php echo $map[name]; ?>
                        </a>
                    </li>
                    <?php } ?>
            </ul>
        </div>
    </div>
</div>

<!--Step 3 Map-->
<div class="container space step3-map <?php echo $map_step3;?>">
    <div class="divider"></div>
    <div class="row">
        <form action="update-map.php" method="post">
            <input type="text" name="folder" value="<?php echo $mapfolder; ?>" hidden="hidden">
            <!---->
            <div class="col-xs-6 col-sm-3">
                <p>
                    Client
                </p>
                <input type="text" value="<?php echo $mapclient; ?>" disabled style="cursor: not-allowed" placeholder="Auto">
                <input type="text" name="client" value="<?php echo $mapclient; ?>" hidden="hidden">
                <div class="small-space"></div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <p>
                    ID
                </p>
                <input type="text" value="<?php echo $mapID; ?>" disabled style="cursor: not-allowed" placeholder="Auto">
                <input type="text" name="ID" value="<?php echo $mapID; ?>" hidden="hidden">
                <div class="small-space"></div>
            </div>
            <!--Clearfix-->
            <div class="clearfix visible-xs-block"></div>
            <div class="col-xs-6 col-sm-3">
                <p>
                    Longitude
                </p>
                <input type="text" name="longitude" value="<?php echo $longitude; ?>" placeholder="100.00">
                <div class="small-space"></div>
            </div>
            <div class="col-xs-6 col-sm-3">
                <p>
                    Latitude
                </p>
                <input type="text" name="latitude" value="<?php echo $latitude; ?>" placeholder="13.00">
                <div class="small-space"></div>
            </div>
            <!---->

            <!---->
            <div class="col-md-6">
                <p>
                    Map
                </p>
                <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v1.3.0/mapbox-gl-geocoder.js'></script>
                <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v1.3.0/mapbox-gl-geocoder.css' type='text/css' />

                <?php if($getmap_step == 3) { ?>
                    <div id='map2' style='height: 210px;'></div>
                    <pre id='info2'></pre>
                    <script>
                        $('#map2').keypress(function (e) {
                            if (e.which == 13) return false;
                            //or...
                            if (e.which == 13) e.preventDefault();
                        });
                        $('#map2').click(function () {
                            event.preventDefault();
                            return false;
                        });
                        mapboxgl.accessToken = 'pk.eyJ1IjoicG9vbWllcG9vbSIsImEiOiI0MjVmNTQxNzY4MDZiNDdlMWQ3ZGRiNmUxMjFkNmZjOCJ9.rf96bGij54UcT64-So-GfA';
                        var map = new mapboxgl.Map({
                            container: 'map2'
                            , style: 'mapbox://styles/poomiepoom/cipwt978v004udnncjnfstskw'
                            , center: [<?php echo $longitude;?>, <?php echo $latitude;?>]
                            , zoom: 15
                        });

                        map.on('load', function () {
                            map.addSource("markers", {
                                "type": "geojson"
                                , "data": {
                                    "type": "FeatureCollection"
                                    , "features": [{
                                        "type": "Feature"
                                        , "geometry": {
                                            "type": "Point"
                                            , "coordinates": [<?php echo $longitude;?>, <?php echo $latitude;?>]
                                        }
                                        , "properties": {
                                            "title": "<?php echo $mapclient; ?>"
                                            , "marker-symbol": "marker"
                                            , "marker-size": "large"
                                        , }
                                                }]
                                }
                            });

                            map.addLayer({
                                "id": "markers"
                                , "type": "symbol"
                                , "source": "markers"
                                , "layout": {
                                    "icon-image": "{marker-symbol}-15", //                                                "text-field": "{title}",
                                    "text-font": ["theinhardtlight Light"]
                                    , "text-offset": [0, 0.6]
                                    , "text-anchor": "top"
                                }
                            });
                        });

                        // Use the same approach as above to indicate that the symbols are clickable
                        // by changing the cursor style to 'pointer'.
                        map.on('mousemove', function (e) {
                            var features = map.queryRenderedFeatures(e.point, {
                                layers: ['markers']
                            });
                            map.getCanvas().style.cursor = (features.length) ? 'pointer' : '';

                            document.getElementById('info2').innerHTML =
                                // e.lngLat is the longitude, latitude geographical position of the event
                                JSON.stringify(e.lngLat);
                        });

                        //Geocoder
                        map.addControl(new mapboxgl.Geocoder());
                    </script>
                    <?php } ?>
                        <div class="small-space"></div>
            </div>
            <!---->

            <!---->
            <div class="col-md-6">
                <p>
                    Brief
                </p>
                <textarea name="brief" rows="9"><a href=case-study.php?project=<?php echo $mapfolder; ?>><p><?php echo $mapname; ?></p><p class = "text-smaller"><?php echo $mapbusiness; ?> from <?php echo $maplocation; ?></p>
<br />
<div class="thumbnail log-thumbnail" style="background-image: url(project/<?php echo $mapfolder; ?>/thumbnail.png);"></div>
</a></textarea>
                <div class="small-space"></div>
            </div>
            <!---->

            <!---->
            <div class="col-md-12 text-center submit-holder small-space">
                <input class="link-hover save" type="submit" name="submit" value="Save Map">
            </div>
            <!---->
        </form>
    </div>
</div>

<!--Step 2 Recognition-->
<div class="container space step2-recognition <?php echo $recognition_step2;?>">
    <div class="divider"></div>
    <div class="row">
        <div class="col-md-6">
            <p>
                Select Recognition
            </p>
            <div class="small-space"></div>
        </div>
        <div class="col-md-6">
            <ul class="list-unstyled">
                <?php while($recognition = $allrecognitions->fetch_assoc()) { ?>
                    <li>
                        <a href="admin.php?login=<?php echo $_SESSION["token"] ;?>&recognition_step=3&recognition=<?php echo $recognition[recognition]; ?>" class="link-hover goto3">
                            <?php echo $recognition[recognition]; ?>
                        </a>
                    </li>
                    <?php } ?>
                        <li class="small-space">
                            <a href="admin.php?login=<?php echo $_SESSION["token"] ;?>&recognition_step=3" class="link goto3">
                                        + Add New Recognition
                                    </a>
                        </li>
            </ul>
        </div>
    </div>
</div>

<!--Step 3 Recognition-->
<div class="container space step3-recognition <?php echo $recognition_step3;?>">
    <div class="divider"></div>
    <div class="row">
        <form action="update-recognition.php" method="post">

            <!---->
            <div class="col-md-6">
                <p>
                    ID
                </p>
                <input type="text" value="<?php echo $recognitionID; ?>" disabled style="cursor: not-allowed" placeholder="Auto">
                <input type="text" name="ID" value="<?php echo $recognitionID; ?>" hidden="hidden">
                <div class="small-space"></div>
            </div>
            <div class="col-md-6">
                <p>
                    Recognition
                </p>
                <input type="text" name="recognition" value="<?php echo $recognitionrecognition; ?>">
                <div class="small-space"></div>
            </div>
            <!---->

            <!---->
            <div class="col-md-12 text-center submit-holder small-space">
                <input class="link-hover save" type="submit" name="submit" value="Save Recognition">
                <br />
                <br />
                <div class="delete">
                    <input class="link-hover" type="submit" name="submit" value="Delete Recognition">
                </div>
            </div>
            <!---->
        </form>
    </div>
</div>


<!--Step 2 Email-->
<div class="container space step2-email <?php echo $email_step2;?>">
    <div class="divider"></div>
    <div class="row">
        <div class="col-md-6 widescreen-only">
            <p>
                Emails
            </p>
            <div class="small-space"></div>
        </div>
        <div class="col-md-3">
            <ul class="list-unstyled">
                <p>
                    All Emails
                </p>
                <?php $allemails = $conn->query("SELECT * FROM emails ORDER BY date_added DESC LIMIT 200");
                            while($email = $allemails->fetch_assoc()) { ?>
                    <li>
                        <a class="link" href="mailto:<?php echo $email[email]; ?>"><?php echo $email[email]; ?></a>
                    </li>
                    <?php } ?>
            </ul>
        </div>
        <div class="col-md-3 widescreen-only">
            <ul class="list-unstyled">
                <p>
                    Date Added
                </p>
                <?php $allemails = $conn->query("SELECT * FROM emails ORDER BY date_added DESC LIMIT 200");
                            while($email = $allemails->fetch_assoc()) {
                            $date_added = $email[date_added];
                                $originalDate = $date_added;
                                $formatedDate = date("d/m/Y", strtotime($originalDate));
                                $date_added = $formatedDate;
                            ?>
                    <li>
                        <a class="link" href="mailto:<?php echo $email[email]; ?>"><?php echo $date_added; ?></a>
                    </li>
                    <?php } ?>
            </ul>
        </div>
    </div>
</div>