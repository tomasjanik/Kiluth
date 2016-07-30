<?php require_once('connection.php');?>
    <?php
    function redirect_to_url($url) {
        if (!headers_sent()) {    
            header('Location: '.$url);
            exit;
        } else {  
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.$url.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0; url='.$url.'" />';
            echo '</noscript>'; exit;
        }
    }

    //Get directory
    $data = $_GET[data];
    $delete = $_GET[del];
    $root = $_GET[root];

if (!empty($_GET[del])) {
    unlink("./" . $delete);
}

    //Redirect page if cick on file
    if (!empty($_GET[data])) {
        if (strpos($data, '.') !== false) {
            redirect_to_url($data);
        }
    }
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <?php require_once('head.php');?>
                <link rel="stylesheet" href="styles/third.css"> </head>

        <body>
            <?php require_once('header.php');?>
                <div class="container small-space">
                    <div class="text-center">
                        <h2>Library</h2>                        
                        <?php 
                        if (!empty($root)) {
                            $path = $root;
                        } else {
                            $path = $data;
                        }
                        echo "<em class='text-smaller text-muted'>$path</em>";?> </div>
                    <div class="small-space"></div>
                    
                    
                    <div id="users">
                        <input class="search text-smaller" type="text" placeholder="Search">
                        <div class="small-space"></div>
                        <?php 
                            //Root directory (/project)
                            if (empty($data)) {
                                $folder = 'public';
                                echo "<p class='text-smaller text-muted'>Folder / File</p>";
                                
                            } else {
                                $folder = $data;
                                echo "<a href='javascript:void(0)' onclick='history.go(-1)' class='text-smaller link-hover'>";
                                echo "<span class='fa sub'>&#xf104</span> Back";
                                echo "</a>";
                                
                                echo "<br />";
                                echo "<a href='javascript:void(0)' onclick='location.reload()' class='text-smaller link-hover'>";
                                echo "<span class='fa sub'>&#xf021</span> Refresh";
                                echo "</a>";
                                
                                echo "<br />";
                                echo "<a href='library.php' class='text-smaller link-hover'>";
                                echo "<span class='fa sub'>&#xf015</span> Home";
                                echo "</a>";
                            }
                        
                        //If root is specified
                        if (!empty($root)) {
                            $folder = $root;
                        }
                        
                           
                            echo "<ul class='list row small-space list-unstyled'>";
                                session_start();
                                $col = "col-md-12";
                                
                                if (strpos($_SERVER['HTTP_REFERER'], 'admin.php?login=') !== false OR strpos($_SERVER['HTTP_REFERER'], 'upload.php') !== false OR $_SESSION["admin"] == "yes") {
                                    $_SESSION["admin"] = "yes";
                                    $col = "col-xs-6";
                                }
                                
                            //Open Folder
                            if ($handle = opendir($folder)) {
                                while (false !== ($entry = readdir($handle))) {
                                    if ($entry != "." && $entry != "..") {
                                        //Remove containing text
                                        $entry = str_replace(".DS_Store","hide",$entry);
                                        $class = $entry;
                                        if ($class == "prints") {
                                            $class = str_replace("prints","noprints",$class);
                                        } 
                                        if ($class == "digital") {
                                            $class = str_replace("digital","nodigital",$class);
                                        }

                                        $link = "library.php?data=" . $folder . "/" . $entry;
                                        $linkdel = "library.php?del=" . $folder . "/" . $entry;
                                        
                                        echo "<li class='$col $class'><a class='name text-smaller link-hover' href='$link'>$entry</a></li>";
                                        
                                        if ($_SESSION["admin"] == "yes") {
                                            echo "<li class='$col $class'><a class='name text-smaller link-hover' href='$linkdel'><span hidden>$entry</span>Delete</a></li>";
                                        }
                                    }
                                }
                                closedir($handle);
                            }
                            echo "</ul>";
                                if ($_SESSION["admin"] == "yes") {
                                    ?>
                                <div class="small-space"></div>
                                <div class="thinline"></div>
                                <form class="text-right" action="upload.php" method="post" enctype="multipart/form-data">
                                    <?php 
                                        if(empty($data)) {
                                            $data = "public";
                                        }
                                    ?>
                                        <input type="text" name="folder" value="<?php echo $data;?>" hidden="hidden">
<!--                                        <input class="text-smaller" type="file" title="" name="fileToUpload" id="fileToUpload" required>-->
                                        <label class="file">
                                            <p class="link text-smaller">Browse</p> <input type="file" name="fileToUpload" style="display: none;" required>
                                        </label>
                                        <label class="upload">
                                            <p class="link-hover text-smaller">Upload</p> <input type="submit" style="display: none;"  name="submit">
                                        </label>
                                    <?php }?>
                                </form>
                    </div>
                    
                    
                </div>
                <script>
                    var options = {
                      valueNames: [ 'name' ]
                    };

                    var userList = new List('users', options);
                </script>
                <?php require_once('footer.php');?>
        </body>

        </html>