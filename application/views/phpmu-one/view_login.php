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
        <div class="col-md-6"></div>
        <div class="col-md-6"></div>
    </div>
</div>


