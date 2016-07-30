<?php require_once('connection.php');
// Start the session
session_start();

$passwords = "Poom20051997 kiluthian NIRVANA1145MAX 024394370 wearekiluth";

$getfolder = $_GET['project'];
$getlog = $_GET['log'];
$getcarousel = $_GET['carousel'];
$getmap = $_GET['map'];
$getrecognition = $_GET['recognition'];
$getemail = $_GET['email'];

$getproject_step = $_GET['project_step'];
$getlog_step = $_GET['log_step'];
$getcarousel_step = $_GET['carousel_step'];
$getmap_step = $_GET['map_step'];
$getrecognition_step = $_GET['recognition_step'];
$getemail_step = $_GET['email_step'];

//Project
if(empty($getproject_step)) {
$getproject_step = 1;
}
if($getproject_step == 1) {
$project_step2 = "hide";
$project_step3 = "hide";
}
if($getproject_step == 2) {
$project_step2 = "";
$project_step3 = "hide";
}
if($getproject_step == 3) {
$project_step2 = "";
$project_step3 = "";
}

//Log
if(empty($getlog_step)) {
$getlog_step = 1;
}
if($getlog_step == 1) {
$log_step2 = "hide";
$log_step3 = "hide";
}
if($getlog_step == 2) {
$log_step2 = "";
$log_step3 = "hide";
}
if($getlog_step == 3) {
$log_step2 = "";
$log_step3 = "";
}

//Carousel
if(empty($getcarousel_step)) {
$getcarousel_step = 1;
}
if($getcarousel_step == 1) {
$carousel_step2 = "hide";
$carousel_step3 = "hide";
}
if($getcarousel_step == 2) {
$carousel_step2 = "";
$carousel_step3 = "hide";
}
if($getcarousel_step == 3) {
$carousel_step2 = "";
$carousel_step3 = "";
}

//Map
if(empty($getmap_step)) {
$getmap_step = 1;
}
if($getmap_step == 1) {
$map_step2 = "hide";
$map_step3 = "hide";
}
if($getmap_step == 2) {
$map_step2 = "";
$map_step3 = "hide";
}
if($getmap_step == 3) {
$map_step2 = "";
$map_step3 = "";
}

//Recognition
if(empty($getrecognition_step)) {
$getrecognition_step = 1;
}
if($getrecognition_step == 1) {
$recognition_step2 = "hide";
$recognition_step3 = "hide";
}
if($getrecognition_step == 2) {
$recognition_step2 = "";
$recognition_step3 = "hide";
}
if($getrecognition_step == 3) {
$recognition_step2 = "";
$recognition_step3 = "";
}

//Email
if(empty($getemail_step)) {
$getemail_step = 1;
}
if($getemail_step == 1) {
$email_step2 = "hide";
$email_step3 = "hide";
}
if($getemail_step == 2) {
$email_step2 = "";
$email_step3 = "hide";
}
if($getemail_step == 3) {
$email_step2 = "";
$email_step3 = "";
}

$allprojects = $conn->query("SELECT * FROM projects ORDER BY ID DESC");
$alllogs = $conn->query("SELECT * FROM logs ORDER BY date_published DESC");
$allcarousels = $conn->query("SELECT * FROM carousel");
$allmaps = $conn->query("SELECT * FROM projects ORDER BY ID DESC");
$allrecognitions = $conn->query("SELECT * FROM recognition ORDER BY ID DESC");
$allemails = $conn->query("SELECT * FROM emails ORDER BY date_added DESC");

$projects = $conn->query("SELECT * FROM projects WHERE folder='$getfolder' LIMIT 1");
$logs = $conn->query("SELECT * FROM logs WHERE folder='$getlog' LIMIT 1");
$carousels = $conn->query("SELECT * FROM carousel WHERE folder='$getcarousel' LIMIT 1");
$maps = $conn->query("SELECT * FROM projects WHERE folder='$getmap' LIMIT 1");
$recognitions = $conn->query("SELECT * FROM recognition WHERE recognition='$getrecognition' LIMIT 1");
$emails = $conn->query("SELECT * FROM emails WHERE email='$getemail' LIMIT 1");

while($project = $projects->fetch_assoc()) {
$ID = $project[ID];
$name = $project[name];
$subtitle = $project[subtitle];
$business = $project[business];
$location = $project[location];
$region = $project[region];
$folder = $project[folder];
$description = $project[description];
$identity = $project[identity];
$prints = $project[prints];
$photography = $project[photography];
$digital = $project[digital];
$client = $project[client];
$tags = $project[tags];
$themeColor = $project[themeColor];
};

while($log = $logs->fetch_assoc()) {
$logID = $log[ID];
$date_published = $log[date_published];
$title = $log[title];
$logfolder = $log[folder];
$content = $log[content];
$size = $log[size];
$logtags = $log[tags];
$hidethumbnail = $log[hidethumbnail];
};

while($carousel = $carousels->fetch_assoc()) {
$carouselID = $carousel[ID];
$carouselfolder = $carousel[folder];
$text = $carousel[text];
$active = $carousel[active];
};

while($map = $maps->fetch_assoc()) {
$mapID = $map[ID];
$mapname = $map[name];
$mapsubtitle = $map[subtitle];
$mapbusiness = $map[business];
$maplocation = $map[location];
$mapfolder = $map[folder];
$mapclient = $map[client];
$brief = $map[brief];
$longitude = $map[longitude];
$latitude = $map[latitude];
};

while($recognition = $recognitions->fetch_assoc()) {
$recognitionID = $recognition[ID];
$recognitionrecognition = $recognition[recognition];
};

while($email = $emails->fetch_assoc()) {
$emailID = $email[ID];
$emaildate_added = $email[date_added];
$emailemail = $email[email];
};

//Find last item
$allprojectitems = $conn->query("SELECT * FROM projects");
while($project = $allprojectitems->fetch_assoc()) {
$lastproject = $project[folder];
}
$allentries = $conn->query("SELECT * FROM logs ORDER BY date_published");
while($log = $allentries->fetch_assoc()) {
$lastlog = $log[ID];
}

if (!empty($date_published)) {
    //Convert date format
    $originalDate = $date_published;
    $formatedDate = date("d/m/Y", strtotime($originalDate));
    $date_published = $formatedDate;
} else {
    $date_published = "";
}

function redirect_to_url($url) {
                        if (!headers_sent()) {
                            header('Location: '.$url);
                            exit;
                        } else {
                            echo '<script type="text/javascript">';
                            echo 'window.location.href="'.$url.'";';
                            echo '</script>';
                            echo '<noscript>';
                            echo '<meta http-equiv="refresh" content="0; url='.$url.'" />';
                            echo '</noscript>'; exit;
                        }
                    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php require_once('head.php');?>
            <link rel="stylesheet" href="styles/second.css">
            <style>
                input[type=submit] {
                    font-size: 18px;
                }
            </style>
    </head>

    <body>
        <?php require_once('header.php');
        $token = bin2hex(openssl_random_pseudo_bytes(16));
        
            if (empty($_POST[password])) {
                $invalid = "Enter Password";
            } else {
                 if (strpos($passwords, $_POST[password]) !== false) {
                    $_SESSION["token"] = $token;
                    redirect_to_url('admin.php?login=' . $token);
                } else {
                    $invalid = "Invalid Password";
                }
            }
        
        if (empty($_GET[login])) {
            $steps = "";
        } else {
            if ($_GET[login] !== $_SESSION["token"]) {
                $steps = "";
            } elseif ($_GET[login] == $_SESSION["token"]) {
                $steps = require_once('panel.php');
                $loginpanel = "hide";
            } 
        }
        
        
        
        if ($_GET[login] == "yes") {
            $stringurl = $_SERVER['QUERY_STRING'];
            $stringurl = str_replace("login=yes","",$stringurl);
            $_SESSION["token"] = $token;
            redirect_to_url('admin.php?login=' . $token . $stringurl);
        }
        ?>

            <div class="container space <?php echo $loginpanel; ?>">
                <h2 class="text-center">Admin</h2>
                <div class="small-space"></div>
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            Login
                        </p>
                        <div class="small-space"></div>
                    </div>
                    <div class="col-md-6">
                        <form action="admin.php" method="post" enctype="application/x-www-form-urlencoded">
                            <input type="password" name="password" placeholder="<?php echo $invalid; ?>" required>
                        </form>
                    </div>
                </div>
            </div>

            <?php $steps; ?>
                <?php require_once('footer.php'); ?>

                    <!--Project Scroll-->
                    <?php function scrollto2_project() { ?>
                        <script>
                            $('html, body').animate({
                                scrollTop: $(".step2-project").offset().top
                            }, 500);
                        </script>
                        <?php } ?>
                            <?php function scrollto3_project() { ?>
                                <script>
                                    $('html, body').animate({
                                        scrollTop: $(".step3-project").offset().top
                                    }, 500);
                                </script>
                                <?php } ?>
                                    <?php if($getproject_step == 2) { scrollto2_project(); } ?>
                                        <?php if($getproject_step == 3) { scrollto3_project(); } ?>

                                            <!--Log Scroll-->
                                            <?php function scrollto2_log() { ?>
                                                <script>
                                                    $('html, body').animate({
                                                        scrollTop: $(".step2-log").offset().top
                                                    }, 500);
                                                </script>
                                                <?php } ?>
                                                    <?php function scrollto3_log() { ?>
                                                        <script>
                                                            $('html, body').animate({
                                                                scrollTop: $(".step3-log").offset().top
                                                            }, 500);
                                                        </script>
                                                        <?php } ?>
                                                            <?php if($getlog_step == 2) { scrollto2_log(); } ?>
                                                                <?php if($getlog_step == 3) { scrollto3_log(); } ?>

                                                                    <!--Carousel Scroll-->
                                                                    <?php function scrollto2_carousel() { ?>
                                                                        <script>
                                                                            $('html, body').animate({
                                                                                scrollTop: $(".step2-carousel").offset().top
                                                                            }, 500);
                                                                        </script>
                                                                        <?php } ?>
                                                                            <?php function scrollto3_carousel() { ?>
                                                                                <script>
                                                                                    $('html, body').animate({
                                                                                        scrollTop: $(".step3-carousel").offset().top
                                                                                    }, 500);
                                                                                </script>
                                                                                <?php } ?>
                                                                                    <?php if($getcarousel_step == 2) { scrollto2_carousel(); } ?>
                                                                                        <?php if($getcarousel_step == 3) { scrollto3_carousel(); } ?>

                                                                                            <!--Map Scroll-->
                                                                                            <?php function scrollto2_map() { ?>
                                                                                                <script>
                                                                                                    $('html, body').animate({
                                                                                                        scrollTop: $(".step2-map").offset().top
                                                                                                    }, 500);
                                                                                                </script>
                                                                                                <?php } ?>
                                                                                                    <?php function scrollto3_map() { ?>
                                                                                                        <script>
                                                                                                            $('html, body').animate({
                                                                                                                scrollTop: $(".step3-map").offset().top
                                                                                                            }, 500);
                                                                                                        </script>
                                                                                                        <?php } ?>
                                                                                                            <?php if($getmap_step == 2) { scrollto2_map(); } ?>
                                                                                                                <?php if($getmap_step == 3) { scrollto3_map(); } ?>

                                                                                                                    <!--Recognition Scroll-->
                                                                                                                    <?php function scrollto2_recognition() { ?>
                                                                                                                        <script>
                                                                                                                            $('html, body').animate({
                                                                                                                                scrollTop: $(".step2-recognition").offset().top
                                                                                                                            }, 500);
                                                                                                                        </script>
                                                                                                                        <?php } ?>
                                                                                                                            <?php function scrollto3_recognition() { ?>
                                                                                                                                <script>
                                                                                                                                    $('html, body').animate({
                                                                                                                                        scrollTop: $(".step3-recognition").offset().top
                                                                                                                                    }, 500);
                                                                                                                                </script>
                                                                                                                                <?php } ?>
                                                                                                                                    <?php if($getrecognition_step == 2) { scrollto2_recognition(); } ?>
                                                                                                                                        <?php if($getrecognition_step == 3) { scrollto3_recognition(); } ?>

                                                                                                                                            <!--Email Scroll-->
                                                                                                                                            <?php function scrollto2_email() { ?>
                                                                                                                                                <script>
                                                                                                                                                    $('html, body').animate({
                                                                                                                                                        scrollTop: $(".step2-email").offset().top
                                                                                                                                                    }, 500);
                                                                                                                                                </script>
                                                                                                                                                <?php } ?>
                                                                                                                                                    <?php function scrollto3_email() { ?>
                                                                                                                                                        <script>
                                                                                                                                                            $('html, body').animate({
                                                                                                                                                                scrollTop: $(".step3-email").offset().top
                                                                                                                                                            }, 500);
                                                                                                                                                        </script>
                                                                                                                                                        <?php } ?>
                                                                                                                                                            <?php if($getemail_step == 2) { scrollto2_email(); } ?>
                                                                                                                                                                <?php if($getemail_step == 3) { scrollto3_email(); } ?>
    </body>

    </html>