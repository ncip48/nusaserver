<div class="container isi">
      <div class="row">
        <div class="col-lg-12 text-center my-4">
          <h4 class="section-heading text-uppercase">&nbsp; <?php echo $judul; ?></h2>
          <p class="section-subheading text-muted">Semua Produk Kami</p>
        </div>
      </div>
    <div class="row text-center">
      <?php 
      $no = 1;
      foreach ($record->result_array() as $row){
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
        <img class='produkdepan fa-4x' src='".base_url()."asset/foto_produk/$foto_produk'>
        </a>
        <h4 class='service-heading text-dark mb-0'><a class='nav-link urlproduk' href='".base_url()."produk/detail/".encrypt_url($row[id_produk])."'>".$judul."</a></h4>";
                                  if ($row['diskon']=='0'){
                                    echo "<span style='color:#145ac9;'>Rp ".rupiah($row['harga_konsumen'])."</span><br>";
                                  }else{
                                    echo "<span style='color:#145ac9;'>Rp ".rupiah($row['harga_konsumen']-$row['diskon'])."</span>
                                         <span style='color:#8a8a8a;'><del>".rupiah($row['harga_konsumen'])."</del></span><br>";
                                  }

                                  echo "<b>Stok $stok</b><br>
        </div>";
        if ($no % 6 == 0){
          echo "<hr>";
        }
    $no++;
  }
echo "<div style='clear:both'></div>
  </div>
  <div class='row my-3'>
        <div class='col'>";
            echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>