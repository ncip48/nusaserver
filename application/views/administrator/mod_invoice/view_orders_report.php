      <div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Detail Data Orders Masuk</h3>
                  <a target='_BLANK' class='pull-right btn btn-warning btn-sm' href='<?php echo base_url(); ?>administrator/print_orders'>Print Report</a>
                </div>
                <div class='box-body'>
                          <div class='col-md-12 table-responsive'>
                            <table id="example1" class='table table-hover table-condensed'>
                              <thead>
                                <tr>
                                  <th width="20px">No</th>
                                  <th>No Tagihan</th>
                                  <th>Nama Pelanggan</th>
                                  <th>Service</th>
                                  <th>Domain</th>
                                  <th>Harga Total</th>
                                  <th>Waktu Transaksi</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $no = 1;
                                  foreach ($record->result_array() as $row){
                                  if ($row['status']=='0'){ $proses = '<i class="text-danger">Belum Aktif</i>'; $color = 'danger'; $text = 'Belum Aktif'; }elseif($row['status']=='1'){ $proses = '<i class="text-warning">Sudah Aktif</i>'; $color = 'warning'; $text = 'Sudah Aktif'; }
                                  $total = $this->db->query("SELECT a.kode_transaksi, a.kurir, a.service, a.proses, a.ongkir, e.nama_kota, f.nama_provinsi, sum((b.harga_jual*b.jumlah)-(c.diskon*b.jumlah)) as total FROM `rb_penjualan` a JOIN rb_penjualan_detail b ON a.id_penjualan=b.id_penjualan JOIN rb_produk c ON b.id_produk=c.id_produk JOIN rb_konsumen d ON a.id_pembeli=d.id_konsumen JOIN rb_kota e ON d.kota_id=e.kota_id JOIN rb_provinsi f ON e.provinsi_id=f.provinsi_id where a.kode_transaksi='$row[kode_transaksi]'")->row_array();
                                  
                                  echo "<tr><td>$no</td>
                                            <td>$row[no_tagihan]</td>
                                            <td>$row[nama_lengkap]</td>
                                            <td>".$row[nama_produk]." (".$row[durasi]." Hari)</td>
                                            <td>".$row[nama_domain].".".$row[tld]." (".$row[durasi_domain]." Hari)</td>
                                            <td style='color:red;'>Rp ".rupiah($row['harga_domain']+$row[harga]+$row[ppn])."</td>
                                            <td>".tgl_jam($row[tanggal])."</td>
                                            <td width='150px'>
                                              <div class='btn-group'> 
                                                <button style='width:70px' type='button' class='btn btn-$color btn-xs'>$text</button> 
                                                <button type='button' class='btn btn-$color btn-xs dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <span class='caret'></span> <span class='sr-only'>Toggle Dropdown</span> </button> 
                                                  <ul class='dropdown-menu' style='border:1px solid #cecece;'> 
                                                    <li><a href='".base_url()."administrator/orders_status/$row[id_penjualan]/0' onclick=\"return confirm('Apa anda yakin untuk ubah status jadi NonAktif ?')\"> NonAktifkan</a></li> 
                                                    <li><a href='".base_url()."administrator/orders_status/$row[id_penjualan]/1' onclick=\"return confirm('Apa anda yakin untuk ubah status jadi Aktif ?')\"> Aktifkan</a></li> 
                                                    
                                                  </ul> 
                                              </div>
                                        </tr>";
                                    $no++;
                                  }
                                ?>
                              </tbody>
                            </table>
                          </div>
                </div>
            </div>
        </div>