

<?php 
#if($_GET['rel']!='tab'){
	#include 'template.php';
	#echo "<div id='content'>";
#}
?>
<div class='book_area'>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <input type='hidden' id='jmlplus' value='7'>
                <input type='hidden' id='jmlmin' value='7'>
                <input type='hidden' id='tglnow' value='<?php echo date('d-m-Y') ?>'>
                <?php
                if($step=='1'){
                    echo "<h4>Services<hr><div class='accordion md-accordion' id='accordionEx' role='tablist' aria-multiselectable='true'>";
                    foreach ($services as $services){
                        if ($services['foto'] == ''){ $foto ='blank.jpg'; }else{ $foto = $services['foto']; }
                        echo "<div class='card'>
                            <div class='card-header' role='tab' id='heading".$services['id_services']."'>
                            <a data-toggle='collapse' data-parent='#accordionEx' href='#services".$services['id_services']."' aria-expanded='false'
                                aria-controls='collapseOne1'>
                                <h5 class='mb-0'>
                                ".$services['nama_services']."
                                </h5>
                            </a>
                            </div>
                            <div id='services".$services['id_services']."' class='collapse' role='tabpanel' aria-labelledby='heading".$services['id_services']."' data-parent='#accordionEx'>
                            <div class='card-body'>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <img class='img-fluid' style='width='200px' src='".base_url()."asset/images/$foto'>
                                    </div>
                                    <div class='col-md-8'>
                                        <div class='row'>
                                            <div class='col-md-12'>
                                                ".$services['deskripsi']."
                                            </div>
                                            <div class='col-md-12'>
                                                <a rel='tab' class='btn btn-primary float-right' href='".base_url()."booking/services/".$services['id_services']."'>Pilih</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                        </div>";
                    }
                    echo "</div>";
                }elseif($step=='2'){
                    echo "<h4><a rel='tab' href='".base_url().$this->uri->segment(1)."'>< Back </a>| Beautican<hr>";
                    foreach ($staff as $staff){
                        if ($staff['foto'] == ''){ $foto ='blank.jpg'; }else{ $foto = $staff['foto']; }
                        echo "<div class='card'>
                            <div class='card-header bg-white'>
                                <h5 class='mb-0'>
                                ".$staff['nama_karyawan']."
                                <a rel='tab' class='btn btn-sm btn-primary float-right' href='".current_url()."/staff/".$staff['id_karyawan']."'>Pilih</a>
                                </h5>
                            </a>
                            </div>
                            
                            <div class='card-body'>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <img class='img-fluid' style='width='200px' src='".base_url()."asset/images/$foto'>
                                    </div>
                                    <div class='col-md-8'>
                                        <div class='row'>
                                            <div class='col-md-12'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                        </div>";
                    }
                }elseif($step=='3'){
                    echo "<h4><a rel='tab' href='".base_url().$this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3)."'>< Back </a>| Book Date<hr></h4>
                    <input type='hidden' id='cururl' value='".current_url()."'>
                    <div class='bungkus'>
                        <div id='sebelum'>";$this->model_tgl->getTabelTgl(date('d-m-Y'));echo "</div>
                        <div id='hasil'></div>
                    </div>
                    <br>
                    <p><button class='btn btn-full btn-sm active'> 08:00 </button> : Tidak Tersedia  <button class='btn btn-outline-primary btn-sm'> 08:00 </button> : Tersedia</p>";
                }elseif($step=='4'){
                    echo "<h4><a rel='tab' href='".base_url().$this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5)."'>< Back </a>| REVIEW ORDER<hr></h4>";
                    echo "<div class='row'>";
                    echo "<div class='col-md-6 col-xs-12 py-2'>";
                    echo "<p>";
                    echo "Pelayanan : ". $services['nama_services']."</br>";
                    echo "Beautican : ". $staff['nama_karyawan']."</br>";
                    echo "Tanggal ". $this->uri->segment(7) . " Jam " . $this->uri->segment(8)."</br>";
                    echo "TOTAL : ". rupiah($services['harga'])."</br>";
                    echo "<i>(".terbilang($services['harga'])."Rupiah )</i></br>";
                    echo "</p>";
                    echo "<button class='genric-btn primary circle'>Lanjutkan Pembayaran</button>";
                    echo "</div>";
                    echo "<div class='col-md-6 col-xs-12 py-2'>";
                    echo "<p>";

                    echo "</p>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
                
                
            </div>
        </div>
    </div>
</div>
<?php 
#if($_GET['rel']!='tab'){
	#echo "</div>";
	#include 'footer.php';
#}
?>

