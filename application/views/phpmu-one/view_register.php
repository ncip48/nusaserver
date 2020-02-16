<div class='container container-login'>
    <div class='center row justify-content-center'>
            <div class='col-md-12 login-form-2 panelregister'>
                <h3>Daftar NusaServer</h3>
            </div>
            <div class='col-md-6 login-form-2 panelregister'>
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
                    <select class='form-control' name="provinsi" id="provinsi">
                        <option value=''>- Pilih Provinsi -</option>";
                    <?php foreach ($provinsi as $data) {
                        echo "<option value='".$data->provinsi_id."'>".$data->nama_provinsi."</option>";
                    } ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="kota" id="kota" class='form-control'>
                        <option value="">Pilih Kota</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 login-form-2 panelregister">
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
                <?php 
                if ($this->uri->segment(2)==''){
                echo "<div class='form-group'>
                    <input type='text' class='form-control' name='reff' value='' placeholder='Masukkan Kode Refferal jika ada'/>
                </div>";
                }else{
                echo "<div class='form-group'>
                    <input type='text' class='form-control' value='Refferal : ".$refferal[nama_lengkap]."' disabled/>
                    <input type='hidden' class='form-control' name='reff' value='".$refferal[kode_refferal]."'/>
                </div>";
                }
                ?>
            </div>
            <div class='col-md-12 login-form-2 panelregister'>
                <input type="submit" style='border-radius: 1rem;font-weight: 600;color: #0062cc;background-color: #fff;' class="btn btn-white"  value="Register"/><div id='loadingzz'></div>
            </div>
                    </form>
        <div class='col-md-12 login-form-2'>
            <div id='aksiregister'></div>
        </div>
    </div>
</div>

<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#loading").hide();
    
    $("#provinsi").change(function(){ // Ketika user mengganti atau memilih data provinsi
      $("#kota").hide(); // Sembunyikan dulu combobox kota nya
      $("#loading").show(); // Tampilkan loadingnya
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("auth/listKota"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_provinsi : $("#provinsi").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          $("#loading").hide(); // Sembunyikan loadingnya
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#kota").html(response.list_kota).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>
