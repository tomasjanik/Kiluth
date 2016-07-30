<?php require_once('connection.php');

$tags1 = str_replace("'","''",$_POST[tags1]);
$tags2 = str_replace("'","''",$_POST[tags2]);
$tags3 = str_replace("'","''",$_POST[tags3]);

$ID = str_replace("'","''",$_POST[ID]);
$date_published = str_replace("'","''",$_POST[date_published]);
$title = str_replace("'","''",$_POST[title]);
$folder = str_replace("'","''",$_POST[folder]);
$content = str_replace("'","''",$_POST[content]);
$size = str_replace("'","''",$_POST[size]);
$hidethumbnail = str_replace("'","''",$_POST[hidethumbnail]);
$tags = $tags1 . $tags2 . $tags3;

//replace <br> with <br />
$content = str_replace("<br>","<br />",$content);

//Add "New Client: " to title if $tags has "NewClient"
if (strpos($tags, 'NewClient') !== FALSE) {
    if (strpos($title, 'New Client: ') !== FALSE) {
        //do nothing
    } else {
        $title = "New Client: " . $title;
    }
} else {
    $title = str_replace("New Client: ","",$title);
}

//Add "Launching " to title if $tags has "NewClient"
if (strpos($tags, 'Launch') !== FALSE) {
    if (strpos($title, 'Launching ') !== FALSE) {
        //do nothing
    } else {
        $title = "Launching " . $title;
    }
} else {
    $title = str_replace("Launching ","",$title);
}

//If clicked save
if(strpos($_POST[submit], 'Save') !== false) {
    if(empty($ID)) {
    //Add new log
        
    $sql = "INSERT INTO logs (title, folder, content, size, tags, hidethumbnail)
    VALUES ('$title', '$folder', '$content', '$size', '$tags', '$hidethumbnail')";  
    } 
    if(!empty($ID)) {
        
        //Update existing log
        $sql = "UPDATE logs
        SET 

        title='$title',
        folder='$folder',
        content='$content',
        size='$size',
        tags='$tags',
        hidethumbnail='$hidethumbnail'


        WHERE folder='$folder'";
    }
}

if (strpos($_POST[submit], 'Delete') !== false) {
    $sql = "DELETE FROM logs
    WHERE folder='$folder';";
    $sql .= "ALTER TABLE logs AUTO_INCREMENT = 1";
    
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

redirect_to_url('admin.php?login=yes&log_step=3&log='.$folder);
?>