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
        <title>Welcome to Herly Homepage</title>
        <style>
            

        </style>
    </head>
    <body>
        <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Herly's Apps</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    
                </ul>
                <ul class="navbar-nav ">
                    <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-facebook fa-lg">
                        </i>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-instagram fa-lg">
                        </i>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-youtube fa-lg">
                        </i>
                    </a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

        <div class="container isi">
            <div class="row">
                <div class="col-md-6 col-xs-12 my-2">
                    <h4>Contoh Get Provinsi dengan API auth</h4><p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12 my-2">
                    <form method='post' action='' id='cekuser'>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name='username'>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name='password'>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <hr>
                    <h5 class="my-2">Gunakan Info Login sbb:</h5>
                    <p>
                        User : ncip48 <br>
                        Password : xxx <br>
                        <b> dan </b><br>
                        User : koplok <br>
                        Password : yyy <br>
                    </p>
                </div>
                <div class="col-md-6 col-xs-12 my-2">
                    <h5>API Key :</h5>
                    <form method='post' action='' id='cek'>
                    <div class="form-group">
                        <input type="text" class="form-control" id="c" name='c'>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <hr>
                    <h5 class="my-2"> Response JSON </h5>
                    <div id='hasil' class='text-left'></div>

                        <pre class="code-wrap" style='height:340px;'>
                        
                        </pre>
                    
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="<?php echo base_url(); ?>asset/js/jquery-3.4.1.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/app.js"></script>
    </body>
</html>