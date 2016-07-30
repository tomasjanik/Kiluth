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
            $pageurl = $_SERVER['REQUEST_URI'];
//            echo $pageurl;
            
            $underline1 = 'muted'; //projects
            $underline2 = 'muted'; //about
            $underline3 = 'muted'; //logbook
            $underline4 = 'muted'; //contact
            $underline5 = 'muted'; //admin
            
            if (strpos($pageurl, 'projects') !== false) {
                $underline1 = 'unmuted'; //projects
                
            }
            elseif (strpos($pageurl, 'case-study') !== false) {
                $underline1 = 'unmuted'; //case-study
                
            }
            elseif (strpos($pageurl, 'about') !== false) {
                $underline2 = 'unmuted'; //about
            }
            elseif (strpos($pageurl, 'logbook') !== false) {
                $underline3 = 'unmuted'; //logbook
            }
            elseif (strpos($pageurl, 'log.php') !== false) {
                $underline3 = 'unmuted'; //log
            }
            elseif (strpos($pageurl, 'contact') !== false) {
                $underline4 = 'unmuted'; //contact
            }
            elseif (strpos($pageurl, 'admin.php') !== false) {
                $underline5 = 'unmuted'; //admin
            }
            else {
                $underline1 = 'unmuted'; //projects
                $underline2 = 'unmuted'; //about
                $underline3 = 'unmuted'; //logbook
                $underline4 = 'unmuted'; //contact
                $underline5 = 'unmuted'; //contact
            }
            
            ?>
                <li><a class="link-ani <?php echo $underline1; ?>" href="projects.php">Projects</a></li>
                <li><a class="link-ani <?php echo $underline2; ?>" href="about.php">About</a></li>
                <li><a class="link-ani <?php echo $underline3; ?>" href="logbook.php">Logbook</a></li>
                <li><a class="link-ani <?php echo $underline4; ?>" href="contact.php">Contact</a></li>
                <?php
            if (strpos($pageurl, 'admin') !== false) {
                ?>
                    <li><a class="link-ani <?php echo $underline5; ?>" href="admin.php">Admin</a></li>
                    <?php
            }
            ?>
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