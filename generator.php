<?php require_once('connection.php'); 

//Limit list of item 
$limit = 6;
for ($a = 1; $a <= $limit; $a++) {
    if (!empty($_GET['t'. $a])) {
        ${"item" . $a} = "&t".$a."=" . $_GET['t'.$a] . "&q".$a."=" . $_GET['q'.$a] . "&p".$a."=" . $_GET['p'.$a];
        $amount = $a;
    }
}
$items = $item1 . $item2 . $item3 . $item4 . $item5 . $item6 ;

//Check if paid or not
if (!empty($_GET['status'])) {
    $status = "&status=" . $_GET['status'];
}

//Render link accordingly
$link = "invoice.php?project=". $_GET['folder'] ."&date=". $_GET['date'] ."&due=". $_GET['due'] ."&email=". $_GET['email'] ."&tel=". $_GET['tel'] . "&location=" . $_GET['location']  . "&country=" . $_GET['country'] . $items . "&name=" . $_GET['name'] . "&amount=" . $amount . $status;


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


//Timezone setting
date_default_timezone_set("Asia/Bangkok");
//Date and due date
$date = strtoupper(date("dMY"));
$due = date("d") . strtoupper(date("M", strtotime('+1 month'))) . date("Y");
//Next month
$nextmonth = date("M", strtotime('+1 month'));
//If month is DEC, year plus one
if (strpos($nextmonth, 'dec') !== false OR strpos($nextmonth, 'Dec') !== false OR strpos($nextmonth, 'DEC') !== false) {
    $due = date("d") . strtoupper(date("M", strtotime('+1 month'))) . date("Y", strtotime('+1 year'));
}

//If date is entered, use that one instead
if (!empty($_GET['date'])) {
    $date = $_GET['date'];
}
if (!empty($_GET['due'])) {
    $due = $_GET['due'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
    <?php require_once('head.php');?>
    <link rel="stylesheet" href="styles/css/second.css">
</head>

<body>
   <?php require_once('header.php');?>
   
       <div class="container step3-project <?php echo $project_step3;?>">
            <div class="row medium-space">
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
                        <input type="text" name="date" value="<?php echo $date; ?>" placeholder="<?php echo $date ;?>">
                        <div class="small-space"></div>
                    </div>
                    <!--Clearfix-->
                    <div class="clearfix visible-xs-block"></div>
                    <div class="col-xs-6 col-sm-3">
                        <p>
                            Due Date
                        </p>
                        <input type="text" name="due" value="<?php echo $due; ?>" placeholder="<?php echo $due ;?>">
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
                        <input type="text" name="tel" value="<?php echo $_GET['tel']; ?>" placeholder="(66) 01 234 5678">
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
                    <div class="col-md-3 col-sm-3">
                        <p>
                            Address
                        </p>
                        <input type="text" name="location" value="<?php echo $_GET['location']; ?>" placeholder="Kiluth 45 Nirvana Kalapapruk Jomthong">
                        <div class="small-space"></div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-3">
                        <p>
                            Country & Postal Code
                        </p>
                        <input type="text" name="country" value="<?php echo $_GET['country']; ?>" placeholder="Thailand 10150">
                        <div class="small-space"></div>
                    </div>
                    <!---->
                    
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <p>
                            Item
                        </p>
                        <?php
                        
                            //Loop for identity blocks
                            for ($t = 1; $t <= $limit; $t++) {
                                
                                ?>
                                    <input type="text" name="<?php echo "t". $t; ?>" value="<?php echo $_GET['t' . $t]; ?>">
                                    <div class="small-space"></div>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <p>
                            Quantity
                        </p>
                        
                        <?php
                            //Loop for identity blocks
                            for ($q = 1; $q <= $limit; $q++) {
                                
                                ?>  
                                    <input type="text" name="<?php echo "q". $q; ?>" value="<?php echo $_GET['q' . $q]; ?>" placeholder="0">
                                    <div class="small-space"></div>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2">
                        <p>
                            Price
                        </p>
                        
                        <?php
                            //Loop for identity blocks
                            for ($p = 1; $p <= $limit; $p++) {
                                
                                ?>  
                                    <input type="text" name="<?php echo "p". $p; ?>" value="<?php echo $_GET['p' . $p]; ?>" placeholder="1000">
                                    <div class="small-space"></div>
                                <?php
                            }
                        ?>
                    </div>


                    <!---->
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center submit-holder small-space">
                        <input type="text" name="generated" value="generated" hidden="hidden">
                        <input class="link-hover save" type="submit" name="submit" value="Generate Invoice">
                        <div class="small-space"></div>
                        
                        <?php
                        
if ($_GET['status'] == "Paid") {
    ?>
        <input type="checkbox" name="status" value="Paid" checked> <span class="text-smaller"> Paid</span>
    <?php
} else {
    ?>
        <input type="checkbox" name="status" value="Paid"> <span class="text-smaller"> Paid</span>
    <?php
}
                        ?>
                    </div>
                    <!---->
                </form>
            </div>
        </div>
   
   <?php require_once('footer.php');?>
</body>

</html>


