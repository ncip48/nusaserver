<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Form Pengajuan Reseller</h2>
    <hr>       
          <?php 
          echo "<p>Berikut Informasi Data Profile anda.<br> 
                  Pastikan data-data dibawah ini sudah benar, agar tidak terjadi kesalahan saat transaksi.</p>";                
                          #$attributes = array('id' => 'frmReseller','class'=>'form-horizontal');
                          #echo form_open_multipart('members/aksireseller',$attributes); 
                          echo "<form action='".base_url()."members/aksireseller' id='frmReseller' method='POST'>
                                <table class='table table-light table-condensed table-responsive'>
                                <thead>
                                <input class='required form-control' type='hidden' name='id' value='$row[id_konsumen]' readonly>
                                  <tr><td><b>Nama Lengkap</b></td><td><input class='required form-control' type='text' value='$row[nama_lengkap]' readonly></td></tr>
                                  <tr><td><b>Email</b></td><td><input class='required email form-control' type='email' value='$row[email]' readonly></td></tr>
                                  <div class='form-group row'>
                        <tr><td></td><td><div class='custom-control custom-radio'>
                            <input type='radio' id='1' name='komunitas' class='custom-control-input' value='0' checked>
                            <label class='custom-control-label' for='1'>Perorangan </label>
                        </div>
                        <div class='custom-control custom-radio'>
                            <input type='radio' id='2' name='komunitas' class='custom-control-input' value='1'>
                            <label class='custom-control-label' for='2'>Komunitas</label>
                        </div>
                    </div>
                    </td></tr>
                                  
                                  <tr id='kom'><td><b>Pilih Komunitas</td><td>
                                  <select class='form-control' name='kom'>";
                                  foreach ($komunitas->result_array() as $k) {
                                    echo "<option value='$k[id_komunitas]'>$k[nama_komunitas]</option>";
                                  }
                                  echo"</select>
                                  tidak ada?<a href='#tambahkomunitas' data-toggle='modal' data-target='#tambahkomunitas'> tambahkan baru?</a></td></tr>
                                  <tr><td>Data Rekening</td><td><hr></td></tr>
                                  <tr><td><b>Nama Bank</b></td><td>
                                    <select class='form-control' name='c'>
                                      <option value='bri'>BRI</option>
                                      <option value='mandiri'>Mandiri</option>
                                      <option value='bca'>BCA</option>
                                      <option value='bni'>BNI</option>
                                    </select>
                                  </td></tr>
                                  
                                  <tr><td><b>No rekening</b></td><td><input class='required number form-control' type='number' name='d' value=''></td></tr>
                                
                                  <tr><td></td><td><input class='float-right btn btn-sm btn-primary' type='submit' name='submit' value='Ajukan'></td></tr>
                                </thead>
                            </table>";
                          echo form_close();
          ?>

          <div id='reseller'></div>
          
</div>

<script>
$(document).ready(function() {
  $('#kom').hide();
  $("input[name='komunitas']").change(function(){
    var id = $(this).val()
    if (id=='0'){
      $('#kom').hide();
    }else{
      $('#kom').show();
    }
    //console.log($(this).val());
  });


  $('#frmReseller').submit(function() {
    jQuery.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                //$('.panelregister').hide();
                var data = jQuery.parseJSON(response);
                $('#reseller').html(data.error);
                //console.log(data);
            }
        });
        return false;
    });

})
</script>