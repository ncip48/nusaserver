<?php
if($this->uri->segment(1)=='survey'){
  echo "<nav class='navbar navbar-expand-lg navbar-dark bg-primary text-white fixed-top' id='mainNav'>";
}else{
  echo "<nav class='navbar navbar-expand-lg navbar-dark bg-white fixed-top' id='mainNav'>";
}
?>
    <div class="container">
      <?php 
              $logo = $this->model_app->view_ordering_limit('logo','id_logo','DESC',0,1);
              foreach ($logo->result_array() as $row) {
              echo "<a class='navbar-brand js-scroll-trigger' href='".base_url()."'><img height=20px src='".base_url()."asset/images/$row[gambar]'/></a>";
              }
            ?>
      <?php
      if($this->uri->segment(1)=='survey'){
        echo "<a style='border-radius: 40px;margin: 1.1em 1em!important;' class='navbar-responsive py-0 btn btn-light btn-sm active text-primary' href='".base_url()."login'>Login</a>";
      }else{
        echo "<button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>
        Menu
        <i class='fas fa-bars'></i>
        </button>";
      }
      ?>  
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
        <?php 
          $ksm = $this->db->query("SELECT * FROM rb_konsumen where id_konsumen='".$this->session->id_konsumen."'")->row_array();
          if ($this->uri->segment(1)=='' OR $this->uri->segment(1)=='main'){
            echo "<li class='nav-item'>
              <a class='nav-link js-scroll-trigger' href='#fitur'>Fitur</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link js-scroll-trigger' href='#produk'>Produk</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link js-scroll-trigger' href='#team'>FAQ</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link js-scroll-trigger' href='#contact'>Contact</a>
            </li>";
            if ($this->session->id_konsumen != ''){
              echo "<li class='nav-item'><a class='nav-link js-scroll-trigger' href='".base_url()."members'>Member Area</a></li>";
            }else{
              echo "<li class='nav-item'><a style='border-radius: 40px;display: block;margin: 1.1em 1em!important;' class='py-0 btn btn-primary  btn-sm active text-white' href='".base_url()."login'>Sign Up</a></li>";
            }
          }else if ($this->uri->segment(1)=='survey'){
            echo "<li class='nav-item'><a style='border-radius: 40px;display: block;margin: 1.1em 1em!important;' class='py-0 btn btn-light btn-sm active text-primary' href='".base_url()."login'>Login</a></li>";
          }else{
            if ($this->session->id_konsumen != ''){
              echo "<li class='nav-item'>
              <a class='nav-link js-scroll-trigger' href='#'>Paket Website</a>
              </li>
              <li class='nav-item'>
              <a class='nav-link js-scroll-trigger' href='#'>Beli Domain</a>
              </li>";
              echo "<li class='nav-item'><a class='nav-link js-scroll-trigger' href='".base_url()."members'>Dashboard</a></li>
              <li class='nav-item'><a id='btnLogout' style='border-radius: 40px;display: block;margin: 1.1em 1em!important;' class='py-0 btn btn-primary  btn-sm active text-white' href='#'>Logout</a></li>";
            }else{
              echo "<li class='nav-item'>
              <a class='nav-link js-scroll-trigger' href='#'>Paket Website</a>
              </li>
              <li class='nav-item'>
              <a class='nav-link js-scroll-trigger' href='#'>Beli Domain</a>
              </li>";
              echo "<li class='nav-item'><a style='border-radius: 40px;display: block;margin: 1.1em 1em!important;' class='py-0 btn btn-primary  btn-sm active text-white' href='".base_url()."login'>Login</a></li>";
            }
          }
          ?>
          <?php
                
              ?>
        </ul>
      </div>
    </div>
  </nav>
