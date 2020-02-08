<style>
.container-login {
  height: 100vh;
  position: relative;
}

.center {
  margin: 0;
  width: fit-content;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
</style>

<div class='container container-login'>
    <div class='center row justify-content-center'>
        <div class='col-md-12 login-form-2'>
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
                    <a href="#" data-toggle='modal' data-target='#lupass' class='ForgetPwd' value='Lupa Password'>Lupa Password?</a>
                </div>
                <div id='aksilogin'></div>
            </form>
        </div>
    </div>
</div>


