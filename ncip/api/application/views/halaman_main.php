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
        <title>Welcome to Herly Homepage</title>
        <style>
            

        </style>
    </head>
    <body>
        <nav class="navbar navbar-icon-top navbar-expand-lg navbar-white">
            <div class="container">
                <a class="navbar-brand" href="#">Herly's Apps</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                Menu <i class='fas fa-bars'></i>
                </button>
            
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    
                </ul>
                <ul class="navbar-nav ">
                    <li class="nav-item">
                    <a class="nav-link" href="https://www.facebook.com/herly.cp" target="_BLANK">
                        <i class="fab fa-facebook fa-lg fa-fw">
                        </i> Facebook
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="https://www.instagram.com/herly.devs/" target="_BLANK">
                        <i class="fab fa-instagram fa-lg fa-fw">
                        </i> Instagram
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="https://www.youtube.com/mbahgaming" target="_BLANK">
                        <i class="fab fa-youtube fa-lg fa-fw">
                        </i> Youtube
                    </a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

        <div class="container isi">
            <div class="row">
                <div class="col-md-6 col-xs-12 my-2">
                    <h4>Contoh API level bertingkat dengan JWT + Codeigniter + REST API Server</h4><p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12 my-4">
                    <form method='post' action='' id='cekuser'>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name='username'>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name='password'>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
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
                    <button id='alluser' class="btn btn-primary">Lihat Semua User</button>
                </div>
                <div class="col-md-6 col-xs-12 my-4">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="provinsi" name="select" class="custom-control-input" value='provinsi' checked>
                        <label class="custom-control-label" for="provinsi">Provinsi</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="kabupaten" name="select" class="custom-control-input" value='kabupaten'>
                        <label class="custom-control-label" for="kabupaten">Kabupaten</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="kecamatan" name="select" class="custom-control-input" value='kecamatan'>
                        <label class="custom-control-label" for="kecamatan">Kecamatan</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="desa" name="select" class="custom-control-input" value='desa'>
                        <label class="custom-control-label" for="desa">Desa</label>
                    </div>
                    <h5>API Key :</h5>
                    <form method='post' action='' id='cek'>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="c" name='c'>
                        <input type="hidden" class="form-control" id="tipe" name='tipe'>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Cek</button>
                        </div>
                    </div>
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
        <script src="https://cdn.jsdelivr.net/gh/namamax/jqui-ctcstm@1.0.0/js/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>asset/js/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url(); ?>asset/js/app.js"></script>
    </body>
</html>