<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/fiori.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/main.css">
        <script>var baseurl = '<?php echo base_url() ?>';</script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <title><?php echo $title ?></title>
        <style>
            

        </style>
    </head>
    <body>
        <nav class="navbar navbar-icon-top navbar-expand-lg navbar-white">
            <div class="container">
                <a class="navbar-brand" href="#">Booking SPA</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                Menu <i class='fas fa-bars'></i>
                </button>
            
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    
                </ul>
                <ul class="navbar-nav ">
                    <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>administrator" target="_BLANK">
                        <i class="fas fa-user-tie fa-lg fa-fw">
                        </i> Login Administrator
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>auth" target="_BLANK">
                        <i class="fas fa-user fa-lg fa-fw">
                        </i> Login User
                    </a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

        <?php echo $contents; ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="<?php echo base_url(); ?>asset/js/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/namamax/jqui-ctcstm@1.0.0/js/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>asset/js/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/app.js"></script>
    </body>
</html>