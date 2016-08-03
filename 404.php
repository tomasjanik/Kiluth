<?php require_once('connection.php');?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php require_once('head.php');?>
            <link rel="stylesheet" href="styles/css/third.css">
            <style>
                .notfound {
                    font-size: 20pt;
                }
            </style>
    </head>

    <body>
        <?php require_once('header.php');?>
            <div class="container space">
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
                        <p>404</p>
                    </div>
                    <div class="col-md-8">
                        <p class="notfound">Page not found</p>
                    </div>
                </div>
            </div>
            <div class="small-space"></div>
            <?php require_once('footer.php'); ?>
    </body>

    </html>