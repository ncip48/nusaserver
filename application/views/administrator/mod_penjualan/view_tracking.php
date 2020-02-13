<div class='col-md-12'>
        <div class='box box-info'>
          <div class='box-header with-border'>
            <h3 class='box-title'><?php echo $title; ?></h3>
            <a class='pull-right btn btn-warning btn-sm' href='<?php echo base_url(); ?>administrator/konfirmasi'>Kembali</a>
          </div>
          <div class='box-body'>
          <div class='col-md-12'>
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
if ($rows['status']=='0'){ $proses = '<i class="text-danger">Pending</i>'; }elseif($rows['status']=='1'){ $proses = '<i class="text-warning">Telah Membayar</i>'; }
  echo "<div class='col-md-7'>
        <dl class='dl-horizontal'>
            <dt>Nama</dt>       <dd>$rows[nama_lengkap]</dd>
            <dt>No Telpon/Hp</dt>       <dd>$rows[no_hp]</dd>
            <dt>Email</dt>       <dd>$rows[email]</dd>
            <dt>Alamat Lengkap</dt>     <dd>$rows[alamat_lengkap]</dd>
        </dl>
    </div>

    <div class='col-md-5'>
        <center>
        Total Tagihan 
        <h4 style='margin:0px;'>Rp ".rupiah($rows['harga']+$rows['harga_domain']+$rows['ppn'])."<br> <br>
        </h4>
        Status : <i>$proses</i>   
        </center><br>
    </div>

      <table class='table table-striped table-condensed '>
        <thead>
          <tr bgcolor='#e3e3e3'>
            <th width='30px'>No</th>
            <th width='47%'>Nama Produk</th>
            <th>Durasi</th>
            <th>Harga</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <td>1</td>
            <td class='valign'>$rows[nama_produk]</td>
            <td class='valign'>$durasi</td>
            <td class='valign'>".rupiah($rows[harga])."</td>
          </tr>
          <tr>
            <td>2</td>
            <td class='valign'>$rows[nama_domain].$rows[tld]</td>
            <td class='valign'>1 Tahun</td>
            <td class='valign'>".rupiah($rows[harga_domain])."</td>
          </tr>
                <tr class='success'>
                  <td colspan='3'><b>Subtotal </b> <i class='pull-right'>(".terbilang($rows['harga']+$rows['harga_domain'])." Rupiah)</i></td>
                  <td><b>Rp ".rupiah($rows['harga']+$rows['harga_domain'])."</b></td>
                </tr>

                <tr class='success'>
                  <td colspan='3'><b>Ppn 10%</b> <i class='pull-right'>(".terbilang($rows['ppn'])." Rupiah)</i></td>
                  <td><b>Rp ".rupiah($rows['ppn'])."</b></td>
                </tr>

                <tr class='success'>
                  <td colspan='3'><b>Total</b> <i class='pull-right'>(".terbilang($rows['harga']+$rows['harga_domain']+$rows['ppn'])." Gram)</i></td>
                  <td><b>Rp ".rupiah($rows['harga']+$rows['harga_domain']+$rows['ppn'])."</b></td>
                </tr>
        </tbody>
      </table><br>";

      $cek_konfirmasi = $this->model_app->view_where('rb_konfirmasi',array('id_penjualan'=>$rows['id_invoice']));
      if ($cek_konfirmasi->num_rows()>=1){
        echo "<div class='alert alert-success' style='border-radius:0px; padding:5px'>Konfirmasi Pembayaran dari Pembeli : </div>";
        $konfirmasi = $this->model_app->view_invoice('rb_konfirmasi','rb_rekening','id_rekening','nama_bank',array('id_penjualan'=>$rows['id_invoice']),'id_konfirmasi_pembayaran','DESC');
        foreach ($konfirmasi as $r) {
          echo "<div class='col-md-8'>
                  <dl class='dl-horizontal'>
                      <dt>Nama Pengirim</dt>       <dd>$r[nama_pengirim]</dd>
                      <dt>Total Transfer</dt>      <dd>$r[total_transfer]</dd>
                      <dt>Tanggal Transfer</dt>    <dd>".tgl_indo($r['tanggal_transfer'])."</dd>
                      <dt>Bukti Transfer</dt>      <dd><a href='".base_url()."administrator/download_file/$r[bukti_transfer]'>Download File</a></dd>
                      <dt>Rekening Tujuan</dt>     <dd>".strtoupper($r[nama_bank])." - $r[no_rekening] - $r[pemilik_rekening]</dd>
                      <dt>Waktu Konfirmasi</dt>      <dd>".tgl_jam($r[waktu_konfirmasi])."</dd>
                  </dl>
              </div>";
        }

      }

      echo "</div>
      </div>
    </div>
  </div>";
