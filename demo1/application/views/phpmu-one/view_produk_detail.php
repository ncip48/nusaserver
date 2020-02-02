<!-- Page Content -->
<div class='container isi'>
<?php 
  if (trim($row['gambar'])==''){ $foto_produk = 'no-image.png'; }else{ $foto_produk = $row['gambar']; }
  $j = $this->model_app->jual_umum($row['id_produk'])->row_array();
  $b = $this->model_app->beli_umum($row['id_produk'])->row_array();
  $stok = $b['beli']-$j['jual'];
  if ($stok=='0'){
    $blur = 'blur'; 
    $status = 'SOLD OUT';
    $btn = "<a class='btn btn-danger text-white mt-4 btn-disabled'>Beli</a>"; 
  }else{ 
    $blur = 'normal'; 
    $status = 'STOK ADA';
    $btn = "<a target='_BLANK' class='btn btn-danger text-white mt-4' href='https://api.whatsapp.com/send?phone=$iden[no_wa]&text=Halo $iden[nama_website], Saya mau membeli $row[nama_produk], Apakah Masih Tersedia?'>Beli</a>"; 
  }
  echo "
  <!-- Portfolio Item Row -->
  <div class='row'>
    <div class='col-md-4'>
      <div class='page'>
      ".$this->breadcrumb->show()."
      </div>
    </div>
    <div class='col-md-8 py-1'>
    <h3>$row[nama_produk]</h3>
    </div>
    <div class='col-md-4'>
      <img class='img-fluid' style='max-height:100%;' src='".base_url()."asset/foto_produk/$foto_produk'>
    </div>

    <div class='col-md-8'>

      <hr>";
      if ($row['diskon']=='0'){
        echo "<span style='color:green; font-size:20px'>Rp ".rupiah($row['harga_konsumen'])."/".$row['satuan']."</span><br>";
      }else{
        echo "<span style='color:green; font-size:20px'>Rp ".rupiah($row['harga_konsumen']-$row['diskon'])."/".$row['satuan']."</span> &nbsp; 
              <span style='color:#8a8a8a; font-size:20px'><del>".rupiah($row['harga_konsumen'])."</del></span><br>";
      }
      echo "
      <h6 class='pt-3'>Ketersediaan : $status <br>
      Stok : $stok</h6>
      $btn
      <hr>
      <h4 class='my-3'>Deskripsi Barang</h4>
      <p>$row[keterangan]</p>
    </div>

  </div>
  <!-- /.row -->
      <hr>
  <!-- Related Projects Row -->
  <h3 class='my-4'>Produk Lainnya</h3>

  <div class='row text-center'>";
  $no = 1;
      foreach ($rows->result_array() as $row){
        if (trim($row['gambar'])==''){ $foto_produk = 'no-image.png'; }else{ $foto_produk = $row['gambar']; }
        $j = $this->model_app->jual_umum($row['id_produk'])->row_array();
        $b = $this->model_app->beli_umum($row['id_produk'])->row_array();
        $stok = $b['beli']-$j['jual'];
        if ($stok=='0'){ $blur = 'blur'; $status = '<div class="stok">SOLD OUT</div>'; }else{ $blur = 'normal'; $status = ''; }
        if (strlen($row['nama_produk']) > 20){ $judul = substr($row['nama_produk'],0,15).'...';  }else{ $judul = $row['nama_produk']; }
        $isi_produk =(strip_tags($r['keterangan'])); 
				$isi = substr($isi_produk,0,200); 
				$isi = substr($isi_produk,0,strrpos($isi," "));  
        $harga = explode(';', $row[harga_konsumen]);
        
        echo "<div class='col-md-3 my-3'>
        <a href='".base_url()."produk/detail/".encrypt_url($row[id_produk])."'>
        <img class='produkdepan fa-4x rounded-circle' src='".base_url()."asset/foto_produk/$foto_produk'>
        </a>
        <h4 class='service-heading text-dark mb-0'><a class='nav-link urlproduk' href='".base_url()."produk/detail/".encrypt_url($row[id_produk])."'>".$judul."</a></h4>";
                                  if ($row['diskon']=='0'){
                                    echo "<span style='color:red;'>Rp ".rupiah($row['harga_konsumen'])."</span><br>";
                                  }else{
                                    echo "<span style='color:red;'>Rp ".rupiah($row['harga_konsumen']-$row['diskon'])."</span>
                                         <span style='color:#8a8a8a;'><del>".rupiah($row['harga_konsumen'])."</del></span><br>";
                                  }

                                  echo "<b>Stok $stok</b><br>
        </div>";
    $no++;
  }
    echo "</div>

  </div>
  <!-- /.row -->

</div>";
?>
<!-- /.container -->