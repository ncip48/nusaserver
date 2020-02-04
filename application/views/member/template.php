<!doctype html>
<html lang="en">
  <head>
  	<title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url()?>asset/memberpage/css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<?php include 'sidebar.php' ?>

        <!-- Page Content  -->
      <?php echo $contents ?>
		</div>

    <script src="<?php echo base_url()?>asset/memberpage/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>asset/memberpage/js/popper.js"></script>
    <script src="<?php echo base_url()?>asset/memberpage/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>asset/memberpage/js/main.js"></script>
  </body>
</html>