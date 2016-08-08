<?php require_once('connection.php');?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php require_once('head.php');?>
            <link rel="stylesheet" href="styles/css/third.css">
    </head>

    <body>
        <?php require_once('header.php');?>
            <nav class="navbar tablet-up-only">
                <div class="container">
                    <ul class="nav navbar-nav second">
                        <li><a class="link active select select-all" href="javascript:void(0)">All</a></li>
                        <li class="disable-slash"><a class="text-muted">/</a></li>
                        <li><a class="link select select-insight" href="javascript:void(0)">Insight</a></li>
                        <li class="disable-slash"><a class="text-muted">/</a></li>
                        <li><a class="link select select-launch" href="javascript:void(0)">Launch</a></li>
                        <li class="disable-slash"><a class="text-muted">/</a></li>
                        <li><a class="link select select-new-clients" href="javascript:void(0)">New Client</a></li>
                    </ul>
                </div>
            </nav>
            <div class="small-space tablet-up-only"></div>
            <div class="container">
                <div class="row logs-holder">
<?php $logs = $conn->query("SELECT * FROM logs ORDER BY date_published DESC");
while($log = $logs->fetch_assoc()) {
//renderLogs($log[ID] ,$log[date_published], $log[title], $log[folder], $log[content], $log[size], $log[tags]);
    $originalDate = $log[date_published];
$formatedDate = date("d/m/Y", strtotime($originalDate));
$date_published = $formatedDate;
    ?>
                    <a href="log.php?log=<?php echo $log[ID]; ?>" class="col-sm-6 project-view log-view item <?php echo $log[tags]; ?>">
                        <div class="thumbnail log-thumbnail" style="background-image: url(logs/<?php echo $log[folder]; ?>/thumbnail.png); background-image: -webkit-image-set(url(logs/<?php echo $log[folder]; ?>/thumbnail.png) 1x, url(logs/<?php echo $log[folder]; ?>/thumbnail@2x.png) 2x)" data-rjs="2">
                        </div>
                        <div class="log-info">
                            <p class="name preview" data-toggle="tooltip" data-placement="top" title="<?php echo $log[title]; ?>" data-delay='{"show":"2000"}'><?php echo $log[title]; ?></p>
                            <p class="text-muted text-smaller"><?php echo $date_published; ?></p>
                        </div>
                        <br />
                    </a>
                    <?php }; ?>
                </div>
            </div>
            <?php require_once('footer.php');?>
            <script>
                //Filter Select
                $('.select-insight').click(function () {
                    setTimeout(function () {
                        $('.Insight').fadeIn();
                    }, 500);
                });
                $('.select-launch').click(function () {
                    setTimeout(function () {
                        $('.Launch').fadeIn();
                    }, 500);
                });
                $('.select-new-clients').click(function () {
                    setTimeout(function () {
                        $('.NewClient').fadeIn();
                    }, 500);
                });
            </script>
    </body>

    </html>