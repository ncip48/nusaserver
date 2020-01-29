<div class='container isi'>
  <div class='row'>
    <div class='col-md-2 mb-3 text-center'>
      <ul class='nav nav-pills flex-column' id='myTab' role='tablist'>
        <li class='nav-item'>
          <a class='nav-link active' id='dashboard-tab' data-toggle='tab' href='#dashboard' role='tab' aria-controls='dashboard' aria-selected='true'><span class="fa fa-tachometer-alt fa-lg"></span> <h6>Dashboard</h6></a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' id='profile-tab' data-toggle='tab' href='#profile' role='tab' aria-controls='profile' aria-selected='true'><span class="fa fa-user fa-lg"></span> <h6>Profile</h6></a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' id='services-tab' data-toggle='tab' href='#services' role='tab' aria-controls='services' aria-selected='false'><span class="fa fa-server fa-lg"></span> <h6>My Services</h6></a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' id='domain-tab' data-toggle='tab' href='#domain' role='tab' aria-controls='domain' aria-selected='false'><span class="fa fa-globe fa-lg"></span> <h6>My Domain</h6></a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' id='invoice-tab' data-toggle='tab' href='#invoice' role='tab' aria-controls='invoice' aria-selected='false'><span class="fa fa-receipt fa-lg"></span> <h6>Tagihan</h6></a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' id='editprofile-tab' data-toggle='tab' href='#editprofile' role='tab' aria-controls='editprofile' aria-selected='false'><span class="fa fa-user-edit fa-lg"></span> <h6>Edit Profile</h6></a>
        </li>
      </ul>
    </div>
    <!-- /.col-md-4 -->
    <div class='col-md-10'>
      <div class='tab-content' id='myTabContent'>
        <div class='tab-pane fade show active' id='dashboard' role='tabpanel' aria-labelledby='dashboard-tab'>
          <h2>Dashboard</h2>
          <hr>
          <div class='row'>
            <div class='col-md-4 col-sm-6 mb-3'>
              <div class='card'>
                <div class='card-body bg-dark text-white'>
                  <div class='card-title'>
                    <h3 class='float-left'>Services</h3>
                    <h3 class='float-right'><?php echo $servis['jumlah'] ?></h3>
                  </div>
                </div>
              </div>
            </div>
            <div class='col-md-4 col-sm-6 mb-3'>
              <div class='card'>
                <div class='card-body bg-warning'>
                  <div class='card-title'>
                    <h3 class='float-left'>Domain</h3>
                    <h3 class='float-right'><?php echo $domain->row_array()['jumlah'] ?></h3>
                  </div>
                </div>
              </div>
            </div>
            <div class='col-md-4 col-sm-6 mb-3'>
              <div class='card'>
                <div class='card-body bg-primary'>
                  <div class='card-title'>
                    <h3 class='float-left'>Tagihan</h3>
                    <h3 class='float-right'><?php echo $invoice['jumlah'] ?></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class='tab-pane fade' id='profile' role='tabpanel' aria-labelledby='profile-tab'>
          <h2>Profile Member</h2>
          <hr>
            <?php 
            if (trim($row['foto'])==''){ $foto_user = 'users.gif';  }else{ $foto_user = $row['foto'];  }
            echo "<p class='sidebar-title'><span class='glyphicon glyphicon-triangle-right'></span> Data Profile Anda</p>
                <p>Berikut Informasi Data Profile anda.<br> 
                  Pastikan data-data dibawah ini sudah benar, agar tidak terjadi kesalahan saat transaksi.</p>";                
                          echo "<table class='table table-light table-condensed table-responsive'>
                                <thead>
                                  <tr><td width='110px' rowspan='10'><img style='border:1px solid #cecece' width='85px' src='".base_url()."asset/foto_user/$foto_user' class='img-circle'><a style='margin-right:5px' href='#uploadfoto' data-toggle='modal' data-target='#uploadfoto'>Ganti Foto</a></td></tr>
                                  <tr><td width='120px'><b>Username</b></td> <td><b style='color:red'>$row[username]</b></td></tr>
                                  <tr><td><b>Nama Lengkap</b></td>           <td>$row[nama_lengkap]</td></tr>
                                  <tr><td><b>Email</b></td>                  <td>$row[email]</td></tr>
                                  <tr><td><b>Jenis Kelamin</b></td>          <td>$row[jenis_kelamin]</td></tr>
                                  <tr><td><b>Tanggal Lahir</b></td>          <td>".tgl_indo($row['tanggal_lahir'])."</td></tr>
                                  <tr><td><b>Tempat Lahir</b></td>           <td>$row[tempat_lahir]</td></tr>
                                  <tr><td><b>Alamat</b></td>                 <td>$row[alamat_lengkap]</td></tr>
                                  
                                  <tr><td><b>Kota</b></td>                   <td>".$row['kota']."</td></tr>
                                  <tr><td><b>No Hp</b></td>                  <td>$row[no_hp]</td></tr>
                                </thead>
                            </table>";
            ?>
        </div>
        <div class='tab-pane fade' id='services' role='tabpanel' aria-labelledby='services-tab'>
          <h2>Services</h2>
          <hr>
          <p class='sidebar-title'><span class='glyphicon glyphicon-triangle-right'></span> Paket Yang Anda Miliki</p>
          <div class='row'>
            <?php 
              foreach ($service as $servis){
                  echo "
                  <div class='col-md-4 col-sm-6 mb-3'>
                    <div class='card'>
                      <div class='card-body'>
                        <div class='card-title'><h5>".$servis['nama_produk']."</h5></div>
                      </div>
                      <div class='card-footer bg-white'>
                        <a href='https://www.malasngoding.com/card-bootstrap-4/' class='card-link'>Lihat</a>
                      </div>
                    </div>
                  </div>
                ";
              }
            ?>
          </div>
        </div>
        <div class='tab-pane fade' id='domain' role='tabpanel' aria-labelledby='domain-tab'>
          <h2>Domain Saya</h2>
          <hr>
          <p class='sidebar-title'><span class='glyphicon glyphicon-triangle-right'></span> Domain Yang Anda Miliki</p>
          <div class='row'>
            <?php 
              foreach ($domain->result_array() as $domen){
                  echo "
                  <div class='col-md-4 col-sm-6 mb-3'>
                    <div class='card'>
                      <div class='card-body'>
                        <div class='card-title'><h5>".$domen['nama_domain'].".".$domen['tld']."</h5></div>
                      </div>
                      <div class='card-footer bg-white'>
                        <a href='https://www.malasngoding.com/card-bootstrap-4/' class='card-link'>Lihat</a>
                      </div>
                    </div>
                  </div>
                ";
              }
            ?>
          </div>
        </div>
        <div class='tab-pane fade' id='invoice' role='tabpanel' aria-labelledby='invoice-tab'>
          <h2>Tagihan Anda</h2>
          <hr>
          <p class='sidebar-title'><span class='glyphicon glyphicon-triangle-right'></span> Daftar Tagihan yang Anda Miliki</p>
          <div class='row'>
            <table class="table table-bordered table-responsive table-striped table-condensed">
                    <thead>
                      <tr>
                        <th style='width:30px'>No</th>
                        <th>Nomor Tagihan</th>
                        <th>Tanggal Tagihan</th>
                        <th>Batas Tanggal Tagihan</th>
                        <th>Nama Paket</th>
                        <th>Nama Domain</th>
                        <th>Total (sudah ppn 10%)</th>
                        <th>Status</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
            <?php 
              $no = 1;
              foreach ($invoicee->result_array() as $tagihan){
                  if ($tagihan['status']=='0'){
                    $status = 'Belum Lunas';
                  }else{
                    $status = '<i>Lunas</i>';
                  }
                  echo "<tr><td>$no</td>
                  <td>$tagihan[no_tagihan]</td>
                  <td>$tagihan[tanggal]</td>
                  <td>$tagihan[tanggal]</td>
                  <td>$tagihan[nama_produk]</td>
                  <td>".$tagihan['nama_domain'].".".$tagihan['tld']."</td>
                  <td>Rp ".rupiah($tagihan['total']+$tagihan['ppn'])."</td>
                  <td>$status</td>
                  <td><center>
                    <a class='btn btn-primary btn-xs' title='Edit Data' href='".base_url()."members/invoice/$tagihan[no_tagihan]' target='_blank'><span class='fa fa-eye'></span></a>
                  </center></td>
              </tr>
                ";
                $no++;
              }
            ?>
            </tbody>
            </table>
          </div>
        </div>
        <div class='tab-pane fade' id='editprofile' role='tabpanel' aria-labelledby='editprofile-tab'>
          <h2>Edit Profile </h2>
          <hr>
          <?php 
          echo "<p>Berikut Informasi Data Profile anda.<br> 
                  Pastikan data-data dibawah ini sudah benar, agar tidak terjadi kesalahan saat transaksi.</p>";                
                          $attributes = array('id' => 'formku','class'=>'form-horizontal','role'=>'form');
                          echo form_open_multipart('members/edit_profile',$attributes); 
                          echo "<table class='table table-light table-condensed table-responsive'>
                                <thead>
                                  <tr><td width='140px'><b>Username</b></td> <td><input class='required form-control' style='width:50%; display:inline-block' name='aa' type='text' value='$row[username]'></td></tr>
                                  <tr><td><b>Password</b></td>       <td><input class='form-control' style='width:50%; display:inline-block' type='password' name='a'> <small style='color:red'><i>Kosongkan Saja JIka Tidak ubah.</i></small></td></tr>
                                  <tr><td><b>Nama Lengkap</b></td>   <td><input class='required form-control' type='text' name='b' value='$row[nama_lengkap]'></td></tr>
                                  <tr><td><b>Email</b></td>          <td><input class='required email form-control' type='email' name='c' value='$row[email]'></td></tr>
                                  <tr><td><b>Jenis Kelamin</b></td>  <td>"; if ($row['jenis_kelamin']=='Laki-laki'){ echo "<input type='radio' value='Laki-laki' name='d' checked> Laki-laki <input type='radio' value='Perempuan' name='d'> Perempuan "; }else{ echo "<input type='radio' value='Laki-laki' name='d'> Laki-laki <input type='radio' value='Perempuan' name='d' checked> Perempuan "; } echo "</td></tr>
                                  <tr><td><b>Tanggal Lahir</b></td>  <td><input class='required datepicker form-control' type='text' name='e' value='$row[tanggal_lahir]' data-date-format='yyyy-mm-dd'></td></tr>
                                  <tr><td><b>Tempat Lahir</b></td>   <td><input class='required form-control' type='text' name='f' value='$row[tempat_lahir]'></td></tr>
                                  <tr><td><b>Alamat</b></td>         <td><textarea class='required form-control' name='g'>$row[alamat_lengkap]</textarea></td></tr>
                                  <tr><td><b>Kota Sekarang</b></td>             <td><select class='form-control' name='j' id='city' required>
                                                                              <option value=''>- Pilih -</option>";
                                                                              foreach ($kota->result_array() as $rows){
                                                                                if ($row['kota_id']==$rows['kota_id']){
                                                                                  echo "<option value='$rows[kota_id]' selected>$rows[nama_kota]</option>";
                                                                                }else{
                                                                                  echo "<option value='$rows[kota_id]'>$rows[nama_kota]</option>";
                                                                                }
                                                                              }
                                                                          echo "</select>
                                  </td></tr>
                                  <tr><td><b>No Hp</b></td>                  <td><input style='width:40%' class='required number form-control' type='number' name='l' value='$row[no_hp]'></td></tr>
                                
                                  <tr><td></td><td><input class='float-right btn btn-sm btn-primary' type='submit' name='submit' value='Simpan Perubahan'></td></tr>
                                </thead>
                            </table>";
                          echo form_close();
          ?>
      </div>
    </div>
  </div>
<!-- /.col-md-8 -->
</div>
</div>
<!-- /.container -->