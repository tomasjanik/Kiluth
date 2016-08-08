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

$email = $_GET['email'];
$code = "#" . $ID . $name[0] . $region[0] . $location[0] . $email[0];
$date = $_GET['date'];
$duedate = $_GET['due'];

$dd = $date[0] . $date[1];
$mm = $date[2] . $date[3] . $date[4];
$yy = $date[5] . $date[6] . $date[7] . $date[8];
$date = $dd . " " . $mm . " " . $yy;

$dd = $duedate[0] . $duedate[1];
$mm = $duedate[2] . $duedate[3] . $duedate[4];
$yy = $duedate[5] . $duedate[6] . $duedate[7] . $duedate[8];
$duedate = $dd . " " . $mm . " " . $yy;

 $limit = $_GET['amount'];

$total = $_GET[p1] + $_GET[p2] + $_GET[p3] + $_GET[p4] + $_GET[p5] + $_GET[p6];
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
       <meta http-equiv="cache-control" content="max-age=0" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="pragma" content="no-cache" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="format-detection" content="telephone=no">
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="57x57" href="images/favicons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="images/favicons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/favicons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="images/favicons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/favicons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="images/favicons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="images/favicons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="images/favicons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="images/favicons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="images/favicons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="images/favicons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicons/favicon-16x16.png">
        <link rel="manifest" href="images/favicons/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="images/favicons/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="styles/fonts/theinhardt.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
        <style>
            /*Scrollbar*/
            
            ::-webkit-scrollbar {
                width: 2px;
            }
            
            ::-webkit-scrollbar-track {
                background-color: #000;
            }
            
            ::-webkit-scrollbar-thumb {
                background-color: #fff;
            }
        </style>
        <title>Thank you.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" /> </head>

    <body style="margin: 0; padding: 0; background-color: #f8f8f8;">
        <div style="font-family: 'Open Sans', sans-serif; font-weight: 100;">
            <p style="opacity: 0; color: #f8f8f8; height: 0px; font-size: 18px;">Your invoice has been generated! Thank you for using our service. We hope to work with you again in the future.</p>
            <table align="center" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; text-align: left;  padding: 50px 20px; background-color: #f8f8f8; color: #333333; line-height: 30px;">
                <tr>
                    <td>
                        
                        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin: 0px auto; font-size: 12px; line-height: 20px;">
                            <tr style="text-align: left;">
                                <td width="20%" valign="center">
                                    <p style="font-weight: 600; font-size: 70px; letter-spacing: 1px; margin: 0;">K</p>
                                </td>
                                <td style="font-size: 0;" width="10"> &nbsp; </td>
                                <td width="50%" valign="top">
                                    <p style="margin: 0; text-align: right;">
                                       <span style="font-weight: 600; letter-spacing: 1px;">Kiluth Thailand</span>
                                       <br />
                                        11/45 Nirvana Kalapapruk
                                        <br />
                                        Jomthong Bangkok 10150
                                    </p>
                                </td>
                                <td style="font-size: 0;" width="10"> &nbsp; </td>
                                <td width="30%" valign="top">
                                    <p style="margin: 0; text-align: left; margin-left: 30px; padding-left: 30px; border-left: 1px solid #C9C9C9;">
                                       <span style="font-weight: 600; letter-spacing: 1px;">Contact</span>
                                       <br />
                                       <a href="tel:+66 93 124 2007" style="text-decoration: none; color: inherit;">+66 93 124 2007</a>
                                        <br />
                                        <a href="mailto:hello@kiluth.com" style="text-decoration: none; color: inherit;">hello@kiluth.com</a>
                                    </p>
                                </td>
                            </tr>
                        </table>
                        
                        <br />
                        
                        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin: 0px auto;">
                            <tr>
                                <td width="50%" valign="top">
                                    <p style="margin: 0; text-align: left; padding-top: 20px; font-size: 28px; font-weight: 600;"> INVOICE </p>
                                </td>
                                <td style="font-size: 0;" width="10"> &nbsp; </td>
                                <td width="50%" valign="top" style="font-size: 20px;">
                                   <?php
                                    if (strpos($_GET['status'], 'paid') !== false) {
                                        ?>
                                            <p style="text-align: right; text-transform: uppercase;"> <span style="color: #0ae276;">
                                                Paid
                                            </span> </p>
                                        <?php
                                    } else {
                                        ?>
                                            <p style="text-align: right; text-transform: uppercase;"> <span style="color: #fe4858;">
                                                Unpaid
                                            </span> </p>
                                        <?php
                                    }
                                    ?>
                                    
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table cellpadding="0" cellspacing="0" style="width: 100%; border-bottom: 1px solid #C9C9C9; margin: 30px auto;  font-size: 12px; opacity: 0.5;">
                            <tr style="text-align: left;">
                                <td width="40%" valign="top">
                                    <p style="margin: 0;"> CUSTOMER </p>
                                </td>
                                <td style="font-size: 0;" width="10"> &nbsp; </td>
                                <td width="30%" valign="top">
                                    <p style="margin: 0; text-align: right;"> INVOICE NO. </p>
                                </td>
                                <td style="font-size: 0;" width="10"> &nbsp; </td>
                                <td width="30%" valign="top">
                                    <p style="margin: 0; text-align: right;">
                                       <?php echo $code; ?>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table cellpadding="0" cellspacing="0" style="width: 100%; margin: 0px auto;  font-size: 12px;">
                            <tr style="text-align: left;">
                                <td width="40%" valign="top">
                                    <p style="margin: 0;"> <span style="opacity: 0.5;">Client</span>
                                        <br /> <span style=" font-size: 18px; font-weight: 400;"><?php echo $client; ?></span>
                                        <br />
                                        <a href="mailto:<?php echo $_GET['email']; ?>" style="text-decoration: none; color: inherit;"><?php echo $_GET['email']; ?></a>
                                            <br />
                                            <a href="tel:<?php echo str_replace("(","(+",$_GET['tel']); ?>" style="text-decoration: none; color: inherit;"><?php echo str_replace("(","(+",$_GET['tel']); ?></a>
                                                <br />
                                                <br />
                                                <?php echo $_GET['location']; ?>
                                    </p>
                                </td>
                                <td style="font-size: 0;" width="10"> &nbsp; </td>
                                <td width="30%" valign="top">
                                    <p style="margin: 0; text-align: right; opacity: 0.5;"> 
                                        Date:
                                        <br /> 
                                        Due Date: 
                                    </p>
                                </td>
                                <td style="font-size: 0;" width="10"> &nbsp; </td>
                                <td width="30%" valign="top">
                                    <p style="margin: 0; text-align: right; text-transform: uppercase;">
                                        <?php echo $date; ?>
                                            <br />
                                            <?php echo $duedate; ?>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table cellpadding="0" cellspacing="0" style="width: 100%; border-bottom: 1px solid #C9C9C9; margin: 30px auto;  font-size: 12px; opacity: 0.5;">
                            <tr style="text-align: left;">
                                <td width="40%" valign="top">
                                    <p style="margin: 0;"> SERVICES </p>
                                </td>
                                <td style="font-size: 0;" width="10"> &nbsp; </td>
                                <td width="30%" valign="top">
                                    <p style="margin: 0; text-align: right;"> QUANTITY </p>
                                </td>
                                <td style="font-size: 0;" width="10"> &nbsp; </td>
                                <td width="30%" valign="top">
                                    <p style="margin: 0; text-align: right;"> PRICE </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <?php 
                if (!empty($_GET['t1'])) {
                    ?>
                    <tr>
                        <td>
                            <table cellpadding="0" cellspacing="0" style="width: 100%; margin: 0px auto;  font-size: 12px;">
                                <tr style="text-align: left;">
                                    <td width="40%" valign="top">
                                        <p style="margin: 0;">
                                            <?php 

for ($t = 1; $t <= $limit; $t++) {
    if (!empty($_GET['t'].$t)) {
        echo $_GET['t'.$t] . "<br />"; 
    }  
}
?>
                                        </p>
                                    </td>
                                    <td style="font-size: 0;" width="10"> &nbsp; </td>
                                    <td width="30%" valign="top">
                                        <p style="margin: 0; text-align: right;">
                                            <?php 
for ($q = 1; $q <= $limit; $q++) {
    if (!empty($_GET['q'.$q])) {
        echo number_format($_GET['q'.$q]) . "<br />"; 
    }   
}                    
?>
                                        </p>
                                    </td>
                                    <td style="font-size: 0;" width="10"> &nbsp; </td>
                                    <td width="30%" valign="top">
                                        <p style="margin: 0; text-align: right;">
                                            <?php 
for ($p = 1; $p <= $limit; $p++) {
    if (!empty($_GET['p'.$p])) {
        echo number_format($_GET['p'.$p]) . " THB<br />"; 
    }   
} 
?>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <?php
                }
            ?>
                        <tr>
                            <td>
                                <table cellpadding="0" cellspacing="0" style="width: 100%; border-top: 1px solid #191919; margin-top: 90px; padding-top: 30px;  font-size: 12px;">
                                    <tr style="text-align: left;">
                                        <td width="50%" valign="top">
                                            <p style="margin: 0;"> 245-0-69479-5 ปวรุตม์ เพ็งเจริญ Bangkok Bank </p>
                                        </td>
                                        <td style="font-size: 0;" width="10"> &nbsp; </td>
                                        <td width="20%" valign="top">
                                            <p style="margin: 0; text-align: right; opacity: 0.5;"> TOTAL </p>
                                        </td>
                                        <td style="font-size: 0;" width="10"> &nbsp; </td>
                                        <td width="30%" valign="top">
                                            <p style="margin: 0; text-align: right;">
                                                <?php echo number_format($total); ?> THB </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
            </table>
        </div>
    </body>

    </html>