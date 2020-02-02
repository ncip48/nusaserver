<div class='container isi'>
    <div class="row">
        <div class="col-lg-12 text-justify my-4">
<?php
          $tanggal = tgl_indo($record['tanggal']);
          echo "<h5> $record[judul]</h5>
                <p style='color:blue'>$record[sub_judul]</p>
                <small class='date'><span class='glyphicon glyphicon-time'></span> $record[hari], $tanggal, $record[jam] WIB, $record[dibaca] View</small>
                <small class='date'><span class='glyphicon glyphicon-user'></span> $record[nama_lengkap], Kategori : <a href='".base_url()."artikel/kategori/$record[kategori_seo]'>$record[nama_kategori]</a></small><hr>
            <div class='col-md-12'>";
                if ($record['gambar'] != ''){
                    echo "<img width='100%' src='".base_url()."asset/foto_berita/".$record['gambar']."'><br>
                          <small class='btn btn-default btn-xs btn-block' style='color:red;'>$record[keterangan_gambar]</small>";
                }
                echo "<p>$record[isi_berita]</p>
            </div><div style='clear:both'><br></div>

            </div><div class='row'><div class='col-lg-12 text-left my-4'><span class='glyphicon glyphicon-list'></span> &nbsp; Informasi Utama</p><hr>";
                $no = 1;
                foreach ($infoterbaru->result_array() as $row){
                    $isi_berita = strip_tags($row['isi_berita']); 
                    $isi = substr($isi_berita,0,150); 
                    $isi = substr($isi_berita,0,strrpos($isi," "));
                    $tanggal = tgl_indo($row['tanggal']);
                    if ($row['gambar'] == ''){ $foto = 'small_no-image.jpg'; }else{ $foto = $row['gambar']; }
                    echo "<div class='col-md-3'>
                            <small class='date pull-right'><span class='glyphicon glyphicon-time'></span> $row[hari], $tanggal</small><br>
                            <div style='height:130px; overflow:hidden'>
                                <img style='width:100%' src='".base_url()."asset/foto_berita/".$foto."'>
                            </div>
                            <a href='".base_url()."berita/detail/$row[judul_seo]'>".$row['judul']."</a>
                        </div>";
                        if ($no % 3 == 0){
                            echo "<div style='clear:both'><hr></div>";
                        }
                    $no++;
                }
            ?>
        </div></div>
    </div>
</div>