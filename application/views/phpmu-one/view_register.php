<div class='container container-login'>
    <div class='center row justify-content-center'>
        <div class='col-md-12 login-form-2'>
            <h3>Daftar NusaServer</h3>
        </div>
        <div class='col-md-6 login-form-2'>
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
                <select class='form-control' name='h'>
                    <option value=''>- Pilih Kota -</option>";
                <?php foreach ($kota as $rows) {
                    echo "<option value='$rows[kota_id]'>$rows[nama_kota]</option>";
                } ?>
                </select>
            </div>
        </div>
        <div class="col-md-6 login-form-2">
            <div class="form-group">
                <input type="email" class="email form-control" name='d' placeholder="Masukkan Email" value="" />
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
            
        </div>
        <div class='col-md-12 login-form-2'>
        <input type="submit" style='border-radius: 1rem;font-weight: 600;color: #0062cc;background-color: #fff;' class="btn btn-white"  value="Register"/><div id='loadingzz'></div>
        </div>
                </form>
            <div class='messageregister'></div>
        </div>
    </div>
</div>