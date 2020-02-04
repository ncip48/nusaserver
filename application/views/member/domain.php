<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">My Domain</h2>
    <hr>
    <p class='sidebar-title'><span class='glyphicon glyphicon-triangle-right'></span> Domain Yang Anda Miliki</p>
          <div class='row'>
            <?php 
              foreach ($domain->result_array() as $domen){
                if ($servis['aktif']==0){
                  $tulis = "Belum Aktif";
                }else{
                  $tulis = "Aktif";
                }
                  echo "
                  <div class='col-md-4 col-sm-6 mb-3'>
                    <div class='card'>
                      <div class='card-body'>
                        <div class='card-title'><h5>".$domen['nama_domain'].".".$domen['tld']."</h5></div>
                        <h5 class='float-right'>".$servis['durasi_domain']." Hari</h5>
                      </div>
                      <div class='card-footer bg-white'>
                      <a href='http://".$domen['nama_domain'].".".$domen['tld']."' class='card-link'>Lihat</a>
                      <h6 class='float-right'>".$tulis."</h6>
                      </div>
                    </div>
                  </div>
                ";
              }
            ?>
          </div>
</div>