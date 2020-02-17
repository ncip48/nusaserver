<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Reseller</h2> 
    <hr>
    <p class='sidebar-title'><span class='glyphicon glyphicon-triangle-right'></span> Berikut detail reseller anda</p>
          <div class='row'>
                  <div class='col-md-4 col-sm-6 mb-3'>
                  <?php
                    if ($reseller[aktif]==0){
                        echo "<p class='text-white bg-danger'>Maaf reseller anda belum aktif</p>";
                        $bg = 'bg-danger';
                    }
                  ?>
                    <div class='card <?= $bg ?>'>
                      <div class='card-body'>
                        <div class='card-title'>
                        <h5>Kode Refferal Anda</h5>
                        <h3 class='float-left'><?= $reseller[kode_refferal] ?></h3>
                        </div>
                      </div>
                    </div><p>
                        <h6 class='float-left'><a href='<?= base_url() ?>daftar/<?= encrypt_url($reseller[kode_refferal]) ?>'><?= base_url() ?>daftar/<?= encrypt_url($reseller[kode_refferal]) ?></a></h6>
                  </div>
          </div>
</div>