

            

            <?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Booking</h3>
                </div>
              <div class='box-body'>"; ?>
              <input type='hidden' id='idbook' value='<?php echo decrypt_url($this->uri->segment(3)); ?>'>
            <input type='hidden' id='tglnow' value='<?php echo date('d-m-Y') ?>'>
            <div class="bungkus">
                <div id='sebelum'>
                    <?php $this->model_tgl->getTabelTgl(date('d-m-Y'), decrypt_url($this->uri->segment(3))); ?>
                </div>
                <div id='hasil'></div>
            </div>
            <br>
            <p><button class='btn btn-full btn-sm'> 08:00 </button> : Tidak Tersedia  <button class='btn btn-outline-primary btn-sm'> 08:00 </button> : Tersedia <button class='btn btn-primary btn-sm'> 08:00 </button> : Bookingan Anda</p>
              <?php $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_booking',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$record[id_booking]'>
                    <tr><th width='120px' scope='row'>Nama Pelanggan</th><td><input type='text' class='form-control' value='$record[nama_user]' readonly></td></tr>
                    <tr><th width='120px' scope='row'>Nama Staff</th><td><input type='text' class='form-control' value='$record[nama_karyawan]' readonly></td></tr>
                    <tr><th scope='row'>Services</th><td><input type='text' class='form-control' value='$record[nama_services]' readonly></td></tr>
                    <tr><th scope='row'>Jam Booking</th><td><input type='text' class='form-control' value='".date('d-m-Y H:i', strtotime($record['jam_booking']))."' readonly></td></tr>
                    <tr><th scope='row'>Ubah Jam</th><td><input type='datetime' id='jambooking' class='form-control' name='a'></td></tr>
                    </tbody>
                  </table></div>
              
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
                    <a href='".base_url()."administrator/services'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div></div></div>";
            echo form_close();