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
        <ul class="nav navbar-nav desktop-only">
            <?php 
            session_start();
            $pageurl = $_SERVER['REQUEST_URI'];
//            echo $pageurl;
            
            $underline1 = 'muted'; //projects
            $underline2 = 'muted'; //about
            $underline3 = 'muted'; //logbook
            $underline4 = 'muted'; //contact
            $underline5 = 'muted'; //admin
            $underline6 = 'muted'; //library
            $underline7 = 'muted'; //library
            $underline8 = 'muted'; //database
            
            if (strpos($pageurl, 'projects') !== false) {
                $underline1 = 'unmuted';
            }
            elseif (strpos($pageurl, 'case-study') !== false) {
                $underline1 = 'unmuted';
                
            }
            elseif (strpos($pageurl, 'about') !== false) {
                $underline2 = 'unmuted';
            }
            elseif (strpos($pageurl, 'logbook') !== false) {
                $underline3 = 'unmuted';
            }
            elseif (strpos($pageurl, 'log.php') !== false) {
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
            elseif (strpos($pageurl, 'generator') !== false) {
                $underline8 = 'unmuted';
            }
            else {
                $underline1 = 'unmuted'; //projects
                $underline2 = 'unmuted'; //about
                $underline3 = 'unmuted'; //logbook
                $underline4 = 'unmuted'; //contact
                $underline5 = 'unmuted'; //admin
                $underline6 = 'unmuted'; //library
                $underline7 = 'unmuted'; //generator
                $underline8 = 'unmuted'; //database
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
                    <li><a class="link-ani <?php echo $underline8; ?>" href="database" target="_blank">Database</a></li>
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
        </ul>

    </div>
</nav>
<i class="scroll-to-top fa fa-play widescreen-only"></i>