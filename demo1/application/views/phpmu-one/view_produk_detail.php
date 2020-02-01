<div class="container isi">
    <div class="row">
            <?php 
              if (trim($row['gambar'])==''){ $foto_produk = 'no-image.png'; }else{ $foto_produk = $row['gambar']; }
              echo "<div class='col-md-6 col-xs-12'>
                          <h2>$row[nama_produk]</h2>";
                          $harga = explode(';', $row[harga_konsumen]);
                          if ($row[id_produk] == '17'){
                            if ($kons[ph]=='0'){
                              $hargafix = $harga[1];
                              echo "Harga Pertama Pembelian : <span style='color:green; font-size:20px'><del>Rp ".rupiah($harga[0])."</del> Rp ".rupiah($harga[1])."</span><br>";
                            }else{
                              $hargafix = $harga[0];
                              echo "Harga : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[0])."</span><br>";
                            }
                            echo "Harga 1 Bulan : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[0])."</span><br>
                            Harga 6 Bulan : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[2])."</span> ( Hemat ".rupiah((6*$harga[0])-$harga[2])." )<br>
                            Harga 12 Bulan : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[3])."</span> ( Hemat ".rupiah((12*$harga[0])-$harga[3])." )<br>";
                          }elseif($row[id_produk] == '18'){
                            if ($kons[pt]=='0'){
                              echo "Harga Pertama Pembelian : <span style='color:green; font-size:20px'><del>Rp ".rupiah($harga[0])."</del> Rp ".rupiah($harga[1])."</span><br>";
                            }else{
                              echo "Harga : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[0])."</span><br>";
                            }
                            echo "Harga 1 Bulan : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[0])."</span><br>
                            Harga 6 Bulan : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[2])."</span> ( Hemat ".rupiah((6*$harga[0])-$harga[2])." )<br>
                            Harga 12 Bulan : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[3])."</span> ( Hemat ".rupiah((12*$harga[0])-$harga[3])." )<br>";
                          }elseif($row[id_produk] == '19'){
                            if ($kons[pb]=='0'){
                              echo "Harga Pertama Pembelian : <span style='color:green; font-size:20px'><del>Rp ".rupiah($harga[0])."</del> Rp ".rupiah($harga[1])."</span><br>";
                            }else{
                              echo "Harga : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[0])."</span><br>";
                            }
                            echo "Harga 1 Bulan : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[0])."</span><br>
                            Harga 6 Bulan : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[2])."</span> ( Hemat ".rupiah((6*$harga[0])-$harga[2])." )<br>
                            Harga 12 Bulan : <span style='color:green; font-size:20px'>Rp ".rupiah($harga[3])."</span> ( Hemat ".rupiah((12*$harga[0])-$harga[3])." )<br>";
                          }
                          
                          echo "
                          
                          
                          <div class='row justify-content-md-center'>
                            <div class='col-lg-12 py-5 px-4'>
                            <form action='".base_url()."produk/keranjang' method='POST'>
                            <input type='hidden' name='id_produk' value='$row[id_produk]'>
                                <div class='row'>
                                  <div class='col-md-8 px-1'>
                                    <div class='form-group'>
                                      <select name='jumlah' class='form-control' diplay:inline-block'>
                                        <option value='' selected>--- Pilih Lama Pembelian ---</option>
                                        <option value='1;".$hargafix."'>1 Bulan</option>
                                        <option value='6;".$hargafix."'>6 Bulan</option>
                                        <option value='12;".$hargafix."'>12 Bulan</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class='col-md-4 px-1'>
                                    <div class='form-group'>
                                      <input class='btn btn-primary' type='submit' value='Beli Sekarang'>
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                          </div>
                          <div class='col-md-6 col-xs-12'>
                          <h6>FITUR : </h6>
                          <ul class='fa-ul'>
                          $row[keterangan]<br>
                          </ul>
                          <div class='addthis_toolbox addthis_default_style'>
                              <a class='addthis_button_preferred_1'></a>
                              <a class='addthis_button_preferred_2'></a>
                              <a class='addthis_button_preferred_3'></a>
                              <a class='addthis_button_preferred_4'></a>
                              <a class='addthis_button_compact'></a>
                              <a class='addthis_counter addthis_bubble_style'></a>
                          </div>
                    </div>
                    <div style='clear:both'><br></div>";
?>
<div class="yotpo yotpo-main-widget"
data-product-id="SKU/Product_ID"
data-price="Product Price"
data-currency="Price Currency"
data-name="Product Title"
data-url="The url to the page where the product is (url escaped)"
data-image-url="The product image url. Url escaped"
data-description="Product description">
</div>

</div>
</div>
</div>
