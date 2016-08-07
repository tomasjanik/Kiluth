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
                * {
                    text-shadow: rgba(0, 0, 0, 0.01) 0 0 1px;
                    -moz-osx-font-smoothing: grayscale;
                    -webkit-font-smoothing: antialiased !important;
                    -moz-font-smoothing: antialiased !important;
                    text-rendering: optimizelegibility !important;
                    letter-spacing: .03em;
                }
                
                html,
                body {
                    background-color: #f8f8f8;
                    overflow: hidden;
                }
                
                .buttonstyled {
                    padding: 0px 10px;
                    border: 1px solid #000;
                    border-radius: 2px;
                    background-color: transparent;
                    transition: all 0.3s ease;
                    color: #000;
                    opacity: 0.5;
                }
                
                .buttonstyled:hover {
                    background-color: #000;
                    color: #fff;
                    opacity: 1;
                }
                
                .ask p a {
                    font-size: 24px; 
                    font-weight: 400;
                }
                
                @media only screen and (min-width: 768px) {
                    .ask p a {
                        font-size: 18px; 
                        font-weight: 400;
                    }
                }
            </style>
            <script>
                $(document).ready(function () {
                    
                });
                $(window).on("load", function () {
                    $('.ask').click(function () {
                        $('.thumbnail').fadeToggle('1000');
                        $('.ans').fadeToggle('1000');
                    });
                    setTimeout(function () {
                        $("#fadein3").animate({
                            top: '100px'
                            , bottom: '-70px'
                            , opacity: '1'
                        }, {
                            "duration": 1800
                            , "easing": "swing"
                        });
                        setTimeout(function () {
                            $('#fadein1').fadeIn(1000);
                            setTimeout(function () {
                                $('#fadein2').fadeIn(1000);
                            }, 800);
                        }, 800);
                    }, 800);
                    setTimeout(function () {
                        $('#fadein4').fadeIn(1000);
                        setTimeout(function () {
                            $('#fadein5').fadeIn(1000);
                        }, 800);
                    }, 3200);
                });
            </script>
    </head>

    <body>
        <div class="container">
            <div class="small-space"></div>
            <div class="text-center">
                <p id="fadein1" class="logo" style="font-size: 60px; color: #333;" hidden="hidden"> Kiluth </p> <span id="fadein2" class="text-normal" hidden="hidden">
                    Coming Back Soon
                </span>
                <div id="fadein3" class="thumbnail" style="background-image: url('images/png/1.png'); background-color: transparent; position:fixed; bottom: -50px; top: 80px; left: 0; right: 0; opacity: 0;"></div>
                <p class="ans" style="font-size: 18px; position: absolute; left: 0; right: 0; top: 45%; margin: 0 20px;" hidden="hidden"> 
                  <br />
                   Thank you for visiting Kiluth.
                    <br /> Unfortunately, we are undergoing a renovation.<br class="desktop-only" /> Please come back later.
                    <br />
                    <br />
                    If you have any enquiry, please contact
                    <br />
                    <a class="link-hover" style="font-size: inherit; color: #1196f4;" href="mailto:hello@kiluth.com">hello@kiluth.com</a> or <a class="link-hover" style="font-size: inherit; color: #1196f4;" href="tel:+66931242007">(+66) 93 124 2007</a> </p>
            </div>
            <div id="static" class="text-left desktop-only" style="position: absolute; top: 10px; right: 10px;">
                <p class="buttonstyled"> <a href="mailto:hello@kiluth.com">hello@kiluth.com</a> </p>
            </div>
            <div id="fadein4" class="text-left ask" style="position: absolute; bottom: 0px; right: 10px;" hidden="hidden">
                <p> <a class="link-hover" href="#">?</a> </p>
            </div>
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