<?php require_once('connection.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php require_once('head.php');?>
    <script>
        $(document).ready(function () {
            //Carousel
            $('#carousel').on('slid.bs.carousel', function () {
                $holder = $("ol li.active");
                $holder.removeClass('active');
                var idx = $('div.active').index('div.item');
                $('ol.indicators li[data-slide-to="' + idx + '"]').addClass('active');
            });
            $('ol.indicators  li').on("click", function () {
                $('ol.indicators li.active').removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>
</head>

<body>
        <?php require_once('header.php');?>
        <div id="carousel" class="carousel slide carousel-fade tablet-up-only" data-ride="carousel" data-interval="8000">
            <!--                       -->
            <div class="carousel-inner" role="listbox">
                <?php $carousel = $conn->query("SELECT * FROM carousel ORDER BY ID LIMIT 4");
                    while($slide = $carousel->fetch_assoc()) {
                        $main = $slide[folder];
                        if (file_exists('project/'.$main.'/hero.png')) { 
                            $mainexistance = "hero.png";
                            $mainexistanceretina = "hero@2x.png";
                        } else {
                            if (file_exists('project/'.$main.'/thumbnail.png')) {
                                $mainexistance = "thumbnail.png";
                                $mainexistanceretina = "thumbnail@2x.png";
                            } elseif (file_exists('project/'.$main.'/main.png')) {
                                $mainexistance = "main.png";
                                $mainexistanceretina = "main@2x.png";
                            }
                        }
                ?>
                    <div class="item <?php echo $slide[active]; ?>">
                        <div class="bg" style="background-image: url(project/<?php echo $main; ?>/<?php echo $mainexistance; ?>); background-image: -webkit-image-set(url(project/<?php echo $main; ?>/<?php echo $mainexistance; ?>) 1x, url(project/<?php echo $main; ?>/<?php echo $mainexistanceretina; ?>) 2x)" data-rjs="2"></div>
                        <div class="container hide-toggle">
                            <h1 class="title space double text-white roboto"><?php echo $slide[text]; ?></h1>
                            <div class="medium-space"></div>
                            <a href="casestudy.php?project=<?php echo $main; ?>">
                                <p class="text-white text-smaller link-hover">View Case Study</p>
                            </a>
                        </div>
                    </div>
                    <?php }; ?>
            </div>
            <!--                        -->
        </div>
        <div class="container">
        <ol class="indicators">
                <?php $carousel = $conn->query("SELECT * FROM carousel ORDER BY ID LIMIT 4");
                        while($slide = $carousel->fetch_assoc()) {
                            ${"indicator" . $slide[ID]} = $slide[active];
                        } ?>
                    <li data-target="#carousel" data-slide-to="0" class="indicator <?php echo $indicator1; ?>"></li>
                    <li data-target="#carousel" data-slide-to="1" class="indicator <?php echo $indicator2; ?>"></li>
                    <li data-target="#carousel" data-slide-to="2" class="indicator <?php echo $indicator3; ?>"></li>
                    <li data-target="#carousel" data-slide-to="3" class="indicator <?php echo $indicator4; ?>"></li>
            </ol>
        </div>
        <div class="container">
            <!--                       -->
            <p class="text-bigger">
                Kiluth is a digital-oriented branding agency working with clients from
                <br class="tablet-up-only" /> different countries. Our studio is based in Bangkok, Thailand. We
                <br class="tablet-up-only" />uniquely assign identities to brands with artistic approaches.
                <br />
                <br /> We work independently with brands and businesses, creating modern
                <br class="tablet-up-only" />solutions, forming sense of place for the clients and their end-users.
            </p>
            <!--                        -->
            <div class="row medium-space">
                <div class="col-md-9 col-sm-8">
                    <p>Latest Projects</p>
                    
                    <?php 
if (!empty($_GET['project'])) {
$link = "project=". $_GET['project'] ."&placeholder=true";
?>
                    <a href="casestudy.php?<?php echo $link; ?>">
                        <div class="project small-space">
                            <div class="thumbnail" style="background-image: url(project/<?php echo $_GET['project']; ?>/thumbnail.png); background-image: -webkit-image-set(url(project/<?php echo $_GET['project']; ?>/thumbnail.png) 1x, url(project/<?php echo $_GET['project']; ?>/thumbnail@2x.png) 2x)" data-rjs="2"></div>
                            <p class="title">
                                <?php echo ucwords($_GET['project']); ?>
                            </p>
                            <p class="subtitle text-muted">
                                <?php echo ucwords($_GET['project']); ?>
                            </p>
                        </div>
                    </a>
                    <?php }; ?>
                    
                    <?php 
$projects = $conn->query("SELECT * FROM projects ORDER BY ID DESC LIMIT 4");
while($row = $projects->fetch_assoc()) {
?>
                    <a href="casestudy.php?project=<?php echo $row[folder]; ?>">
                        <div class="project small-space">
                            <div class="thumbnail" style="background-image: url(project/<?php echo $row[folder]; ?>/thumbnail.png); background-image: -webkit-image-set(url(project/<?php echo $row[folder]; ?>/thumbnail.png) 1x, url(project/<?php echo $row[folder]; ?>/thumbnail@2x.png) 2x)" data-rjs="2"></div>
                            <p class="title">
                                <?php echo $row[name]; ?>
                            </p>
                            <p class="subtitle text-muted">
                                <?php echo $row[subtitle]; ?>
                            </p>
                        </div>
                    </a>
                    <?php }; ?>
                    <div class="small-space"></div> <a class="long-button text-black text-smaller" href="projects.php">View Projects</a>
                    <div class="medium-space"></div>
                </div>
                <div class="col-md-3 col-sm-4 logbook">
                    <p>Logbook</p>
                    <?php 
$logs = $conn->query("SELECT * FROM logs ORDER BY date_published DESC LIMIT 6");
while($log = $logs->fetch_assoc()) {
$originalDate = $log[date_published];
$formatedDate = date("d/m/Y", strtotime($originalDate));
$date_published = $formatedDate;
?>
                    <a class="entry" href="log.php?log=<?php echo $log[ID]; ?>">
                        <div class="log small-space">
                            <div class="thumbnail log-thumbnail fluid-image <?php echo $log[size]; ?>" style="background-image: url(logs/<?php echo $log[folder]; ?>/thumbnail.png); background-image: -webkit-image-set(url(logs/<?php echo $log[folder]; ?>/thumbnail.png) 1x, url(logs/<?php echo $log[folder]; ?>/thumbnail@2x.png) 2x)" data-rjs="2"></div>
                            <p class="title">
                                <?php echo $log[title]; ?>
                            </p>
                            <p class="date text-muted">
                                <?php echo $date_published; ?>
                            </p>
                            <p class="preview text-muted text-smaller">
                                <?php echo str_replace("<br />","",$log[content]); ?>
                            </p>
                            <div class="small-space"></div>
                        </div>
                    </a>
                    <?php }; ?>
                    <div class="small-space"></div>
                    <a class="long-button text-black text-smaller" href="logbook.php">View Logbook</a>
                </div>
            </div>
        </div>
        <?php require_once('footer.php');?>
    </body>
</html>