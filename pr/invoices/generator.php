<?php require_once('../../connection.php'); 

if (!empty($_GET['t1'])) {
    $item1 = "&t1=" . $_GET['t1'] . "&q1=" . $_GET['q1'] . "&p1=" . $_GET['p1'];
}

if (!empty($_GET['t2'])) {
    $item2 = "&t2=" . $_GET['t2'] . "&q2=" . $_GET['q2'] . "&p2=" . $_GET['p2'];
}

if (!empty($_GET['t3'])) {
    $item3 = "&t3=" . $_GET['t3'] . "&q4=" . $_GET['q3'] . "&p3=" . $_GET['p3'];
}

if (!empty($_GET['t4'])) {
    $item4 = "&t4=" . $_GET['t4'] . "&q4=" . $_GET['q4'] . "&p4=" . $_GET['p4'];
}

if (!empty($_GET['t5'])) {
    $item5 = "&t5=" . $_GET['t5'] . "&q5=" . $_GET['q5'] . "&p5=" . $_GET['p5'];
}

if (!empty($_GET['t6'])) {
    $item6 = "&t6=" . $_GET['t6'] . "&q6=" . $_GET['q6'] . "&p6=" . $_GET['p6'];
}

if (!empty($_GET['status'])) {
    $status = "&status=" . $_GET['status'];
}

$link = "http://kiluth.com/pr/invoices/invoice.php?project=". $_GET['folder'] ."&date=". $_GET['date'] ."&due=". $_GET['due'] ."&email=". $_GET['email'] ."&tel=". $_GET['tel'] . "&location=" . $_GET['location'] . $item1 . $item2 . $item3 . $item4 . $item5 . $item6 . $status . "&name=" . $_GET['name'] ;

if ($_GET['status'] == "Paid") {
    $paid == "checked";
} else {
    $paid == "";
}


function redirect_to_url($url)
{
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

if ($_GET['generated'] == "generated") {
    redirect_to_url($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <!--Property of Kiluth | (c) 2016 Kiluth-->
<!--Alpha 1.0.2-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<!-- The above meta tags MUST come first in the head -->
<!-- Favicon -->
<link rel="apple-touch-icon" sizes="57x57" href="../../images/favicons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../../images/favicons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../../images/favicons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../../images/favicons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../../images/favicons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../../images/favicons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../../images/favicons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../../images/favicons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../../images/favicons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../../images/favicons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../../images/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../../images/favicons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../../images/favicons/favicon-16x16.png">
<link rel="manifest" href="../../images/favicons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../../images/favicons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<title>Kiluth</title>
<!-- Bootstrap --><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!--Fonts-->
<link rel="stylesheet" href="../../styles/fonts/theinhardt.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
<!--Map--><link rel="stylesheet" href='https://api.mapbox.com/mapbox-gl-js/v0.21.0/mapbox-gl.css'>
<!--CSS--><link rel="stylesheet" href="../../styles/css/main.css">
<link rel="stylesheet" href="../../styles/css/second.css">
<!--jQuery--><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!--Map--><script type="text/javascript" src='https://api.mapbox.com/mapbox-gl-js/v0.21.0/mapbox-gl.js'></script>
<!--ListJs--><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.2.0/list.min.js"></script>
<!--RetinaJS--><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/retina.js/1.3.0/retina.min.js"></script>
<!--Main Script--><script type="text/javascript" src="../../scripts/main.js"></script>
</head>

<body>
   <?php require_once('../../header.php');?>
   
       <div class="container space step3-project <?php echo $project_step3;?>">
          <div class="space"></div>
           <h2 class="text-center">Invoice Generator</h2>
            <div class="medium-space"></div>
            <div class="row">
                <form action="generator.php" method="get">
                    <!---->
                    <div class="col-xs-6 col-sm-3">
                        <p>
                            Name
                        </p>
                        <input type="text" name="name" value="<?php echo $_GET['name']; ?>" placeholder="Project">
                        <div class="small-space"></div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <p>
                            Date
                        </p>
                        <input type="text" name="date" value="<?php echo $_GET['date']; ?>" placeholder="01JAN2000">
                        <div class="small-space"></div>
                    </div>
                    <!--Clearfix-->
                    <div class="clearfix visible-xs-block"></div>
                    <div class="col-xs-6 col-sm-3">
                        <p>
                            Due Date
                        </p>
                        <input type="text" name="due" value="<?php echo $_GET['due']; ?>" placeholder="01JAN2000">
                        <div class="small-space"></div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <p>
                            Email
                        </p>
                        <input type="text" name="email" value="<?php echo $_GET['email']; ?>" placeholder="user@address.com">
                        <div class="small-space"></div>
                    </div>
                    <!---->

                    <!---->
                    <div class="col-xs-6 col-sm-3">
                        <p>
                            Tel
                        </p>
                        <input type="text" name="tel" value="<?php echo $_GET['tel']; ?>" placeholder="(01) 99 999 9999">
                        <div class="small-space"></div>
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <p>
                            Folder
                        </p>
                        <input type="text" name="folder" value="<?php echo $_GET['project']; ?>" placeholder="no-cap" required>
                        <div class="small-space"></div>
                    </div>
                    <!--Clearfix-->
                    <div class="clearfix visible-xs-block"></div>
                    <div class="col-xs-6 col-sm-3">
                        <p>
                            Location
                        </p>
                        <input type="text" name="location" value="<?php echo $_GET['location']; ?>" placeholder="Bangkok, Thailand">
                        <div class="small-space"></div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-3">
                        
                    </div>
                    <!---->
                    
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p>
                            Item
                        </p>
                        <input type="text" name="t1" value="<?php echo $_GET['t1']; ?>" placeholder="Item">
                        <div class="small-space"></div>
                        <input type="text" name="t2" value="<?php echo $_GET['t2']; ?>" placeholder="Item">
                        <div class="small-space"></div>
                        <input type="text" name="t3" value="<?php echo $_GET['t3']; ?>" placeholder="Item">
                        <div class="small-space"></div>
                        <input type="text" name="t4" value="<?php echo $_GET['t4']; ?>" placeholder="Item">
                        <div class="small-space"></div>
                        <input type="text" name="t5" value="<?php echo $_GET['t5']; ?>" placeholder="Item">
                        <div class="small-space"></div>
                        <input type="text" name="t6" value="<?php echo $_GET['t6']; ?>" placeholder="Item">
                        <div class="small-space"></div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <p>
                            Quatity
                        </p>
                        <input type="text" name="q1" value="<?php echo $_GET['q1']; ?>" placeholder="1">
                        <div class="small-space"></div>
                        <input type="text" name="q2" value="<?php echo $_GET['q2']; ?>" placeholder="1">
                        <div class="small-space"></div>
                        <input type="text" name="q3" value="<?php echo $_GET['q3']; ?>" placeholder="1">
                        <div class="small-space"></div>
                        <input type="text" name="q4" value="<?php echo $_GET['q4']; ?>" placeholder="1">
                        <div class="small-space"></div>
                        <input type="text" name="q5" value="<?php echo $_GET['q5']; ?>" placeholder="1">
                        <div class="small-space"></div>
                        <input type="text" name="q6" value="<?php echo $_GET['q6']; ?>" placeholder="1">
                        <div class="small-space"></div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <p>
                            Price
                        </p>
                        <input type="text" name="p1" value="<?php echo $_GET['p1']; ?>" placeholder="1000">
                        <div class="small-space"></div>
                        <input type="text" name="p2" value="<?php echo $_GET['p2']; ?>" placeholder="1000">
                        <div class="small-space"></div>
                        <input type="text" name="p3" value="<?php echo $_GET['p3']; ?>" placeholder="1000">
                        <div class="small-space"></div>
                        <input type="text" name="p4" value="<?php echo $_GET['p4']; ?>" placeholder="1000">
                        <div class="small-space"></div>
                        <input type="text" name="p5" value="<?php echo $_GET['p5']; ?>" placeholder="1000">
                        <div class="small-space"></div>
                        <input type="text" name="p6" value="<?php echo $_GET['p6']; ?>" placeholder="1000">
                        <div class="small-space"></div>
                    </div>


                    <!---->
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center submit-holder small-space">
                       <input type="checkbox" name="status" value="Paid" <?php echo $paid; ?>> <span class="text-smaller"> Paid</span>
                        <div class="small-space"></div>
                        <input type="text" name="generated" value="generated" hidden="hidden">
                        <input class="link-hover save" type="submit" name="submit" value="Generate Invoice">
                    </div>
                    <!---->
                </form>
            </div>
        </div>
   
   <?php require_once('../../footer.php');?>
</body>

</html>


