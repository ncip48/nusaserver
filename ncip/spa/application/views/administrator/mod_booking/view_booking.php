            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">View Booking</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_manajemenuser'>Tambahkan Data</a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Karyawan</th>
                        <th>Jam Booking</th>
                        <th>Pelayanan</th>
                        <th>Status</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                      if ($row['status']=='0'){
                        $status = 'Pending';
                      }elseif ($row['status']=='1'){
                        $status = 'Paid';
                      }elseif ($row['status']=='2'){
                        $status = 'Cancelled';
                      }
                    echo "<tr><td>$no</td>
                              <td>$row[nama_user]</td>
                              <td>$row[nama_karyawan]</td>
                              <td>".date('d-m-Y H:i', strtotime($row['jam_booking']))."</td>
                              <td>$row[nama_services]</td>
                              <td>$status</td>
                              <td><center>";
                                if ($row['status']=='1') {
                                }else{
                                  echo "<a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_booking/".encrypt_url($row['id_booking'])."'><span class='glyphicon glyphicon-edit'></span></a>";
                                }
                              echo "</center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>