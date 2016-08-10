<nav class="navbar">
    <div class="container">
        <div class="navbar-header navbar-right">
            <a class="navbar-brand" href="index.php">Kiluth</a>
        </div>
        <div class="menu hold-admin mobile-only">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="nav navbar-nav tablet-up-only">
            <?php 
            session_start();
            $pageurl = $_SERVER['REQUEST_URI'];
            
            $actuallink = $_SERVER['HTTP_HOST'];
            $database = "database";
            if (strpos($actuallink, 'localhost') !== false) {
                $database = "phpmyadmin";
            }
            
            $xLimit = 8;
            for ($x = 1; $x <= $xLimit; $x++) {
                ${"underline" . $x} = 'muted';
            }
            
            if (strpos($pageurl, 'projects') !== false OR strpos($pageurl, 'casestudy') !== false) {
                $underline1 = 'unmuted';
            }
            elseif (strpos($pageurl, 'about') !== false) {
                $underline2 = 'unmuted';
            }
            elseif (strpos($pageurl, 'logbook') !== false OR strpos($pageurl, 'log.php') !== false) {
                $underline3 = 'unmuted';
            }
            elseif (strpos($pageurl, 'contact') !== false) {
                $underline4 = 'unmuted';
            }
            elseif (strpos($pageurl, 'admin') !== false) {
                $underline5 = 'unmuted';
            }
            elseif (strpos($pageurl, 'library') !== false) {
                $underline6 = 'unmuted';
            }
            elseif (strpos($pageurl, 'generator') !== false) {
                $underline7 = 'unmuted';
            }
            elseif (strpos($pageurl, 'database') !== false) {
                $underline8 = 'unmuted';
            }
            else {
                for ($x = 1; $x <= $xLimit; $x++) {
                    ${"underline" . $x} = 'unmuted';
                }
            }
            
            ?>
                <li><a class="link-ani <?php echo $underline1; ?>" href="projects.php">Projects</a></li>
                <li><a class="link-ani <?php echo $underline2; ?>" href="about.php">About</a></li>
                <li><a class="link-ani <?php echo $underline3; ?>" href="logbook.php">Logbook</a></li>
                <li><a class="link-ani <?php echo $underline4; ?>" href="contact.php">Contact</a></li>
                <?php
            if ($_SESSION['admin'] == "yes") {
                ?>
                    <li><a class="link-ani <?php echo $underline5; ?>" href="admin.php">Admin</a></li>
                    <li><a class="link-ani <?php echo $underline6; ?>" href="library.php">Library</a></li>
                    <li><a class="link-ani <?php echo $underline7; ?>" href="generator.php">Invoice</a></li>
                    <li><a class="link-ani <?php echo $underline8; ?>" href="<?php echo $database ;?>" target="_blank">Database</a></li>
                <?php } ?>
        </ul>

        <ul class="mobile-only nav navbar-nav mobile-nav" hidden="hidden">
            <li>
                <a class="link-hover" href="projects.php">Projects</a>
            </li>
            <li>
                <a class="link-hover" href="about.php">About</a>
            </li>
            <li>
                <a class="link-hover" href="logbook.php">Logbook</a>
            </li>
            <li>
                <a class="link-hover" href="contact.php">Contact</a>
            </li>
            <?php
            if ($_SESSION['admin'] == "yes") {
                ?>
                <li>
                    <a class="link-hover" href="admin.php">Admin</a>
                </li>
                <li>
                    <a class="link-hover" href="library.php">Library</a>
                </li>
                <li>
                    <a class="link-hover" href="generator.php">Invoice</a>
                </li>
                <li>
                    <a class="link-hover" href="<?php echo $database ;?>" target="_blank">Database</a>
                </li>
            <?php } ?>
        </ul>

    </div>
</nav>
<i class="scroll-to-top fa fa-play widescreen-only"></i>