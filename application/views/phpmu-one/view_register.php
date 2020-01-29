<html>
<head>
<title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body {
            background-image: url('<?php echo base_url() ?>asset/images/bg.jpg');
            background-repeat: no-repeat;
        }
        .register{
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        }

        .register-right{
            background: #f8f9fa;
        }

        @media (min-width: 992px) { 
            .register{
                background: -webkit-linear-gradient(left, #3931af, #00c6ff);
                margin-top: 8%;
                padding: 3%;
            } 
            .register-right{
            background: #f8f9fa;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
        }
        }


        .register-left{
            text-align: center;
            color: #fff;
            margin-top: 4%;
        }
        .register-left input{
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            width: 60%;
            background: #f8f9fa;
            font-weight: bold;
            color: #383d41;
            margin-top: 30%;
            margin-bottom: 3%;
            cursor: pointer;
        }

        .register-left img{
            margin-top: 15%;
            margin-bottom: 5%;
            width: 70%;
            -webkit-animation: mover 2s infinite  alternate;
            animation: mover 1s infinite  alternate;
        }
        @-webkit-keyframes mover {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
        @keyframes mover {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }
        .register-left p{
            font-weight: lighter;
            padding: 12%;
            margin-top: -9%;
        }
        .register .register-form{
            padding: 10%;
            margin-top: 10%;
        }
        .btnRegister{
            float: right;
            margin-top: 10%;
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            background: #0062cc;
            color: #fff;
            font-weight: 600;
            width: 50%;
            cursor: pointer;
        }

        .loading{
            float: right;
            margin-top: 12.5%;
            border: none;
        }

        .register .nav-tabs{
            margin-top: 3%;
            border: none;
            background: #0062cc;
            border-radius: 1.5rem;
            width: 28%;
            float: right;
        }
        .register .nav-tabs .nav-link{
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }
        .register .nav-tabs .nav-link:hover{
            border: none;
        }
        .register .nav-tabs .nav-link.active{
            width: 100px;
            color: #0062cc;
            border: 2px solid #0062cc;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }
        .register-heading{
            text-align: center;
            margin-top: 8%;
            margin-bottom: -15%;
            color: #495057;
        }
    </style>
    <script>var baseurl = '<?php echo base_url() ?>';</script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#frmRegister').submit(function() {
		    $.ajax({
			    type: 'POST',
			    url: $(this).attr('action'),
			    data: $(this).serialize(),
                beforeSend: function(){
                    $('#loadingzz').html("<img class='loading' src='"+baseurl+"asset/images/loading.gif' />");
                },
			    success: function(data) {
                    $('#panelregister').hide();
                    $('#aksiregister').html(data);
			    }
		    })
		    return false;
	    });
    })
</script>
</head>
<body>
    
</body>
</html>

<!------ Include the above in your HEAD tag ---------->

<div class="container register">
                <div class="row align-items-center">
                    <div class="col-md-3 register-left">
                    <?php 
                        $logo = $this->model_app->view_ordering_limit('logo','id_logo','DESC',0,1);
                        foreach ($logo->result_array() as $row) {
                            echo "<img src='".base_url()."asset/images/$row[gambar]'/></a>";
                        }
                    ?>
                        <h3>Selamat Datang</h3>
                        <p>Silahkan memasukkan data dengan benar</p>
                    </div>
                    <div class="col-md-9 register-right">  
                        <div class="tab-content" id="myTabContent">
                            <div id='aksiregister'></div>
                            <div id='panelregister'>
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <h3 class="register-heading">Daftar Member</h3>
                                    <div class="row register-form">
                                        <div class="col-md-6">
                                        <?php 
                                        $attributes = array('id' => 'frmRegister','class'=>'form-horizontal','role'=>'form');
                                        echo form_open_multipart('auth/aksiregister',$attributes); ?>
                                            <div class="form-group">
                                                <input type="text" name='c' class="form-control" placeholder="Nama Lengkap" value="" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name='j' class="form-control" placeholder="No Telp / HP" value="" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name='e' class="form-control" placeholder="Alamat" value="" />
                                            </div>
                                            <div class="form-group">
                                            <select class='form-control' name='h' required>
                                                <option value=''>- Pilih Kota -</option>";
                                                <?php foreach ($kota as $rows) {
                                                    echo "<option value='$rows[kota_id]'>$rows[nama_kota]</option>";
                                                } ?></select>
                                            </div>
                                            <!-- <div class="form-group">
                                                <div class="maxl">
                                                    <label class="radio inline"> 
                                                        <input type="radio" name="gender" value="male" checked>
                                                        <span> Male </span> 
                                                    </label>
                                                    <label class="radio inline"> 
                                                        <input type="radio" name="gender" value="female">
                                                        <span>Female </span> 
                                                    </label>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name='d' placeholder="Masukkan Email" value="" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" minlength="3" name="a" class="form-control" placeholder="Masukkan Username" value="" />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name='b' class="form-control" placeholder="Masukkan Password" value="" />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Masukkan Password Kembali" value="" />
                                            </div>
                                            <div id='loadingzz'></div><input type="submit" class="btnRegister"  value="Register"/>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>