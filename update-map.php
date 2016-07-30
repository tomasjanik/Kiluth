<?php require_once('connection.php');

$ID = str_replace("'","''",$_POST[ID]);
$folder = str_replace("'","''",$_POST[folder]);
$client = str_replace("'","''",$_POST[client]);
$longitude = str_replace("'","''",$_POST[longitude]);
$latitude = str_replace("'","''",$_POST[latitude]);
$brief = str_replace("'","''",$_POST[brief]);

//replace <br> with <br />
$brief = str_replace("<br>","<br />",$brief);


if(strpos($_POST[submit], 'Save') !== false) {
        //Update existing log
        $sql = "UPDATE projects
        SET 

        longitude='$longitude',
        latitude='$latitude',
        brief='$brief'


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

redirect_to_url('admin.php?login=yes&map_step=3&map='.$folder);
?>