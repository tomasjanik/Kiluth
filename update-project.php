<?php require_once('connection.php');

$tags1 = str_replace("'","''",$_POST[tags1]);
$tags2 = str_replace("'","''",$_POST[tags2]);
$tags3 = str_replace("'","''",$_POST[tags3]);

$ID = str_replace("'","''",$_POST[ID]);
$name = str_replace("'","''",$_POST[name]);
$subtitle = str_replace("'","''",$_POST[subtitle]);
$business = str_replace("'","''",$_POST[business]);
$location = str_replace("'","''",$_POST[location]);
$region = str_replace("'","''",$_POST[region]);
$folder = str_replace("'","''",$_POST[folder]);
$description = str_replace("'","''",$_POST[description]);
$identity = str_replace("'","''",$_POST[identity]);
$prints = str_replace("'","''",$_POST[prints]);
$photography = str_replace("'","''",$_POST[photography]);
$digital = str_replace("'","''",$_POST[digital]);
$client = str_replace("'","''",$_POST[client]);
$themeColor = str_replace("'","''",$_POST[themeColor]);
$tags = $tags1 . $tags2 . $tags3;

//replace <br> with <br />
$description = str_replace("<br>","<br />",$description);
$identity = str_replace("<br>","<br />",$identity);
$prints = str_replace("<br>","<br />",$prints);
$photography = str_replace("<br>","<br />",$photography);
$digital = str_replace("<br>","<br />",$digital);

//echo $ID . "<br /><br />";
//echo $name . "<br /><br />";
//echo $subtitle . "<br /><br />";
//echo $business . "<br /><br />";
//echo $location . "<br /><br />";
//echo $region . "<br /><br />";
//echo $folder . "<br /><br />";
//echo $description . "<br /><br />";
//echo $identity . "<br /><br />";
//echo $prints . "<br /><br />";
//echo $photography . "<br /><br />";
//echo $digital . "<br /><br />";
//echo $client . "<br /><br />";
//echo $tags . "<br /><br />";

if(strpos($_POST[submit], 'Save') !== false) {
    if(empty($ID)) {
    //Add new project
    $sql = "INSERT INTO projects (name, subtitle, business, location, region, folder, description, identity, prints, photography, digital, client, tags, themeColor)
    VALUES ('$name', '$subtitle', '$business', '$location', '$region', '$folder', '$description', '$identity', '$prints', '$photography', '$digital', '$client', '$tags', '$themeColor')";  
    } 
    if(!empty($ID)) {
        //Update existing project
        $sql = "UPDATE projects
        SET 
        
        name='$name',
        subtitle='$subtitle',
        business='$business',
        location='$location',
        region='$region',
        folder='$folder',
        description='$description',
        identity='$identity',
        prints='$prints',
        photography='$photography',
        digital='$digital',
        client='$client',
        tags='$tags',
        themeColor='$themeColor'


        WHERE folder='$folder'";
    }
}

if (strpos($_POST[submit], 'Delete') !== false) {
    $sql = "DELETE FROM projects
    WHERE folder='$folder';";
    $sql .= "ALTER TABLE projects AUTO_INCREMENT = 1";
    
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

redirect_to_url('admin.php?login=yes&project_step=3&project='.$folder);
?>