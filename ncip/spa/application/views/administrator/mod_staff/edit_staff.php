<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Services</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_staff',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$record[id_karyawan]'>
                    <tr><th width='120px' scope='row'>Username</th><td><input type='text' class='form-control' name='a' value='$record[username]'></td></tr>
                    <tr><th scope='row'>Password</th><td><input type='text' class='form-control' name='b' value='$record[password]'></td></tr>
                    <tr><th scope='row'>Nama Staff</th><td><input type='text' class='form-control' name='c' value='$record[nama_karyawan]'></td></tr>
                    <tr><th scope='row'>Email</th><td><input type='text' class='form-control' name='d' value='$record[email]'></td></tr>
                    <tr><th scope='row'>No HP</th><td><input type='text' class='form-control' name='e' value='$record[no_hp]'></td></tr>
                    <tr><th scope='row'>Ganti Foto</th><td><input type='file' class='form-control' name='f'>";
                    if ($record['foto'] != ''){ echo "<i style='color:red'>Foto Saat ini : </i><a target='_BLANK' href='".base_url()."asset/foto_user/$record[foto]'>$record[foto]</a>"; } echo "</td></tr></td></tr>
                    <tr><th scope='row'>Alamat</th><td><textarea class='form-control' name='g'>$record[alamat]</textarea></td></tr>
                    </tbody>
                  </table></div>
              
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
                    <a href='".base_url()."administrator/services'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></div></div>";
            echo form_close();