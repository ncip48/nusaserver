<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Services</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_services',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Nama Services</th><td><input type='text' class='form-control' name='a' onkeyup=\"nospaces(this)\" required></td></tr>
                    <tr><th scope='row'>Point</th><td><input type='text' class='form-control' name='b' onkeyup=\"nospaces(this)\" required>
                    point digunakan untuk ditukar oleh member</td></tr>
                    <tr><th scope='row'>Upload Foto</th><td><input type='file' class='form-control' name='c'></td></tr>
                    <tr><th scope='row'>Deskripsi</th><td><textarea class='form-control' name='d'></textarea></td></tr>
                  </tbody>
                  </table></div>
              
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='".base_url()."administrator/services'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></div></div>";
            echo form_close();