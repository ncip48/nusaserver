<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $title ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- <link rel="manifest" href="site.webmanifest"> -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- CSS here -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/montana/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/nprogress.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/montana/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/montana/css/magnific-popup.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/montana/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/montana/css/themify-icons.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/montana/css/nice-select.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/montana/css/flaticon.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/montana/css/gijgo.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/montana/css/animate.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/montana/css/slicknav.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/montana/css/style.css">
        <script>var baseurl = '<?php echo base_url() ?>';</script>
        <script src="<?php echo base_url(); ?>asset/montana/js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/montana/js/vendor/jquery-1.12.4.min.js"></script>
        <!-- <script src="<?php echo base_url(); ?>asset/js/jquery-3.4.1.min.js"></script> -->
        <script src="<?php echo base_url(); ?>asset/montana/js/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/montana/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/nprogress.js"></script>
        <script src="<?php echo base_url(); ?>asset/montana/js/owl.carousel.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/montana/js/isotope.pkgd.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/montana/js/ajax-form.js"></script>
        <script src="<?php echo base_url(); ?>asset/montana/js/waypoints.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/montana/js/jquery.counterup.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/montana/js/imagesloaded.pkgd.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/montana/js/scrollIt.js"></script>
        <script src="<?php echo base_url(); ?>asset/montana/js/jquery.scrollUp.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/montana/js/wow.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/montana/js/nice-select.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/montana/js/jquery.slicknav.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/montana/js/jquery.magnific-popup.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/montana/js/plugins.js"></script>
        <script src="<?php echo base_url(); ?>asset/montana/js/gijgo.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/app.js"></script>
        <script src="<?php echo base_url(); ?>asset/montana/js/main.js"></script>
        <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    </head>
    <body>
        <?php include 'header.php' ?>
        <div class='isi'>
        <?php echo $contents; ?>
        </div>
        <?php include 'footer.php' ?>
    </body>
</html>