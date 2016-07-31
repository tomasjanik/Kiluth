<!--
███╗   ███╗ █████╗ ██████╗ ███████╗    ██████╗ ██╗   ██╗    ██╗  ██╗██╗██╗     ██╗   ██╗████████╗██╗  ██╗
████╗ ████║██╔══██╗██╔══██╗██╔════╝    ██╔══██╗╚██╗ ██╔╝    ██║ ██╔╝██║██║     ██║   ██║╚══██╔══╝██║  ██║
██╔████╔██║███████║██║  ██║█████╗      ██████╔╝ ╚████╔╝     █████╔╝ ██║██║     ██║   ██║   ██║   ███████║
██║╚██╔╝██║██╔══██║██║  ██║██╔══╝      ██╔══██╗  ╚██╔╝      ██╔═██╗ ██║██║     ██║   ██║   ██║   ██╔══██║
██║ ╚═╝ ██║██║  ██║██████╔╝███████╗    ██████╔╝   ██║       ██║  ██╗██║███████╗╚██████╔╝   ██║   ██║  ██║
╚═╝     ╚═╝╚═╝  ╚═╝╚═════╝ ╚══════╝    ╚═════╝    ╚═╝       ╚═╝  ╚═╝╚═╝╚══════╝ ╚═════╝    ╚═╝   ╚═╝  ╚═╝
-->
   <?php require_once('connection.php');?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php require_once('head.php');?>
            <!--Howler-->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/howler/1.1.29/howler.min.js"></script>
            <link rel="stylesheet" href="styles/second.css">
            <style>
                .divider {
                    background-color: white;
                    height: 1px;
                    width: 40px;
                }
                
                .page-div {
                    background-color: white;
                    width: 1px;
                    position: fixed;
                    height: 100%;
                    bottom: 0;
                    opacity: 0.1;
                }
                
                .page-div:nth-child(even) {
                    opacity: 0;
                }
                
                .contact-info {
                    font-size: 12pt;
                }
                
                .space.double {
                    margin-top: 100px;
                }
            </style>
    </head>

    <body>
        <div class="container">
            <!---->
            <div class="medium-space"></div>
            <div class="divider space"></div>
            <h2>Coming back soon</h2>
            <div class="space double">
                <p class="logo small-space">Kiluth</p>
                <div class="small-space"></div>
                <?php require_once('contact-module.php'); ?>
            </div>
            <!---->
            <div class="page-div" style="left: 10%;"></div>
            <div class="page-div" style="left: 20%;"></div>
            <div class="page-div" style="left: 30%;"></div>
            <div class="page-div" style="left: 40%;"></div>
            <div class="page-div" style="left: 50%;"></div>
            <div class="page-div" style="left: 60%;"></div>
            <div class="page-div" style="left: 70%;"></div>
            <div class="page-div" style="left: 80%;"></div>
            <div class="page-div" style="left: 90%;"></div>
            <!---->
        </div>
        <script>
            var sound = new Howl({
                urls: ['http://kiluth.com/mp3/EvenS-The%20Highlands%20Walk.mp3']
                , autoplay: true
                , loop: true
            });
        </script>
    </body>

    </html>