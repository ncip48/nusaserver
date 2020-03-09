<div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View Services</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_services'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Nama Services</th>
                        <th>Point</th>
                        <th>Foto</th>
                        <th>Deskripsi</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    if ($row['foto'] == ''){ $foto ='blank.jpg'; }else{ $foto = $row['foto']; }
                    echo "<tr><td>$no</td>
                              <td>$row[nama_services]</td>
                              <td>$row[point]</td>
                              <td><img style='border:1px solid #cecece' width='40px' src='".base_url()."asset/images/$foto'></td>
                              <td>$row[deskripsi]</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_services/".encrypt_url($row['id_services'])."'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/hapus_services/".encrypt_url($row['id_services'])."' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>