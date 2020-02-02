<?php 
$iden = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array(); 
?>
<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('<?= base_url() ?>asset/slider/slide1.jpg')">
        <div class="carousel-caption d-md-block">
          <h2 class="display-4">Slide Pertama</h2>
          <p class="lead">Deskripsi untuk slide pertama.</p>
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('<?= base_url() ?>asset/slider/slide2.jpg')">
        <div class="carousel-caption d-md-block">
          <h2 class="display-4">Slide Kedua</h2>
          <p class="lead">Deskripsi untuk slide kedua.</p>
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('<?= base_url() ?>asset/slider/slide3.jpg')">
        <div class="carousel-caption d-md-block">
          <h2 class="display-4">Slide Ketiga</h2>
          <p class="lead">Ngebucin sek ah wkwkkwkwkwkwkkwkw.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>
</header>

  <!-- Produk -->
  <section class="bg-white page-section" id="fitur">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h4 class="section-heading text-uppercase">Produk Kami</h2>
          <h3 class="section-subheading text-muted">Bebearapa produk kami yang berkualitas</h3>
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
        ?>
      </div>
    </div>
  </section>

  <!-- Portfolio Grid -->
  <section class="bg-danger text-white page-section" id="portfolio">
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
                    <h4 class='service-heading text-dark mb-0'><a class='nav-link urlproduk' href='".base_url()."berita/detail/$row[judul_seo]'>".$judul."</a></h4>
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
          <form id="contactForm" name="sentMessage" novalidate="novalidate">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-danger text-uppercase" type="submit">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
