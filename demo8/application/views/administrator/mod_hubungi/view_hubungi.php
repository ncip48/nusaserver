<div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Pesan Masuk</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_manajemenuser'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped ">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Tanggal</th>
                        <th>Pesan</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                    echo "<tr><td>$no</td>
                              <td>$row[nama]</td>
                              <td>$row[email]</td>
                              <td>$row[nohp]</td>
                              <td>$row[tanggal]</td>
                              <td>$row[pesan]</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='View Data' href='".base_url()."administrator/view_hubungi_details/$row[id_hubungi]'><span class='glyphicon glyphicon-eye-open'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>