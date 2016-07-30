<?php
$folder = $_POST['folder'];

$target_dir = $folder . "/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
//if(isset($_POST["submit"])) {
//    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//    if($check !== false) {
////        echo "File is an image - " . $check["mime"] . ".";
//        $uploadOk = 1;
//    } else {
//        echo "Error: file must be an image.<br />";
//        $uploadOk = 0;
//    }
//}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Error: file must have unique name.<br />";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Error: file must be smaller than 5mb.<br />";
    $uploadOk = 0;
}

//// Allow certain file formats
//if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//&& $imageFileType != "gif" ) {
//    echo "Error: invalid file format.<br />";
//    $uploadOk = 0;
//}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Your file was not uploaded.<br />";
    
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br />";
    } else {
        echo "There was an error uploading your file.<br />";
    }
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

if ($uploadOk == 1) {
    if(empty($folder)) {
        redirect_to_url('library.php');
    } elseif($folder == 'public') {
        redirect_to_url('library.php');
    } else {
        redirect_to_url('library.php?data='.$folder);
    }
}
?>