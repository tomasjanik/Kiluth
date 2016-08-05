<?php require_once('connection.php');

$getfolder = $_GET['project'];
$projects = $conn->query("SELECT * FROM projects WHERE folder='$getfolder' LIMIT 1");

while($project = $projects->fetch_assoc()) {
    $ID = $project[ID];
    $name = $project[name];
    $subtitle = $project[subtitle];
    $business = $project[business];
    $location = $project[location];
    $region = $project[region];
    $description = $project[description];
    $identity = $project[identity];
    $prints = $project[prints];
    $photography = $project[photography];
    $digital = $project[digital];
    $client = $project[client];
    $tags = $project[tags];
    $themeColor = $project[themeColor];
};
$folder = $getfolder;

if (!empty($_GET['theme'])) {
    $themeColor = $_GET['theme'];
}

if (!empty($_GET['name'])) {
    $name = $_GET['name'];
}

if (!empty($_GET['location'])) {
    $location = $_GET['location'];
}

if (!empty($_GET['sector'])) {
    $business = $_GET['sector'];
}

//Replace main.png to thumbnail.png if main.png DOES NOT exist
if (file_exists('project/'.$folder.'/main.png')) {
    $mainImg = "main";
} elseif (file_exists('project/'.$folder.'/thumbnail.png')) {
    $mainImg = "thumbnail";
} else {
    function redirect_to_url($url) {
       if (!headers_sent())
       {    
           header('Location: '.$url);
            exit;
       }
       else
           {  
           echo '<script type="text/javascript">';
           echo 'window.location.href="'.$url.'";';
           echo '</script>';
           echo '<noscript>';
           echo '<meta http-equiv="refresh" content="0; url='.$url.'" />';
           echo '</noscript>'; exit;
       }
    }

    redirect_to_url('404.php');
}

//Hide Module if thumbnail in each folder DOES NOT exist
if (!file_exists('project/'.$folder.'/identity/thumbnail.png')) {$identityEmpty = "hide";} 
if (!file_exists('project/'.$folder.'/prints/thumbnail.png')) {$printsEmpty = "hide";} 
if (!file_exists('project/'.$folder.'/photography/thumbnail.png')) {$photographyEmpty = "hide";} 
if (!file_exists('project/'.$folder.'/digital/thumbnail.png')) {$dititalEmpty = "hide";}

//Block Limit / This limit the number of images that end with .png
$blockLimit = 9;

//Loop for identity blocks
for ($xIdentity = 1; $xIdentity <= $blockLimit; $xIdentity++) {
    if (!file_exists('project/'.$folder.'/identity/'.$xIdentity.'.png')) {
        ${"identity". $xIdentity ."hide"} = "hide";
    }
}

//Loop for photography blocks
for ($xPhotography = 1; $xPhotography <= $blockLimit; $xPhotography++) {
    if (!file_exists('project/'.$folder.'/photography/'.$xPhotography.'.png')) {
        ${"photography". $xPhotography ."hide"} = "hide";
    }
}

//Loop for prints blocks
for ($xPrints = 1; $xPrints <= $blockLimit; $xPrints++) {
    if (!file_exists('project/'.$folder.'/prints/'.$xPrints.'.png')) {
        ${"prints". $xPrints ."hide"} = "hide";
    }
}

//Loop for digital blocks
for ($xDigital = 1; $xDigital <= $blockLimit; $xDigital++) {
    if (!file_exists('project/'.$folder.'/digital/'.$xDigital.'.png')) {
        ${"digital". $xDigital ."hide"} = "hide";
    }
}

//Change template if second photography doesn't exist
if (file_exists('project/'.$folder.'/photography/2.png')) {
    $photography1size = "6";
} else {
    $photography1size = "12";
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php require_once('head.php');?>
            <link rel="stylesheet" href="styles/css/third.css">
            <link rel="stylesheet" href="styles/css/fourth.css">
            <style>
                .thumbnail {
                    background-color: #<?php echo str_replace("#","",$themeColor); ?>;
                }
            </style>
    </head>

    <body>
        <?php require_once('header.php');?>
            <!--Hero Main Image-->
            <div class="container-fluid thumbnail main <?php echo $mainhide; ?>" style="background-image: url(project/<?php echo $folder; ?>/<?php echo $mainImg; ?>.png); background-image: -webkit-image-set(url(project/<?php echo $folder; ?>/<?php echo $mainImg; ?>.png) 1x, url(project/<?php echo $folder; ?>/<?php echo $mainImg; ?>@2x.png) 2x)" data-rjs="2"></div>

            <!--Showcase-->
            <div class="medium-space desktop-only"></div>
            <div class="small-space mobile-only"></div>
            <div class="container">

                <!--About Project-->
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="no-overflow"><?php echo $name; ?></h3>
                        <br />
                        <p class="text-smaller">
                            Sector
                            <br />
                            <span class="text-muted">
                                <?php echo $business; ?>
                            </span>
                            <br />
                            <br /> Location
                            <br />
                            <span class="text-muted">
                                <?php echo $location; ?>
                            </span>
                        </p>
                        <div class="small-space"></div>
                    </div>
                    <div class="col-md-6">
                        <br />
                        <p class="desktop-only">
                            <?php echo $description; ?>
                        </p>
                        <div class="mobile-only">
                            <a class="long-button text-black text-smaller" href="javascript:void(0)" data-toggle="collapse" data-target="#description">+ Project Info</a>
                            <p id="description" class="collapse small-space">
                                <?php echo $description; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="medium-space desktop-only"></div>
                <div class="small-space mobile-only"></div>
                <!--Identity-->
                <div class="<?php echo $identityEmpty; ?>">
                    <div class="thumbnail small-space" style="background-image: url(project/<?php echo $folder; ?>/identity/thumbnail.png); background-image: -webkit-image-set(url(project/<?php echo $folder; ?>/identity/thumbnail.png) 1x, url(project/<?php echo $folder; ?>/identity/thumbnail@2x.png) 2x)" data-rjs="2"></div>
                    <div class="row medium-space">
                        <div class="col-md-6">
                            <p>
                                Identity
                                <br />
                                <br />
                                <span class="text-muted">
                                <?php echo $identity; ?>
                            </span>
                            </p>
                            <div class="medium-space"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="thumbnail log-thumbnail thumbnail-project-logo">
                                <div class="project-logo">
                                    <img src="project/<?php echo $folder; ?>/identity/logo.svg" alt="<?php echo $folder; ?> logo">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <?php for ($xIdentity = 1; $xIdentity <= $blockLimit; $xIdentity++) { ?>
                                <div class="thumbnail log-thumbnail small-space <?php echo ${'identity'. $xIdentity . 'hide'}; ?>" style="background-image: url(project/<?php echo $folder; ?>/identity/<?php echo $xIdentity; ?>.png); background-image: -webkit-image-set(url(project/<?php echo $folder; ?>/identity/<?php echo $xIdentity; ?>.png) 1x, url(project/<?php echo $folder; ?>/identity/<?php echo $xIdentity; ?>@2x.png) 2x)" data-rjs="2"></div>
                                <?php }?>
                        </div>
                    </div>
                </div>

                <!--Photography-->
                <div class="<?php echo $photographyEmpty ?>">
                    <div class="row medium-space">
                        <div class="col-md-6">
                            <p>
                                Photography
                                <br />
                                <br />
                                <span class="text-muted">
                                <?php echo $photography; ?>
                            </span>
                            </p>
                            <div class="medium-space"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="thumbnail log-thumbnail" style="background-image: url(project/<?php echo $folder; ?>/photography/thumbnail.png); background-image: -webkit-image-set(url(project/<?php echo $folder; ?>/photography/thumbnail.png) 1x, url(project/<?php echo $folder; ?>/photography/thumbnail@2x.png) 2x)" data-rjs="2">
                            </div>
                        </div>
                        <?php for ($xPhotography = 1; $xPhotography <= $blockLimit; $xPhotography++) {
                        ?>
                            <div class="col-md-<?php echo $photography1size;?> photography <?php echo ${'photography'. $xPhotography .'hide'}; ?>">
                                <div class="thumbnail log-thumbnail" style="background-image: url(project/<?php echo $folder; ?>/photography/<?php echo $xPhotography; ?>.png); background-image: -webkit-image-set(url(project/<?php echo $folder; ?>/photography/<?php echo $xPhotography; ?>.png) 1x, url(project/<?php echo $folder; ?>/photography/<?php echo $xPhotography; ?>@2x.png) 2x)" data-rjs="2"></div>
                            </div>
                            <?php } ?>

                    </div>
                </div>

                <!--Prints-->
                <div class="<?php echo $printsEmpty ?>">
                    <div class="row medium-space">
                        <div class="col-md-6">
                            <p>
                                Prints
                                <br />
                                <br />
                                <span class="text-muted">
                                <?php echo $prints; ?>
                            </span>
                            </p>
                            <div class="medium-space"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="thumbnail log-thumbnail" style="background-image: url(project/<?php echo $folder; ?>/prints/thumbnail.png); background-image: -webkit-image-set(url(project/<?php echo $folder; ?>/prints/thumbnail.png) 1x, url(project/<?php echo $folder; ?>/prints/thumbnail@2x.png) 2x)" data-rjs="2">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <?php for ($xPrints = 1; $xPrints <= $blockLimit; $xPrints++) {?>
                                <div class="thumbnail log-thumbnail prints-holder small-space <?php echo ${'prints'. $xPrints .'hide'}; ?>">
                                    <img class="prints" src="project/<?php echo $folder; ?>/prints/<?php echo $xPrints; ?>.png" alt="<?php echo $folder; ?> print" data-rjs="2">
                                </div>
                                <?php }?>
                        </div>
                    </div>
                </div>

                <!--Digital-->
                <div class="<?php echo $dititalEmpty; ?>">
                    <div class="row medium-space">
                        <div class="col-md-6">
                            <p>
                                Digital
                                <br />
                                <br />
                                <span class="text-muted">
                                <?php echo $digital; ?>
                            </span>
                            </p>
                            <div class="medium-space"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="thumbnail log-thumbnail" style="background-image: url(project/<?php echo $folder; ?>/digital/thumbnail.png); background-image: -webkit-image-set(url(project/<?php echo $folder; ?>/digital/thumbnail.png) 1x, url(project/<?php echo $folder; ?>/digital/thumbnail@2x.png) 2x)" data-rjs="2">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <?php for ($xDigital = 1; $xDigital <= $blockLimit; $xDigital++) {?>
                                <div class="thumbnail log-thumbnail digital-holder small-space <?php echo ${'digital'. $xDigital .'hide'} ?>">
                                    <img class="digital" src="project/<?php echo $folder; ?>/digital/<?php echo $xDigital; ?>.png" alt="<?php echo $folder; ?> digital" data-rjs="2">
                                </div>
                                <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                //Get number of projects
                $allProjects = $conn->query("SELECT * FROM projects");
                while($allProject = $allProjects->fetch_assoc()) {
                $all = $allProject[ID];
                }

                //Calculate Next and Prev buttons
                $next = $ID + 1;
                $prev = $ID - 1;
                if ($next > $all) { $next = 1; }
                if ($prev == 0) { $prev = $all; }

                //Get next project
                $nextProjects = $conn->query("SELECT * FROM projects WHERE ID='$next' LIMIT 1");
                while($nextProject = $nextProjects->fetch_assoc()) {
                $nextFolder = $nextProject[folder];
                $nextName = $nextProject[name];
                }

                //Get previous project
                $prevProjects = $conn->query("SELECT * FROM projects WHERE ID='$prev' LIMIT 1");
                while($prevProject = $prevProjects->fetch_assoc()) {
                $prevFolder = $prevProject[folder];
                $prevName = $prevProject[name];
                }
            ?>
                <div class="container medium-space order-control">
                    <a href="case-study.php?project=<?php echo $prevFolder; ?>" class="link-hover previous-project style-tooltip" data-toggle="tooltip" data-placement="top" data-html="true" title="<div class='fluid-image' style='margin: 0 0; padding-bottom: 62.5%; width: 18em; display: block; background-image: url(project/<?php echo $prevFolder ;?>/thumbnail.png);'></div>">
                        <p>
                            Previous Project
                        </p>
                    </a>
                    <a href="case-study.php?project=<?php echo $nextFolder; ?>" class="link-hover previous-project pull-right style-tooltip" data-toggle="tooltip" data-placement="top" data-html="true" title="<div class='fluid-image' style='margin: 0 0; padding-bottom: 62.5%; width: 18em; display: block; background-image: url(project/<?php echo $nextFolder ;?>/thumbnail.png);'></div>">
                        <p>
                            Next Project
                        </p>
                    </a>
                </div>
                <div class="fluid-container recent-projects-module small-space">
                    <div class="container small-space">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-white">
                                    Latest Projects
                                </p>
                                <div class="thinline"></div>
                                <div class="small-space"></div>
                            </div>

                            <?php
                            $recentProjects = $conn->query("SELECT * FROM projects");
                            while($recentProject = $recentProjects->fetch_assoc()) {
                                ${'recent'. $recentProject[ID] . 'ID'} = $recentProject[ID];
                                ${'recent'. $recentProject[ID] . 'Folder'} = $recentProject[folder];
                                ${'recent'. $recentProject[ID] . 'Name'} = $recentProject[name];
                                ${'recent'. $recentProject[ID] . 'Sector'} = $recentProject[business];
                            }
                            
                            $allminusone = $all - 1;
                            $allminustwo = $allminusone - 1;
                            $allminusthree = $allminustwo - 1;
                            
                            ?>

                                <div class="col-xs-6 col-sm-3">
                                    <a href="case-study.php?project=<?php echo ${'recent'.$all.'Folder'}; ?>">
                                        <div class="thumbnail log-thumbnail" style="background-image: url(project/<?php echo ${'recent'.$all.'Folder'}; ?>/thumbnail.png);"></div>
                                               <span class="preview text-white text-normal" data-toggle="tooltip" data-placement="top" title="<?php echo ${'recent'.$all.'Name'}; ?>" data-delay='{"show":"2000"}'>
                                                <?php echo ${'recent'.$all.'Name'} ;?>
                                            </span>

                                            <span class="text-smaller text-muted preview" data-toggle="tooltip" data-placement="top" title="<?php echo ${'recent'.$all.'Sector'}; ?>" data-delay='{"show":"2000"}'><?php echo ${'recent'.$all.'Sector'} ;?></span>
                                    </a>
                                    <div class="small-space"></div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <a href="case-study.php?project=<?php echo ${'recent'.$allminusone.'Folder'}; ?>">
                                        <div class="thumbnail log-thumbnail" style="background-image: url(project/<?php echo ${'recent'.$allminusone.'Folder'}; ?>/thumbnail.png);"></div>
                                           <span class="preview text-white text-normal" data-toggle="tooltip" data-placement="top" title="<?php echo ${'recent'.$allminusone.'Name'}; ?>" data-delay='{"show":"2000"}'>
                                                <?php echo ${'recent'.$allminusone.'Name'} ;?>
                                            </span>

                                            <span class="text-smaller text-muted preview" data-toggle="tooltip" data-placement="top" title="<?php echo ${'recent'.$allminusone.'Sector'}; ?>" data-delay='{"show":"2000"}'><?php echo ${'recent'.$allminusone.'Sector'} ;?></span>
                                    </a>
                                    <div class="small-space"></div>
                                </div>
                                <div class="clearfix visible-xs-block"></div>
                                <div class="col-xs-6 col-sm-3">
                                    <a href="case-study.php?project=<?php echo ${'recent'.$allminustwo.'Folder'}; ?>">
                                        <div class="thumbnail log-thumbnail" style="background-image: url(project/<?php echo ${'recent'.$allminustwo.'Folder'}; ?>/thumbnail.png);"></div>
                                               <span class="preview text-white text-normal" data-toggle="tooltip" data-placement="top" title="<?php echo ${'recent'.$allminustwo.'Name'}; ?>" data-delay='{"show":"2000"}'>
                                                <?php echo ${'recent'.$allminustwo.'Name'} ;?>
                                            </span>

                                            <span class="text-smaller text-muted preview" data-toggle="tooltip" data-placement="top" title="<?php echo ${'recent'.$allminustwo.'Sector'}; ?>" data-delay='{"show":"2000"}'><?php echo ${'recent'.$allminustwo.'Sector'} ;?></span>

                                    </a>
                                    <div class="small-space"></div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <a href="case-study.php?project=<?php echo ${'recent'.$allminusthree.'Folder'}; ?>">
                                        <div class="thumbnail log-thumbnail" style="background-image: url(project/<?php echo ${'recent'.$allminusthree.'Folder'}; ?>/thumbnail.png);"></div>
                                            <span class="preview text-white text-normal" data-toggle="tooltip" data-placement="top" title="<?php echo ${'recent'.$allminusthree.'Name'}; ?>" data-delay='{"show":"2000"}'>
                                                <?php echo ${'recent'.$allminusthree.'Name'} ;?>
                                            </span>

                                            <span class="text-smaller text-muted preview" data-toggle="tooltip" data-placement="top" title="<?php echo ${'recent'.$allminusthree.'Sector'}; ?>" data-delay='{"show":"2000"}'><?php echo ${'recent'.$allminusthree.'Sector'} ;?></span>
                                    </a>
                                    <div class="small-space"></div>
                                </div>
                        </div>
                    </div>
                </div>
                <?php require_once('footer.php');?>
    </body>
    </html>