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
            <style>
                html,
                body {
                    background-color: #f8f8f8;
                    overflow: hidden;
                }
            </style>
    </head>

    <body>
        <div class="container">
            <div class="small-space"></div>
            <div class="text-center">
                <p id="fadein1" class="logo" style="font-size: 60px;" hidden="hidden"> Kiluth </p> <span id="fadein2" class="text-normal" hidden="hidden">
                    Coming Back Soon
                </span>
                <br />
                <div id="fadein3" class="thumbnail" style="background-image: url('images/png/1.png'); background-color: transparent; position:fixed; bottom: -50px; top: 80px; left: 0; right: 0; opacity: 0;"></div>
            </div>
            <div id="fadein4" class="text-left" style="position: absolute; bottom: 5px; left: 10px;" hidden="hidden">
                <p style="font-size: 14px;"> 
                    <a id="tel" class="link-hover" href="tel:+66931242007" hidden="hidden">+66 (0) 93 124 2007</a> 
                    <br />
                    <a id="link" class="link-hover" href="mailto:hello@kiluth.com">hello@kiluth.com</a>
                </p>
            </div>
        </div>
        <script>
            var sound = new Howl({
                urls: ['http://kiluth.com/mp3/EvenS-The%20Highlands%20Walk.mp3']
                , autoplay: true
                , loop: true
            });
            setTimeout(function () {
                $("#fadein3").animate({top: '100px', bottom: '-70px', opacity: '1'}, { "duration": 1800, "easing": "swing" });
                setTimeout(function () {
                    $('#fadein1').fadeIn(1000);
                    setTimeout(function () {
                        $('#fadein2').fadeIn(1000);
                    }, 800);
                }, 800);
            }, 800);
            
            setTimeout(function () {
                $('#fadein4').fadeIn(1000);
                $('#fadein4').mouseenter(function () {
                   $('#tel').fadeIn(); 
                });
                $('#fadein4').mouseleave(function () {
                   $('#tel').fadeOut(); 
                });
            }, 5000);
        </script>
    </body>

    </html>