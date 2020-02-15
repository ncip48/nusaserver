<div class='container isi'>
    <div class="row">
        <div class="col-lg-12 text-center my-4">
          <h4 class="section-heading text-uppercase">&nbsp; <?php echo $judul; ?></h2>
          <p class="section-subheading text-muted">Semua Artikel Kami</p>
        </div>
    </div>
    <div class='row'>
<?php
                $no = 1;
                foreach ($berita->result_array() as $row){
                    $isi_berita = strip_tags($row['isi_berita']); 
                    $isi = substr($isi_berita,0,500); 
                    $isi = substr($isi_berita,0,strrpos($isi," "));
                    $tanggal = tgl_indo($row['tanggal']);
                    if ($row['gambar'] == ''){ $foto = 'small_no-image.jpg'; }else{ $foto = $row['gambar']; }
                    echo "<div class='col-md-4 my-2'>
                    <div style='height:230px; overflow:hidden'>
                    <img style='width:100%' src='".base_url()."asset/foto_berita/".$foto."'>
                </div>
                        </div>
                        <div class='col-md-8 text-justify'>
                            <small class='date pull-right'><span class='glyphicon glyphicon-time'></span> $row[hari], $tanggal</small><br>
                            
                            <h6><a href='".base_url()."artikel/detail/$row[judul_seo]'>".$row['judul']."</a></h6>
                            <p class='my-2'>".$isi." . . .</p>
                        </div>";
                        if ($no % 3 == 0){
                            echo "<div style='clear:both'><hr></div>";
                        }
                    $no++;
                }
    echo "<div style='clear:both'></div>
  </div>
  <div class='row my-3'>
        <div class='col'>";
            echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>