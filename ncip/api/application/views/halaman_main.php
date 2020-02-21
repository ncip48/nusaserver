<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <title>Welcome to Herly Homepage</title>
        <style>
            @import url("//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");

            .navbar-icon-top .navbar-nav .nav-link > .fa {
            position: relative;
            width: 36px;
            font-size: 24px;
            }

            .navbar-icon-top .navbar-nav .nav-link > .fa > .badge {
            font-size: 0.75rem;
            position: absolute;
            right: 0;
            font-family: sans-serif;
            }

            .navbar-icon-top .navbar-nav .nav-link > .fa {
            top: 3px;
            line-height: 12px;
            }

            .navbar-icon-top .navbar-nav .nav-link > .fa > .badge {
            top: -10px;
            }

            @media (min-width: 576px) {
            .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link {
                text-align: center;
                display: table-cell;
                height: 70px;
                vertical-align: middle;
                padding-top: 0;
                padding-bottom: 0;
            }

            .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link > .fa {
                display: block;
                width: 48px;
                margin: 2px auto 4px auto;
                top: 0;
                line-height: 24px;
            }

            .navbar-icon-top.navbar-expand-sm .navbar-nav .nav-link > .fa > .badge {
                top: -7px;
            }
            }

            @media (min-width: 768px) {
            .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link {
                text-align: center;
                display: table-cell;
                height: 70px;
                vertical-align: middle;
                padding-top: 0;
                padding-bottom: 0;
            }

            .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link > .fa {
                display: block;
                width: 48px;
                margin: 2px auto 4px auto;
                top: 0;
                line-height: 24px;
            }

            .navbar-icon-top.navbar-expand-md .navbar-nav .nav-link > .fa > .badge {
                top: -7px;
            }
            }

            @media (min-width: 992px) {
            .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link {
                text-align: center;
                display: table-cell;
                height: 70px;
                vertical-align: middle;
                padding-top: 0;
                padding-bottom: 0;
            }

            .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link > .fa {
                display: block;
                width: 48px;
                margin: 2px auto 4px auto;
                top: 0;
                line-height: 24px;
            }

            .navbar-icon-top.navbar-expand-lg .navbar-nav .nav-link > .fa > .badge {
                top: -7px;
            }
            }

            @media (min-width: 1200px) {
            .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link {
                text-align: center;
                display: table-cell;
                height: 70px;
                vertical-align: middle;
                padding-top: 0;
                padding-bottom: 0;
            }

            .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link > .fa {
                display: block;
                width: 48px;
                margin: 2px auto 4px auto;
                top: 0;
                line-height: 24px;
            }

            .navbar-icon-top.navbar-expand-xl .navbar-nav .nav-link > .fa > .badge {
                top: -7px;
            }
            }

            .isi {
                padding-top:70px;
            }
            
            @media (min-width: 992px) { 
                .isi {
                padding-top:120px;
                }
            }

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
                        <i class="fa fa-facebook">
                        </i>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-instagram">
                        </i>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-youtube">
                        </i>
                    </a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

        <div class="container isi">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <h4>Contoh Get Provinsi dengan API auth</h4><p>
                    <form method='post' action='' id='cek'>
                    <div class="form-group">
                        <label for="a">Username</label>
                        <input type="text" class="form-control" id="a" name='a'>
                    </div>
                    <div class="form-group">
                        <label for="b">Password</label>
                        <input type="password" class="form-control" id="b" name='b'>
                    </div>
                    <div class="form-group">
                        <label for="c">API Key</label>
                        <input type="text" class="form-control" id="c" name='c'>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-md-4 col-xs-12">
                    <h5>Gunakan Info Login sbb:</h5>
                    <p>
                        User : ncip <br>
                        Password : 123 <br>
                        API Key : akuimuet <br>
                    </p>
                    <div id='hasil' class='text-left'></div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('#cek').submit(function() {
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo base_url(); ?>main/cek",
                        data: $(this).serialize(),
                        success: function(response) {
                            var data = jQuery.parseJSON(response);
                            //console.log(data)
                            $('#hasil').html(data);
                        }
                    })
                    return false;
                });
            });
        </script>
    
    </body>
</html>