<div class="bg-white">
<div class='container isi'>
    <div class='row'>
        <div class='col-md-12 mb-3 text-center'>
            <div class='row'>
                    <div class='col-md-3 col-sm-3 mb-3'>
    
                    </div>
                    <div class='col-md-6 col-sm-6 mb-3'>

                    <?php if ($this->session->id_konsumen == ''){
                        echo "<div class='card'>
                        <div class='card-body'>
                            <div class='card-title'><h5>Login Dahulu</h5></div>
                        </div>
                        </div>";
                    }else{
                        /* echo "
                        <div class='card'>
                        <div class='card-body'>
                            <div class='card-title'><h5>".$servis['nama_produk']."</h5></div>
                        </div>
                        <div class='card-footer bg-white'>
                            <a href='https://www.malasngoding.com/card-bootstrap-4/' class='card-link'>Lihat</a>
                        </div>
                        </div>"; */
                        echo"
                        <div class='card'>
                        <div class='card-body'>
                            <div class='card-title'><h5>Pilih Paket</h5></div>
                            <hr>
                            <select id='paket' name='paket' style='width:100%;max-width:100%;' class='form-control my-2'>
                            <option value='none'  selected class='form-control'> --- Pilih Paket --- </option>";
                                             foreach($produk->result_array() as $paket){
                                                echo "<option style='width=390px;' value='".$paket['id_produk'].";".$paket['nama_produk']."'>".$paket['nama_produk']."</option>"; 
                                            }
                            echo " </select> 
                            <div id='datapaket'></div>  
                            <select class='form-control my-2' id='durasi' name='durasi' style='width:100%;max-width:100%;'>   
                                            <option value='none' selected > --- Pilih Durasi --- </option>
                                            <option value='1'> 1 Bulan </option>
                                            <option value='6'> 6 Bulan </option>
                                            <option value='12'> 12 Bulan </option>
                            </select>
                            <hr>
                            <div class='card-title'><h5>Pilih Domain</h5></div>
                            <hr>
                                <div class='col-lg-12 py-5 px-5'>
                                <form>
                                <div class='row'>
                                    <div class='col-md-9 px-1'>
                                    <div class='form-group'>
                                        <input class='form-control' id='subdomain2' name='subdomain' type='text' placeholder='Nama Toko Anda' required='required' data-validation-required-message='Please enter your name.'>
                                        <p class='help-block text-danger'></p>
                                    </div>
                                    </div>
                                    <div class='col-md-3 px-1'>
                                    <div class='form-group'>
                                        <select class='form-control' name='domain2' id='domain2'>
                                        <option value=''>Pilih Domain</option>
                                        <option value='com'>.com</option>
                                        <option value='net'>.net</option>
                                        <option value='biz'>.biz</option>
                                        <option value='online'>.online</option>
                                        </select>
                                        <p class='help-block text-danger'></p>
                                    </div>
                                    </div>
                                    <div class='clearfix'></div>
                                    <div class='col-lg-12 text-left text-light'>
                                    <div class='text-dark text-center' id='domainsukses2'></div>
                                    </div>
                                </div>
                                </form>
                            </div>
                            
                        </div>
                        <div class='card-footer bg-white'>
                            
                        </div>
                        </div>
                        <div class='card'>
                        <div class='card-body'>
                            <form>
                            <input id='namadomain' type='text' value='' \>
                            <input id='tld' type='text' value='' \>
                            <input id='harga' type='text' value='' \>
                            <input id='idproduk' type='text' value='' \>
                            <input id='namapaket' type='text' value='' \>
                            <input id='harga' type='text' value='' \>
                            <input id='durasi' type='text' value='' \>
                            </form>
                        </div>
                        </div>";
                    }
                    ?>
                    </div>
                    <div class='col-md-3 col-sm-3 mb-3'>
                        
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
$(document).ready(function() {
    $('#durasi').change(function() {
        var durasi = $(this).val();
        console.log(durasi);
    });

    $('#1bulan').click(function(){
        //var durasi = $(this).val();
        console.log('clicked');
    });


$('#paket').change(function() {
        var asd = $(this).val();
        var data = asd.split(";");

        console.log(asd);

        //console.log(ongkir[0]);
        //console.log(ongkir[1]);
        //console.log(ongkir[2]);
        //console.log(totbayar);
        //console.log(name);
        //console.log(ser);

        
        /*if (ongkir[0] == 'none'){
            $("#ongkir2").html("0");
            $("#totalbayar").html("0");
    
            $("#namakurir").html("-");
            $("#services").html("-");

            $("#ongkiir").val("0");
            $("#servicees").val("0");
            $("#kurirr").val("0");
            
        }else{
            
            $("#ongkir2").html(toDuit(parseFloat(ongkir)));
            $("#totalbayar").html(toDuit(bayar));
    
            $("#namakurir").html(ongkir[1]);
            $("#services").html(ongkir[2]);

            $("#ongkiir").val(parseFloat(ongkir));
            $("#servicees").val(ongkir[3]);
            $("#kurirr").val(ongkir[1]);
        } */
        

        $.ajax({
            type: 'POST',
            url: 'mulai/validasi',
            data: {
                produk_id: data[0]
            },
            success: function(response) {
                //var result = response["result"];
                //console.log(response);
                $('#datapaket').html(response);
            }
        }); 
        //return false;
    });
});
</script>