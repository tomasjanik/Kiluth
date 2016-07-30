<?php require_once('connection.php');?>
    <?php

$ID = str_replace("'","''",$_POST[ID]);
$recognition = str_replace("'","''",$_POST[recognition]);


if(strpos($_POST[submit], 'Save') !== false) {
    if(empty($ID)) {
    //Add new recognition
    $sql = "INSERT INTO recognition (recognition)
    VALUES ('$recognition')";  
    } 
    if(!empty($ID)) {
        //Update existing log
        $sql = "UPDATE recognition
        SET 

        recognition='$recognition'


        WHERE ID='$ID'";
    }
}

if (strpos($_POST[submit], 'Delete') !== false) {
    $sql = "DELETE FROM recognition
    WHERE ID='$ID';";
    $sql .= "ALTER TABLE recognition AUTO_INCREMENT = 1";
    
    mysqli_multi_query($conn, $sql);
}



if ($conn->query($sql) === TRUE) {
    //echo "Email added.<br />";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


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

redirect_to_url('admin.php?login=yes&recognition_step=3&recognition='.$recognition);
?>