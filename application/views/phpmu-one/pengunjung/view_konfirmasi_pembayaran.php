<div class="container isi">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
    <?php 

    if($rows[durasi]==30){
      $durasi = '1 Bulan';
    }elseif ($rows[durasi]==183){
      $durasi = '6 Bulan';
    }elseif ($rows[durasi]==365){
      $durasi = '1 Tahun';
    }else{
      $durasi = 'bercanda???';
    }

    $attributes = array('class'=>'form-horizontal','role'=>'form', 'id'=>'frmKonfirmasi');
    echo form_open_multipart('konfirmasi/kirim',$attributes); 
    echo "<table class='table table-borderless'>
        <tbody>
          <input type='hidden' name='id' class='form-control' style='width:100%' value='$rows[id_invoice]'>
          <tr><th scope='row' >No Invoice</th><td><input type='text' name='a' class='form-control' style='width:100%' value='$rows[no_tagihan]' readonly>
          <tr><th scope='row' >Nama Paket</th><td><input type='text' class='form-control' style='width:100%' value='$rows[nama_produk] ($durasi) @ ".rupiah($rows[harga])."' readonly>
          <tr><th scope='row' >Nama Domain</th><td><input type='text' class='form-control' style='width:100%' value='$rows[nama_domain].$rows[tld] (1 Tahun) @ ".rupiah($rows[harga_domain])."' readonly>
          <tr><th scope='row'>Total</th><td><input type='text' name='b' class='form-control' value='Rp ".rupiah($rows['harga']+$rows['harga_domain']+rows[ppn])."' readonly>
          <tr><th  scope='row'>Nama Bank</th>  <td><input type='text' class='form-control' name='c' value='".strtoupper($rows[nama_bank])."' readonly></td></tr>
          <tr><th  scope='row'>Nama Bank</th>  <td><input type='text' class='form-control' value='$rows[no_rekening] a/n ".strtoupper($rows[pemilik_rekening])."' readonly></td></tr>
          <tr><th></th><td><hr></td></tr>
          <tr><th  scope='row'>Nama Pengirim</th>  <td><input type='text' class='form-control' name='d' value='$ksm[nama_lengkap]' required></td></tr>
          <tr><th scope='row'>Tanggal Transfer</th>             <td><input type='text' class='datepicker form-control' style='padding-left:13px' name='e' data-date-format='yyyy-mm-dd' value='".date('Y-m-d')."'></td></tr>
          <tr><th scope='row'>Bukti Transfer</th>               <td><input type='file' class='form-control' name='f'></td></tr>
        </tbody>
      </table>

    <div class='box-footer'>
      <button type='submit' name='submit' class='btn btn-primary'>Konfirmasi</button>
    </div>";
    echo form_close();
    ?>
    <p>
    <div id='konfirmasi' class='text-left'></div>
    </p>
    </div>
  </div>
</div>