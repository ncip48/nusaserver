<?php 
$iden = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array(); 
?>
<header class="masthead">
  <div class="jumbotron">
    <div class="container">
      <div class="intro-text">
        <div class="col-md-6 col-xs-12">
          <h2 class="jumbotron-heading">Kelola Toko Online Anda Lebih Mudah dengan <?php echo $iden['nama_website']; ?></h2>
          <p class="jumbotron-paragraf"><?php echo $iden['nama_website']; ?> membantu Anda mengelola bisnis secara profesional dengan menyediakan laporan data penjualan secara <i>realtime</i>, manajemen stok dengan multi gudang, pengelolaan <i>database</i> pelanggan, dan memaksimalkan konversi penjualan melalui toko online Anda.</p> 
          <p><a class="btn btn-jumbotron btn-primary btn-lg active" href="<?php echo base_url(); ?>mulai" role="button">Gabung Yuk</a></p> 
      </div>
    </div>
  </div>
  </header>

<!-- cek domain -->
<section class="bg-light page-section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h4 class="section-heading text-uppercase">Cek Domain Toko</h2>
          <h3 class="section-subheading text-muted mb-5">Yuk beli domain untuk tokomu</h3>
          <div class="md-margin"></div>
        </div>
      </div>
      <div class="row justify-content-md-center">
        <div class="col-lg-8 bg-primary py-5 px-5">
          <form>
            <div class="row">
              <div class="col-md-9 px-1">
                <div class="form-group">
                  <input class="form-control" id="subdomain" name="subdomain" type="text" placeholder="Nama Toko Anda" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-3 px-1">
                <div class="form-group">
                  <select class="form-control" name="domain" id="domain">
                    <option value="">Pilih Domain</option>
                    <option value="com">.com</option>
                    <option value="net">.net</option>
                    <option value="biz">.biz</option>
                    <option value="online">.online</option>
                  </select>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-left text-light">
                <div id="domainsukses"></div>
              </div>
            </div>
          </form>
        </div>
      </div>
        </div>
    </div>
  </section>

  <!-- Services -->
  <section class="bg-white page-section" id="fitur">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h4 class="section-heading text-uppercase">ALASAN MENGAPA HARUS MEMILIH <?php echo $iden['nama_website']; ?></h2>
          <h3 class="section-subheading text-muted">Bebearapa fitur yang kami berikan</h3>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary active"></i>
            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Pro UKM</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Multi Template</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Mobile Friendly</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Harga Terjangkau</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Super SEO Friendly</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Pelatihan UKM</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Pembayaran Cepat</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Support Tutorial</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Support Group dan Materi</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
        </div>
      </div>
    </div>
  </section>

<!-- PRODUK -->
  <section class="pricing py-5 bg-light page-section" id="produk">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h4 class="section-heading text-uppercase">Daftar Paket</h2>
          <h3 class="section-subheading text-muted">Berikut paket yang kami sediakan</h3>
        </div>
      </div>
    </div>

  <div class="container">
    <div class="row">
    <?php 
      $no = 1;
              foreach ($record->result_array() as $row){
              if (trim($row['gambar'])==''){ $foto_produk = 'no-image.png'; }else{ $foto_produk = $row['gambar']; }
              $harga = explode(';', $row[harga_satu]);
              echo "<div class='col-lg-4'>
              <div class='card mb-5 mb-lg-0'>
                <div class='card-body'>
                  <h5 class='card-title text-muted text-uppercase text-center'>$row[nama_produk]</h5>
                  <del><h6 class='card-price text-center'>". rupiah($harga[0])."</h6></del>
                  <h4 class='card-sub-price text-center font-weight-normal'>". rupiah($harga[1])."<span class='period'>/bulan</span></h4>
                  <hr>
                  <ul class='fa-ul'>
                    $row[keterangan]
                  </ul>
                  <a href='".base_url()."mulai' class='btn btn-block btn-primary text-uppercase text-white'>Gabung Yuk</a>
                </div>
              </div>
            </div>";

              /*echo "<div class='col-sm-4'>
                  <div class='team-member'>
                          <a href='".base_url()."produk/detail/$row[produk_seo]'><p style='line-height:20px'>$row[nama_produk]</p>
                                  <img class='$blur' src='".base_url()."asset/foto_produk/$foto_produk'>
                                  $status";
                                  if ($row['diskon']=='0'){
                                    echo "<span style='color:green;'>Rp ".rupiah($row['harga_konsumen'])."</span><br>";
                                  }else{
                                    echo "<span style='color:green;'>Rp ".rupiah($row['harga_konsumen']-$row['diskon'])."</span>
                                         <span style='color:#8a8a8a;'><del>".rupiah($row['harga_konsumen'])."</del></span><br>";
                                  }

                                  echo "<b>Stok $stok</b><br>
                          </a><br>
                        </center>
                    </div></div>"; */
                $no++;
              }
              ?>
    </div>
  </div>
</section>

  <!-- Portfolio Grid -->
  <section class="bg-white page-section" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h4 class="section-heading text-uppercase">Template</h4>
          <h3 class="section-subheading text-muted">Beberapa demo yang kami berikan</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/01-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Threads</h4>
            <p class="text-muted">Illustration</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/02-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Explore</h4>
            <p class="text-muted">Graphic Design</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/03-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Finish</h4>
            <p class="text-muted">Identity</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/04-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Lines</h4>
            <p class="text-muted">Branding</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/05-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Southwest</h4>
            <p class="text-muted">Website Design</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="img/portfolio/06-thumbnail.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>Window</h4>
            <p class="text-muted">Photography</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section class="page-section bg-light" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h4 class="section-heading text-uppercase">Contact US</h4>
          <h3 class="section-subheading text-dark">Hubungi kami di bawah ini</h3>
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
                <button id="sendMessageButton" class="btn btn-primary btn-sm text-uppercase" type="submit">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <?php include "footer2.php"; ?>