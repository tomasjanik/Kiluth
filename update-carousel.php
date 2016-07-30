<?php require_once('connection.php');

$ID = str_replace("'","''",$_POST[ID]);
$text = str_replace("'","''",$_POST[text]);
$folder = str_replace("'","''",$_POST[folder]);
$active = str_replace("'","''",$_POST[active]);

//replace <br> with <br />
$text = str_replace("<br>","<br />",$text);

if(strpos($_POST[submit], 'Save') !== false) {
        //Update existing log
        $sql = "UPDATE carousel
        SET 

        text='$text',
        folder='$folder',
        active='$active'


        WHERE ID='$ID'";
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

redirect_to_url('admin.php?login=yes&carousel_step=3&carousel='.$folder);
?>