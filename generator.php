<?php require_once('connection.php'); 

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

$link = "invoice.php?project=". $_GET['folder'] ."&date=". $_GET['date'] ."&due=". $_GET['due'] ."&email=". $_GET['email'] ."&tel=". $_GET['tel'] . "&location=" . $_GET['location'] . $item1 . $item2 . $item3 . $item4 . $item5 . $item6 . $status . "&name=" . $_GET['name'] ;

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
    <?php require_once('head.php');?>
    <link rel="stylesheet" href="styles/css/second.css">
</head>

<body>
   <?php require_once('header.php');?>
   
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
                        <input type="text" name="q1" value="<?php echo $_GET['q1']; ?>" placeholder="0">
                        <div class="small-space"></div>
                        <input type="text" name="q2" value="<?php echo $_GET['q2']; ?>" placeholder="0">
                        <div class="small-space"></div>
                        <input type="text" name="q3" value="<?php echo $_GET['q3']; ?>" placeholder="0">
                        <div class="small-space"></div>
                        <input type="text" name="q4" value="<?php echo $_GET['q4']; ?>" placeholder="0">
                        <div class="small-space"></div>
                        <input type="text" name="q5" value="<?php echo $_GET['q5']; ?>" placeholder="0">
                        <div class="small-space"></div>
                        <input type="text" name="q6" value="<?php echo $_GET['q6']; ?>" placeholder="0">
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
                        <input type="text" name="generated" value="generated" hidden="hidden">
                        <input class="link-hover save" type="submit" name="submit" value="Generate Invoice">
                        <div class="small-space"></div>
                        <input type="checkbox" name="status" value="Paid" <?php echo $paid; ?>> <span class="text-smaller"> Paid</span>
                    </div>
                    <!---->
                </form>
            </div>
        </div>
   
   <?php require_once('footer.php');?>
</body>

</html>


