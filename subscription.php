<?php require_once('connection.php');
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
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php require_once('head.php');?>
            <link rel="stylesheet" href="styles/third.css"> </head>

    <body>
        <?php require_once('header.php');
        $email = $_POST[email];

if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $sql = "INSERT INTO emails (email) VALUES ('$email')";
    
    // the message
    $msg = "Email: " . $_POST[email];

    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);

    // send email
    mail("poom@kiluth.com","Received new client's email!",$msg);
    
    //added email
    $added = true;
    
} else {
    ?>
            <div class="container">
                <div class="space"></div>
                <h2 class="text-center">Invalid Email Address</h2> </div>
            <?php
    $added = false;
}

if ($conn->query($sql) === TRUE) {
    ?>
                <div class="container">
                    <div class="space"></div>
                    <h2 class="text-center">Email Added</h2> </div>
                <?php
} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
    echo $sql . "<br>" . $conn->error;
}
        
        require_once('footer.php');

$conn->close();
        if ($added == true) {
            redirect_to_url('index.php');
        }
?>
    </body>