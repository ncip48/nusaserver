<?php if($this->uri->segment(1)=='' OR $this->uri->segment(1)=='main'){
echo "<nav class='navbar navbar-expand-lg navbar-dark text-white fixed-top' id='mainNav'>";
}else{
  echo "<nav class='navbar navbar-expand-lg bg-biru navbar-dark text-white fixed-top' id='mainNav'>";
}
?>
    <div class="container">
      <?php 
              $logo = $this->model_app->view_ordering_limit('logo','id_logo','DESC',0,1);
              foreach ($logo->result_array() as $row) {
              echo "<a class='navbar-brand js-scroll-trigger' href='".base_url()."'><img height=20px src='".base_url()."asset/images/$row[gambar]'/></a>";
              }
            ?>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <?php if($this->uri->segment(1)=='' OR $this->uri->segment(1)=='main'){
echo "<div class='collapse navbar-collapse' id='navbarResponsive'>";
}else{
  echo "<div class='collapse navbar-collapse' id='navbarResponsive'>";
}
?>
        <ul class='navbar-nav text-uppercase ml-auto'>
        <li class='nav-item'>
            <a class='nav-link js-scroll-trigger' href='<?= base_url()?>'>Home</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link js-scroll-trigger' href='<?= base_url()?>produk'>Produk</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link js-scroll-trigger' href='<?= base_url()?>artikel'>Blog</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link js-scroll-trigger' href='<?= base_url()?>about'>Tentang Kami</a>
          </li>
          <?php if($this->uri->segment(1)=='' OR $this->uri->segment(1)=='main'){
          echo "<li class='nav-item'>
                  <a class='nav-link js-scroll-trigger' href='#contact'>Hubungi Kami</a>
                </li>";
          }else{
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
