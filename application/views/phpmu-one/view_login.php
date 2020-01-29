<html>
<head>
<title><?php echo $title ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<style>
    .login-container{
        margin-top: 5%;
        margin-bottom: 5%;
    }
    .login-form-1{
        padding: 5%;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }
    .login-form-1 h3{
        text-align: center;
        color: #333;
    }
    .login-form-2{
        padding: 5%;
        background: #0062cc;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }
    .login-form-2 h3{
        text-align: center;
        color: #fff;
    }
    .login-container form{
        padding: 10%;
    }
    .btnSubmit
    {
        width: 50%;
        border-radius: 1rem;
        padding: 1.5%;
        border: none;
        cursor: pointer;
    }

    .btnReg
    {
        width: 50%;
        border-radius: 1rem;
        padding: 1.5%;
        border: none;
        cursor: pointer;
    }

    .login-form-1 .btnSubmit{
        font-weight: 600;
        color: #fff;
        background-color: #0062cc;
    }
    .login-form-2 .btnSubmit{
        font-weight: 600;
        color: #0062cc;
        background-color: #fff;
    }
    .login-form-2 .ForgetPwd{
        color: #fff;
        font-weight: 600;
        text-decoration: none;
    }
    .login-form-1 .ForgetPwd{
        color: #0062cc;
        font-weight: 600;
        text-decoration: none;
    }

</style>
<script type="text/javascript">
    $(document).ready(function() {
        $('#frmLogin').submit(function() {
		    $.ajax({
			    type: 'POST',
			    url: $(this).attr('action'),
			    data: $(this).serialize(),
			    success: function(data) {
            $('#aksilogin').html(data);
            //console.log(data);
            //$('#reloading').html(data);
            //$('#reloadcontent').hide();
			    }
		    })
		    return false;
	    });
    })
</script>
</head>

<body>
    <div class='container login-container'>
                <div class='row justify-content-center' style='padding-top:150px;'>
                    <div class='col-md-6 login-form-2'>
                        <h3>Masuk ke NusaServer</h3>
                        <form method='post' action='<?php echo base_url(); ?>auth/aksilogin' role='form' id='frmLogin'>
                            <div class='form-group'>
                                <input name='a' type='text' class='form-control' placeholder='Masukkan username' value='' />
                            </div>
                            <div class='form-group'>
                                <input name='b' type='password' class='form-control' placeholder='Masukkan Password' value='' />
                            </div>
                            <div class='form-group'>
                                <input type='submit' class='btnSubmit' value='Login' />
                            </div>
                            <div class='form-group'>
                                <a href='#' class='ForgetPwd' value='Login'>Forget Password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <div id='aksilogin'></div>
</body>
</html>

