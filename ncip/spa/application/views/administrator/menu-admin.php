        <section class="sidebar">
          <!-- Sidebar user panel -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU ADMIN</li>
            <li><a href="<?php echo base_url(); ?>administrator"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-gears"></i> <span>Modul Toko</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                  <?php 
                    if($this->session->level=='admin'){
                      echo "<li><a href='".base_url()."administrator/setting'><i class='fa fa-circle-o'></i> Setting Toko</a></li>";
                    }
                  ?>
                  <?php 
                    if($this->session->level=='admin'){
                      echo "<li><a href='".base_url()."administrator/services'><i class='fa fa-circle-o'></i> Managemen Services</a></li>";
                    }
                  ?>
                  <?php 
                    if($this->session->level=='admin'){
                      echo "<li><a href='".base_url()."administrator/rekening'><i class='fa fa-circle-o'></i> Rekening Toko</a></li>";
                    }
                  ?>
                  <?php 
                    if($this->session->level=='admin'){
                      echo "<li><a href='".base_url()."administrator/logo'><i class='fa fa-circle-o'></i> Atur Logo</a></li>";
                    }
                  ?>
              </ul>
            </li>
            <li><a href="<?php echo base_url(); ?>administrator/booking"><i class="fa fa-book"></i> <span>Booking</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-user"></i> <span>Manajemen User</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                  <?php 
                    if($this->session->level=='admin'){
                      echo "<li><a href='".base_url()."administrator/staff'><i class='fa fa-circle-o'></i> List Karyawan/Staff</a></li>";
                    }
                  ?>
                  <?php 
                    if($this->session->level=='admin'){
                      echo "<li><a href='".base_url()."administrator/supervisor'><i class='fa fa-circle-o'></i> List Supervisor</a></li>";
                    }
                  ?>
              </ul>
            </li>
            <li><a href="<?php echo base_url(); ?>administrator/edit_profile/<?php echo encrypt_url($this->session->username); ?>"><i class="fa fa-user"></i> <span>Edit Profile</span></a></li>
            <li><a href="<?php echo base_url(); ?>administrator/logout"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
          </ul>
        </section>