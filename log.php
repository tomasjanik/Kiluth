<?php require_once('connection.php');?>
<?php 
$ID = $_GET['log'];
$logs = $conn->query("SELECT * FROM logs WHERE ID='$ID' LIMIT 1");
while($log = $logs->fetch_assoc()) {
    $ID = $log[ID];
    $date = $log[date_published];
    $title = $log[title];
    $folder = $log[folder];
    $content = $log[content];
    $size = $log[size];
    $tags = $log[tags];
    $hidethumbnail = $log[hidethumbnail];
};

$originalDate = $date;
$formatedDate = date("d/m/Y", strtotime($originalDate));
$date = $formatedDate;
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once('head.php');?>
        <link rel="stylesheet" href="styles/third.css">
        <link rel="stylesheet" href="styles/fourth.css">
    </head>

    <body>
        <?php require_once('header.php');?>
            <div class="container small-space">
                <div class="row">
                    <div class="col-md-6">
                       <div class="widescreen-only thumbnail log-thumbnail nobg <?php echo $size; ?> <?php echo $hidethumbnail; ?>">
                        </div>
                        <div class="medium-space widescreen-only <?php echo $hidethumbnail; ?>"></div>
                        <p>
                            <span class="text-bigger"><?php echo $title; ?></span>
                            <br />
                            <span class="text-muted"><?php echo $date; ?></span>
                        </p>
                        <div class="small-space"></div>
                    </div>

                    <div class="col-md-6">
                        <div class="thumbnail log-thumbnail <?php echo $size; ?> <?php echo $hidethumbnail; ?>" style="background-image: url(logs/<?php echo $folder; ?>/thumbnail.png); background-image: -webkit-image-set(url(logs/<?php echo $folder; ?>/thumbnail.png) 1x, url(logs/<?php echo $folder; ?>/thumbnail@2x.png) 2x)" data-rjs="2">
                        </div>
                        <div class="mobile-only small-space <?php echo $hidethumbnail; ?>"></div>
                        <div class="medium-space widescreen-only <?php echo $hidethumbnail; ?>"></div>
                        <p>
                            <?php echo $content; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php require_once('footer.php');?>
    </body>
</html>