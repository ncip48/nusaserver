<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Services</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_supervisor',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                  <tr><th width='120px' scope='row'>Username</th><td><input type='text' class='form-control' name='a'></td></tr>
                    <tr><th scope='row'>Password</th><td><input type='text' class='form-control' name='b'></td></tr>
                    <tr><th scope='row'>Nama Staff</th><td><input type='text' class='form-control' name='c'></td></tr>
                    <tr><th scope='row'>Email</th><td><input type='text' class='form-control' name='d'></td></tr>
                    <tr><th scope='row'>No HP</th><td><input type='text' class='form-control' name='e'></td></tr>
                    <tr><th scope='row'>Upload Foto</th><td><input type='file' class='form-control' name='f'>
                    <tr><th scope='row'>Alamat</th><td><textarea class='form-control' name='g'></textarea></td></tr>
                  </tbody>
                  </table></div>
              
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='".base_url()."administrator/services'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></div></div>";
            echo form_close();