<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">My Services</h2>
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