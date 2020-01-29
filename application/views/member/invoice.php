<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Tagihan Saya</h2>
    <hr>
    <p class='sidebar-title'><span class='fa fa-arrow-right'></span> Daftar Tagihan yang Anda Miliki</p>
          <div class='row'>
            <table class="table table-bordered table-responsive table-striped w-100 d-block d-md-table">
                    <thead class='text-center'>
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
                  echo "<tr class='text-center'><td>$no</td>
                  <td >$tagihan[no_tagihan]</td>
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