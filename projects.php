<?php require_once('connection.php');?>
    <?php function renderClients($ID, $name, $subtitle, $business, $location, $region, $folder, $description, $identity, $prints, $digital, $client, $tags) { ?>
        <a class="link select select-<?php echo $folder; ?>">
            <?php echo $client; ?>
        </a>
        <br />
        <script>
            $('.select-<?php echo $folder; ?>').click(function () {
                $('.link').removeClass("active");
                $(this).toggleClass("active");
                setTimeout(function () {
                    $('.<?php echo $folder; ?>').fadeIn();
                }, 500);
            });
        </script>
        <?php } ?>


            <!DOCTYPE html>
            <html lang="en">

            <head>
                <?php require_once('head.php');?>
                    <link rel="stylesheet" href="styles/second.css">
            </head>

            <body>
                <?php require_once('header.php');?>
                    <nav class="navbar desktop-only">
                        <div class="container">
                            <ul class="nav navbar-nav second">
                                <li><a class="link active select select-all" href="#">All</a></li>
                                <li class="disable-slash"><a class="text-muted">/</a></li>
                                <li><a class="link select select-branding" href="#">Branding</a></li>
                                <li class="disable-slash"><a class="text-muted">/</a></li>
                                <li><a class="link select select-prints" href="#">Prints</a></li>
                                <li class="disable-slash"><a class="text-muted">/</a></li>
                                <li><a class="link select select-digital" href="#">Digital</a></li>
                                <li class="disable-slash"><a class="text-muted">/</a></li>
                                <li class="clients"><a class="link" href="#">Clients<i class="arrow fa fa-angle-up"></i></a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="medium-space desktop-only"></div>
                    <div class="small-space mobile-only"></div>
                    <div class="container list-clients collapse">
                        <div class="row">
                            <p class="col-xs-6 col-sm-3">
                                <?php 
$clients = $conn->query("SELECT * FROM projects ORDER BY client LIMIT 0, 5");
while($pupil = $clients->fetch_assoc()) {
renderClients($pupil[ID], $pupil[name], $pupil[subtitle], $pupil[business], $pupil[location], $pupil[region], $pupil[folder], $pupil[description], $pupil[identity], $pupil[prints], $pupil[digital], $pupil[client], $pupil[tags]);
};
?>
                            </p>
                            <p class="col-xs-6 col-sm-3">
                                <?php 
$clients = $conn->query("SELECT * FROM projects ORDER BY client LIMIT 5, 5");
while($pupil = $clients->fetch_assoc()) {
renderClients($pupil[ID], $pupil[name], $pupil[subtitle], $pupil[business], $pupil[location], $pupil[region], $pupil[folder], $pupil[description], $pupil[identity], $pupil[prints], $pupil[digital], $pupil[client], $pupil[tags]);
};
?>
                            </p>

                            <!-- Add the extra clearfix for only the required viewport -->
                            <div class="clearfix visible-xs-block"></div>

                            <p class="col-xs-6 col-sm-3">
                                <?php 
$clients = $conn->query("SELECT * FROM projects ORDER BY client LIMIT 10, 5");
while($pupil = $clients->fetch_assoc()) {
renderClients($pupil[ID], $pupil[name], $pupil[subtitle], $pupil[business], $pupil[location], $pupil[region], $pupil[folder], $pupil[description], $pupil[identity], $pupil[prints], $pupil[digital], $pupil[client], $pupil[tags]);
};
?>
                            </p>
                            <p class="col-xs-6 col-sm-3">
                                <?php 
$clients = $conn->query("SELECT * FROM projects ORDER BY client LIMIT 15, 5");
while($pupil = $clients->fetch_assoc()) {
renderClients($pupil[ID], $pupil[name], $pupil[subtitle], $pupil[business], $pupil[location], $pupil[region], $pupil[folder], $pupil[description], $pupil[identity], $pupil[prints], $pupil[digital], $pupil[client], $pupil[tags]);
};
?>
                            </p>
                        </div>
                        <div class="medium-space desktop-only"></div>
                        <div class="small-space mobile-only"></div>
                    </div>

                    <i class="view-size fa fa-th-large widescreen-only"></i>
                    <div class="container">
                        <div class="row projects-holder">
                            <?php 
$projects = $conn->query("SELECT * FROM projects ORDER BY ID DESC");
while($row = $projects->fetch_assoc()) {
//renderProjects($row[ID], $row[name], $row[subtitle], $row[business], $row[location], $row[region], $row[folder], $row[description], $row[identity], $row[prints], $row[digital], $row[client], $row[tags]);
    ?>

                                <a href="case-study.php?project=<?php echo $row[folder]; ?>" class="col-sm-3 project-view item <?php echo $row[client]; ?> <?php echo $row[tags]; ?> <?php echo $row[folder]; ?>">
                                    <div class="thumbnail" style="background-image: url(project/<?php echo $row[folder]; ?>/thumbnail.png); background-image: -webkit-image-set(url(project/<?php echo $row[folder]; ?>/thumbnail.png) 1x, url(project/<?php echo $row[folder]; ?>/thumbnail@2x.png) 2x)" data-rjs="2">
                                        <div class="screen desktop-only">
                                            <p class="name text-normal" data-toggle="tooltip" data-placement="bottom" title="<?php echo $row[name]; ?>" data-delay='{"show":"2000"}'>
                                                <?php echo $row[name]; ?>
                                            </p>
                                            <p class="text-muted subtitle preview text-smaller hide" data-toggle="tooltip" data-placement="bottom" title="<?php echo $row[subtitle]; ?>" data-delay='{"show":"2000"}'>
                                                <?php echo $row[subtitle]; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mobile-only">
                                        <p>
                                            <span class="name preview" data-toggle="tooltip" data-placement="bottom" title="<?php echo $row[name]; ?>" data-delay='{"show":"2000"}'>
                                                <?php echo $row[name]; ?>
                                            </span>
                                           <span class="text-muted preview text-smaller" data-toggle="tooltip" data-placement="bottom" title="<?php echo $row[subtitle]; ?>" data-delay='{"show":"2000"}'>
                                               <?php echo $row[subtitle]; ?>
                                           </span>
                                        </p>
                                        <div class="small-space"></div>
                                    </div>
                                </a>
                                <?php
};

?>
                        </div>
                    </div>
                    <?php require_once('footer.php');?>
                        <script>
                            //Change Size
                            $('.view-size').click(function () {
                                $(this).toggleClass("fa-th-large");
                                $(this).toggleClass("fa-th");
                                $('.item').toggleClass("col-sm-3");
                                $('.item').toggleClass("col-xs-6");
                                $('.subtitle').toggleClass('hide');
                                $('.name').toggleClass('text-bigger');
                            });

                            //Client Button
                            $('.clients').click(function () {
                                $('.arrow').toggleClass('fa-angle-up');
                                $('.arrow').toggleClass('fa-angle-down');
                                $('.collapse').collapse("toggle");
                            });


                            //Filter Select Client
                            $('.select-branding').click(function () {
                                setTimeout(function () {
                                    $('.Branding').fadeIn();
                                }, 500);
                            });
                            $('.select-prints').click(function () {
                                setTimeout(function () {
                                    $('.Prints').fadeIn();
                                }, 500);
                            });
                            $('.select-digital').click(function () {
                                setTimeout(function () {
                                    $('.Digital').fadeIn();
                                }, 500);
                            });
                        </script>
            </body>

            </html>