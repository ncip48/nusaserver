<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Dashboard</h2>
    <hr>
    <div class='row'>
            <div class='col-md-4 col-sm-6 mb-3'>
              <div class='card'>
                <div class='card-body bg-dark text-white'>
                  <div class='card-title'>
                    <h3 class='float-left text-white'>Services</h3>
                    <h3 class='float-right text-white'><?php echo $servis['jumlah'] ?></h3>
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
                <div class='card-body bg-primary text-white'>
                  <div class='card-title'>
                    <h3 class='float-left text-white'>Tagihan</h3>
                    <h3 class='float-right text-white'><?php echo $invoice['jumlah'] ?></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-justify col-md-12 col-sm-12 mb-3">
          <h6 class="text-dark">Tingkatkan omset Anda dengan bergabung menjadi reseller website kami.</h6>
          <p> <a href="">Keuntungan jika bergabung menjadi reseller kami</a></p>
          <p> <a href="<?= base_url() ?>members/applyreseller">Daftar Reseller Sekarang</a></p>
          </div>
</div>