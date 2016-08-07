<?php require_once('connection.php');?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php require_once('head.php');?>
            <link rel="stylesheet" href="styles/css/third.css">
            <style>
                .copyright {
                    display: none;
                }
                
                .contact-info,
                .contact-info .text-normal {
                    font-size: 25px;
                }
                
                address p.text-smaller {
                    font-size: 25px;
                    margin-top: 20px;
                    font-weight: 100;
                }
            </style>
    </head>

    <body>
        <?php require_once('header.php');?>
           <div class="space tablet-and-up"></div>
               <div class="small-space mobile-only"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-3 tablet-and-up">
                        <p class="text-bigger">Contact</p>
                    </div>
                    <div class="col-md-9">
                        <?php require_once('contact-module.php');?>
                    </div>
                </div>
            </div>
            <div class="medium-space tablet-and-up"></div>
            <div class="small-space mobile-only"></div>
            <footer class="container">
                <?php require_once('enquiries.php');?>

                    <div class="enquiries-module">
                        <div class="row">
                            <div class="col-xs-6 col-sm-3">
                                <p>Additional</p>
                            </div>
                            <div class="col-xs-6 col-sm-3">
                                <?php require_once('social.php');?>
                            </div>

                            <!-- Add the extra clearfix for only the required viewport -->
                            <div class="clearfix visible-xs-block"></div>

                            <div class="col-xs-6 col-sm-3">
                                <?php require_once('subscribe.php');?>
                            </div>
                            <div class="col-xs-6 col-sm-3">
                                <div class="space double"></div>
                                <div class="small-space"></div>
                                <p class="text-smaller hold-admin">
                                    &copy; Copyright Kiluth 2016
                                </p>
                            </div>
                        </div>
                    </div>
            </footer>
            
    </body>

    </html>