<div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View Supervisor</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_supervisor'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Nama Supervisor</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Foto</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    if ($row['foto'] == ''){ $foto ='blank.jpg'; }else{ $foto = $row['foto']; }
                    echo "<tr><td>$no</td>
                              <td>$row[nama]</td>
                              <td>$row[username]</td>
                              <td>$row[password]</td>
                              <td>$row[email]</td>
                              <td>$row[no_hp]</td>
                              <td><img style='border:1px solid #cecece' width='40px' src='".base_url()."asset/images/$foto'></td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_supervisor/".encrypt_url($row['id_supervisor'])."'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/hapus_supervisor/".encrypt_url($row['id_supervisor'])."' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>