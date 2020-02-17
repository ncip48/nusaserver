<?php 
$iden = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
$banner = $this->db->query("SELECT * FROM banner")->row_array();
$slider = $this->db->query("SELECT * FROM slide");
$jumlahslide =  $this->db->query("SELECT count(*) as jumlah FROM slide")->row_array();
?>
<header>
<div id='slider' class='carousel slide' data-ride='carousel'>
    <ol class='carousel-indicators'>
      <li data-target='#slider' data-slide-to='0' class='active'></li>
    <?php
    for ($i = 1; $i < $jumlahslide[jumlah]; $i++) {
        echo "<li data-target='#slider' data-slide-to='$i'></li>";
    }
    ?>
    </ol>
    <div class='carousel-inner' role='listbox'>
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class='carousel-item active' style='background-image: url("<?= base_url() ?>asset/slider/<?= $slider->row_array()[gambar]?>")'>
        <div class='carousel-caption d-md-block'>
          <h2 class='display-4'><?= $slider->row_array()[judul]?></h2>
          <p class='lead'><?= $slider->row_array()[keterangan]?></p>
        </div>
      </div>
      <?php
      //for ($i = 1; $i < $jumlahslide[jumlah]; $i++) {
        $temp_row = array_slice($slider->result_array(), 1);
        foreach ($temp_row as $row){
          echo "<div class='carousel-item' style='background-image: url(".base_url()."asset/slider/".$row['gambar'].")'>
                  <div class='carousel-caption d-md-block'>
                    <h2 class='display-4'>$row[judul]</h2>
                    <p class='lead'>$row[keterangan]</p>
                  </div>
                </div>";
        }
      //}
      ?>
<!--
      <div class='carousel-item' style='background-image: url("<?= base_url() ?>asset/slider/slide2.jpg")'>
        <div class='carousel-caption d-md-block'>
          <h2 class='display-4'>Slide Kedua</h2>
          <p class='lead'>Deskripsi untuk slide kedua.</p>
        </div>
      </div>

      <div class='carousel-item' style='background-image: url("<?= base_url() ?>asset/slider/slide3.jpg")'>
        <div class='carousel-caption d-md-block'>
          <h2 class='display-4'>Slide Ketiga</h2>
          <p class='lead'>Ngebucin sek ah wkwkkwkwkwkwkkwkw.</p>
        </div>
      </div>
    </div> -->
    <a class='carousel-control-prev' href='#slider' role='button' data-slide='prev'>
          <span class='carousel-control-prev-icon' aria-hidden='true'></span>
          <span class='sr-only'>Previous</span>
        </a>
    <a class='carousel-control-next' href='#slider' role='button' data-slide='next'>
          <span class='carousel-control-next-icon' aria-hidden='true'></span>
          <span class='sr-only'>Next</span>
        </a>
  </div>
</header>

<!-- Banner -->
<section class="bg-biru text-white page-section" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h4 class="section-heading text-uppercase">Harga Khusus</h4>
          <h3 class="section-subheading">Dapatkan Harga Khusus Untuk Barang ini</h3>
        
        </div>
      </div>
      <div class="row"> 
      <div class="col-lg-12 text-center">
      <img class="img-fluid" src="<?= base_url() ?>/asset/banner/<?= $banner[gambar] ?>">
      </div>
      </div>
    </div>
  </section>

  <!-- Produk -->
  <section class="bg-white page-section" id="fitur">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h4 class="section-heading text-uppercase">Produk Kami</h2>
          <h3 class="section-subheading text-muted"></h3>
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
        
        echo "<div class='col-md-3'>
        <figure class='card card-product'>
          <div class='img-wrap'> 
          <img src='".base_url()."asset/foto_produk/$foto_produk'>
          </div>
          <figcaption class='info-wrap'>
            <h6 class='title text-dots text-dark mb-0'><a class='nav-link urlproduk' href='".base_url()."produk/detail/".encrypt_url($row[id_produk])."'>".$judul."</a></h6>
            <div class='action-wrap'>
              <div class='price-wrap h5'>";
              if ($row['diskon']=='0'){
                echo "<span class='price-new'>Rp ".rupiah($row['harga_konsumen'])."</span>";
              }else{
                echo "<span class='price-new'>Rp ".rupiah($row['harga_konsumen']-$row['diskon'])."</span>
                     <del class='price-old'>".rupiah($row['harga_konsumen'])."</del>";
              }           
              echo "
              </div> <!-- price-wrap.// -->
              <b>Stok $stok</b><br> 
              <a class='btn btn-primary btn-sm float-right' href='".base_url()."produk/detail/".encrypt_url($row[id_produk])."'>Beli</a>
              </div> <!-- action-wrap -->
          </figcaption>
        </figure> <!-- card // -->
      </div> <!-- col // -->";
        /*
        echo "<div class='col-md-3 my-3'>
        <a href='".base_url()."produk/detail/".encrypt_url($row[id_produk])."'>
        <img class='produkdepan fa-4x ' src='".base_url()."asset/foto_produk/$foto_produk'>
        </a>
        <h4 class='service-heading text-dark mb-0'><a class='nav-link urlproduk' href='".base_url()."produk/detail/".encrypt_url($row[id_produk])."'>".$judul."</a></h4>";
                                  if ($row['diskon']=='0'){
                                    echo "<span style='color:#145ac9;'>Rp ".rupiah($row['harga_konsumen'])."</span><br>";
                                  }else{
                                    echo "<span style='color:#145ac9;'>Rp ".rupiah($row['harga_konsumen']-$row['diskon'])."</span>
                                         <span style='color:#8a8a8a;'><del>".rupiah($row['harga_konsumen'])."</del></span><br>";
                                  }

                                  echo "<b>Stok $stok</b><br>
        </div>"; */
        $no++;
        }
        ?>
      </div>
    </div>
  </section>

  <!-- Portfolio Grid -->
  <section class="bg-biru text-white page-section" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h4 class="section-heading text-uppercase">Artikel / Blog</h4>
          <h3 class="section-subheading">Kami sajikan artikel untuk anda</h3>
        </div>
      </div>
      <div class="row">
        <?php
        $no = 1;
        foreach ($berita->result_array() as $row){
          $isi_berita = strip_tags($row['isi_berita']); 
          $isi = substr($isi_berita,0,100); 
          $isi = substr($isi_berita,0,strrpos($isi," "));
          $tanggal = tgl_indo($row['tanggal']);
          $judul = substr($row['judul'],0,33);
          if (strlen($row['judul']) > 35){ $judul = substr($row['judul'],0,35).'...';  }else{ $judul = $row['judul']; }
          if ($row['gambar'] == ''){ $foto = 'small_no-image.jpg'; }else{ $foto = $row['gambar']; }
          echo "<div class='col-md-4 col-sm-6 portfolio-item'>
                  <a class='portfolio-link' style='cursor:default;'>
                    <img class='img-fluid' src='".base_url()."asset/foto_berita/".$foto."' alt=''>
                  </a>
                  <div class='portfolio-caption text-left'>
                    <h4 class='service-heading text-dark mb-0'><a class='nav-link urlproduk' href='".base_url()."artikel/detail/$row[judul_seo]'>".$judul."</a></h4>
                    <p class='service-heading mb-0 text-muted'>".$isi."...</p>
                  </div>
                </div>";
        $no++;
    }
?>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section class="bg-white text-dark page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h4 class="section-heading text-uppercase">Contact Us</h4>
          <h3 class="section-subheading text-muted">Hubungi Kami dibawah</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form id="frmPesan" name="sentMessage" novalidate="novalidate" method='POST' action='<?= base_url() ?>main/contact'>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" name='a' id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Masukkan Nama.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" name='b' id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Masukkan Email.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" name='c' id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Masukkan No HP.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" name='d' id="message" placeholder="Your Message *" required="required" data-validation-required-message="Masukkan Pesan."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-biru text-uppercase" type="submit">Send Message</button>
              </div>
            </div>
          </form>
          <div id='aksipesan'></div>
        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript">
    $(document).ready(function() {
        $('#frmPesan').submit(function() {
		    $.ajax({
			    type: 'POST',
			    url: $(this).attr('action'),
			    data: $(this).serialize(),
			    success: function(response) {
                    var data = jQuery.parseJSON(response);
                    //console.log(data);
                    $('#aksipesan').html(data.error);
                    //console.log(data);
                    //$('#reloading').html(data);
                    //$('#reloadcontent').hide();
			    }
		    })
		    return false;
	    });
    })
</script>