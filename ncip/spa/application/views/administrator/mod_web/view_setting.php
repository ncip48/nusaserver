<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Setting Toko</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/setting',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th width='120px' scope='row'>Nama Toko</th><td><input type='text' class='form-control' name='a' value='$record[nama_toko]'></td></tr>
                    <tr><th scope='row'>Alamat Toko</th><td><textarea class='form-control' name='b'>$record[alamat_toko]</textarea></td></tr>
                    <tr><th scope='row'>Jam Buka</th><td><input type='time' class='form-control' name='c' value='$record[jam_buka]'></td></tr>
                    <tr><th scope='row'>Jam Tutup</th><td><input type='time' class='form-control' name='d' value='$record[jam_tutup]'></td></tr>
                    <tr><th scope='row'>Interval</th><td><input type='text' class='form-control' name='e' value='$record[interval]'><hr style='margin:5px'>
                                                                              *masukkan dalam waktu menit, 60 menit, 120 menit, dll</td></tr>
                    <tr><th scope='row'>Facebook</th><td><input type='text' class='form-control' name='f' value='$record[facebook]'></td></tr>
                    <tr><th scope='row'>Instagram</th><td><input type='text' class='form-control' name='g' value='$record[instagram]'></td></tr>
                    <tr><th scope='row'>Twitter</th><td><input type='text' class='form-control' name='h' value='$record[twitter]'></td></tr>
                    <tr><th scope='row'>Favicon</th><td><input type='file' class='form-control' name='i' value='$record[favicon]'><hr style='margin:5px'>
                                                                              Favicon Aktif Saat ini : <img style='height:50px;' src='".base_url()."asset/images/$record[favicon]'></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='".base_url()."administrator/home'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";