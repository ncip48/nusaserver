<div class="bg-white">
<div class='container isi'>
    <div class='row'>
        <div class='col-md-12 mb-3 text-center'>
            <div class='row'>
                    
                    <div class='col-md-8 col-sm-8 mb-3'>

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
                        <div class='card-header bg-white'>
                            <h5 class='mb-0'>Pilih Paket</h5>
                        </div>
                        <div class='card-body'>";
                            /*<div class='card-title'><h5>Pilih Paket</h5></div>
                            <hr>*/
                            echo"<select id='paket' name='paket' style='width:100%;max-width:100%;' class='form-control my-2'>
                            <option value='none'  selected class='form-control'> --- Pilih Paket --- </option>";
                                             foreach($produk->result_array() as $paket){
                                                echo "<option style='width=390px;' value='".$paket['id_produk'].";".$paket['nama_produk']."'>".$paket['nama_produk']."</option>"; 
                                            }
                            echo " </select> 
                            <div id='datapaket'></div>
                                <div class='hargapaket'>
                                    <div class='container'>
                                        <div class='row'>
                                            <div class='col-sm mx-2 px-0 mt-1'>
                                                <label class='hargakhusus'>
                                                <input type='radio' name='product' class='card-input-element' value='30' />
                                                <div class='card card-default card-input card'>
                                                    <div class='card'>
                                                    <div class='card-body'>
                                                        <h5>1 Bulan</h5>
                                                        <hr>
                                                        <div class='harga1'>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                </label>
                                            </div>

                                            <div class='col-sm mx-2 px-0 mt-1'>
                                                <label class='hargakhusus'>
                                                <input type='radio' name='product' class='card-input-element' value='183' />
                                                <div class='card card-default card-input card'>
                                                    <div class='card'>
                                                    <div class='card-body'>
                                                        <h5>6 Bulan</h5>
                                                        <hr>
                                                        <div class='harga6'>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                </label>
                                            </div>

                                            <div class='col-sm mx-2 px-0 mt-1'>
                                                <label class='hargakhusus'>
                                                <input type='radio' name='product' class='card-input-element' value='365' />
                                                <div class='card card-default card-input card'>
                                                    <div class='card'>
                                                    <div class='card-body'>
                                                        <h5>12 Bulan</h5>
                                                        <hr>
                                                        <div class='harga12'>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class='card-title'>
                                        <h5>Pilih Template</h5>
                                    </div>
                                    <hr>

                                    <div class='container'>
                                        <div class='row'>
                                            <div class='col-sm mx-2 px-0 mt-1'>
                                                <label class='hargakhusus'>
                                                <input type='radio' name='tipe' class='card-input-element' value='1' />
                                                <div class='card card-default card-input card'>
                                                    <div class='card'>
                                                    <div class='card-body'>
                                                        <h5>Template 1</h5>
                                                    </div>
                                                    </div>
                                                </div>
                                                </label>
                                            </div>

                                            <div class='col-sm mx-2 px-0 mt-1'>
                                                <label class='hargakhusus'>
                                                <input type='radio' name='tipe' class='card-input-element' value='2' />
                                                <div class='card card-default card-input card'>
                                                    <div class='card'>
                                                    <div class='card-body'>
                                                        <h5>Template 2</h5>
                                                    </div>
                                                    </div>
                                                </div>
                                                </label>
                                            </div>

                                            <div class='col-sm mx-2 px-0 mt-1'>
                                                <label class='hargakhusus'>
                                                <input type='radio' name='tipe' class='card-input-element' value='3' />
                                                <div class='card card-default card-input card'>
                                                    <div class='card'>
                                                    <div class='card-body'>
                                                        <h5>Template 1</h5>
                                                    </div>
                                                    </div>
                                                </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='card mt-2'>
                            <div class='card-header bg-white'>
                                <h5 class='mb-0'>Pilih Domain</h5>
                            </div>
                            <div class='card-body'>
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
                                            <option value='none'>Pilih Domain</option>
                                            <option value='com'>.com</option>
                                            <option value='net'>.net</option>
                                            <option value='biz'>.biz</option>
                                            <option value='online'>.online</option>
                                            </select>
                                            <p class='help-block text-danger'></p>
                                        </div>
                                    </div>
                                    <div class='container'>
                                        <div class='row justify-content-center'>
                                            <div id='loaderdomain'></div>
                                        </div>
                                    </div>
                                    <div class='clearfix'></div>
                                        <div class='col-md-9 px-1 text-left text-light'>
                                            <div class='text-dark text-center' id='resultdomain'>
                                                <label class='hargakhusus'>
                                                        <div class='card card-default card-input card'>
                                                            <div class='card' style='cursor: default;'>
                                                                <div class='card-body'>
                                                                <div class='text-dark text-center' id='domainsukses2'></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class='col-md-3 px-1 text-left text-light'>
                                            <div class='text-dark text-center' id='tomboldomain'>
                                                <label class='hargakhusus'>
                                                <input type='checkbox' name='buttondomain' class='card-input-element' value='1' />
                                                    <div class='card card-default card-input card'>
                                                        <div class='card'>
                                                            <div class='card-body'>
                                                                <h5>Pilih Domain ini</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>       
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>";
                    }
                    ?>
                    </div>
                    <div class='col-md-4 col-sm-4 mb-3'>
                        <div class='card'>
                            <div class='card-header bg-white'>
                                <h5 class='mb-0'>Ringkasan Order</h5>
                            </div>
                            <div class='card-body'>
                                <!-- <div class='card-title'><h5>Ringkasan Order</h5></div>
                                <hr> -->
                                <div class='container'>
                                    <div class='row'>
                                        <div class='col-sm mx-2 px-0 mt-1'>
                                            <div id='belanjapaket'></div><br>
                                            <div id='belanjadomain'></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='card my-2'>
                            <div class='card-header bg-white'>
                                <h5 class='mb-0'>Pembayaran</h5>
                            </div>
                            <div class='card-body'>
                                <!--<div class='card-title'><h5>Pembayaran</h5></div>
                                <hr> -->
                                <div class="paymentWrap">
                                    <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                                        <div class='container'>
                                            <div class='row'>
                                                <div class='col-sm mx-2 px-0 mt-1'>
                                                    <label class="btn paymentMethod">
                                                        <div class="method bri"></div>
                                                        <input type="radio" name="payment" value='bri'> 
                                                    </label>
                                                </div>
                                                <div class='col-sm mx-2 px-0 mt-1'>
                                                    <label class="btn paymentMethod">
                                                        <div class="method mandiri"></div>
                                                        <input type="radio" name="payment" value='mandiri'> 
                                                    </label>
                                                </div>
                                                <div class='col-sm mx-2 px-0 mt-1'>
                                                    <label class="btn paymentMethod">
                                                        <div class="method bca"></div>
                                                        <input type="radio" name="payment" value='bca'> 
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>        
                                </div>
                                <div class='container'>
                                    <div class='row'>
                                        <div id='bankdetails' class='text-left'></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='card my-2'>
                            <div class='card-body'>
                                <form>
                                <input id='id_konsumen' type='hidden' value='".$this->session->id_konsumen."' \>
                                <input id='id_produk' type='hidden' value='' \>
                                <input id='tipe' type='hidden' value='' \>
                                <input id='tgldaftar' type='hidden' value='<?php echo date('Y-m-d H:i:s')?>' \>
                                <input id='durasi' type='hidden' value='' \>
                                <input id='harga_final' type='hidden' value='' \>
                                
                                <input id='ringkasan' type='hidden' value='' \>
                                <input id='namadomain' type='hidden' value='' \>
                                <input id='tld' type='hidden' value='' \>
                                <input id='durasidomain' type='hidden' value='' \>
                                <input id='hargadomain' type='hidden' value='' \>
                                <input type="button" class="btn btn-primary btn-sm btn-block" value='BAYAR' \>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
$(document).ready(function() {

    $('.hargapaket').hide();
    $('#tomboldomain').hide();
    $('#resultdomain').hide();

    $('#paket').change(function() {
        var asd = $(this).val();
        var data = asd.split(";");

        //console.log(asd);

        //console.log(ongkir[0]);
        //console.log(ongkir[1]);
        //console.log(ongkir[2]);
        //console.log(totbayar);
        //console.log(name);
        //console.log(ser);

        
        if (asd == 'none'){
            $('.hargapaket').hide();
            $('.harga1').empty();
            $('.harga6').empty();
            $('.harga12').empty();
        }else{
            $.ajax({
            type: 'POST',
            url: 'mulai/validasi',
            data: {
                produk_id: data[0]
            },
            success: function(response) {
                $('.harga1').empty();
                $('.harga6').empty();
                $('.harga12').empty();
                var hargasplit = response.split(';');
                var harga_1_bulan = hargasplit[0];
                var harga_6_bulan = hargasplit[1];
                var sm_harga_6_bulan = hargasplit[2];
                var harga_12_bulan = hargasplit[3];
                var sm_harga_12_bulan = hargasplit[4];
                $('.harga1').append(harga_1_bulan);
                $('.harga6').append("Rp "+harga_6_bulan+"<br><small>Rp "+sm_harga_6_bulan+"/bulan</small>");
                $('.harga12').append("Rp "+harga_12_bulan+"<br><small>Rp "+sm_harga_12_bulan+"/bulan</small>");
                $('.hargapaket').fadeIn();
                $('#id_produk').val(data[0]);
            }
        }); 
        } 
        return false;
    });

    $("input[name='product']").change(function(){
        var durasi = $(this).val();
        var produk_id = $('#id_produk').val();
        //var tipee = $('#tipe').val();
        //console.log(durasi);
        $('#durasi').val(durasi);
        $.ajax({
            type: 'POST',
            url: 'mulai/validasi',
            data: {
                produk_id: produk_id
            },
            success: function(response) {
                //console.log(response);
                var pr = response.split(';');
                //console.log(tipee);
                if (durasi=='30'){
                    //console.log(pr[5]);
                    $('#harga_final').val(pr[5]);
                    $('#belanjapaket').html("<div class='float-left'><b>"+pr[8]+"</b> </div><div class='float-right'>"+pr[5]+"</div>");
                }else if (durasi=='183'){
                    //console.log(pr[8]);
                    $('#harga_final').val(pr[6]);
                    $('#belanjapaket').html("<div class='float-left'><b>"+pr[8]+"</b></div><div class='float-right'>"+pr[6]+"</div>");
                }else if (durasi=='365'){
                    //console.log(pr[7]);
                    $('#harga_final').val(pr[7]);
                    //$('#belanjapaket').html("<div class='float-left'><b>"+pr[8]+"</b> <br><small> Hari, <div id='durasii' class='float-right'></div></small></div><div class='float-right'>"+pr[7]+"</div>");
                    $('#belanjapaket').html("<div class='float-left'><b>"+pr[8]+"</b></div><div class='float-right'>"+pr[7]+"</div>");
                }
            }
        }); 
    });

    $("input[name='tipe']").change(function(){
        var tipe = $(this).val();
        //$('#durasii').html("no "+tipe);
        $('#tipe').val(tipe);
    });

    $("input[name='payment']").change(function(){
        var pemb = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'mulai/pembayaran',
            data: {
                bank: pemb
            },
            success: function(response) {
                var data = jQuery.parseJSON(response);
                //console.log(data.norek);
                $('#bankdetails').html("<h6>No Rekening : "+data.norek+"</h6><h6>Nama Pemilik : "+data.nama+"</h6>");
            }
        }); 
    });

    $('input[name="buttondomain"]').click(function(){
        var tipe = $('#ringkasan').val();
        var domen = tipe.split(";");
        if($(this).is(":checked")){
            $('#namadomain').val(domen[0]);
            $('#tld').val(domen[1]);
            $('#durasidomain').val("365");
            $('#hargadomain').val(domen[2]);
            $('#belanjadomain').html("<div class='float-left'><b>"+domen[0]+"."+domen[1]+"</b></div><div class='float-right'>"+domen[2]+"</div>");
        }
        else if($(this).is(":not(:checked)")){
            $('#namadomain').val("");
            $('#tld').val("");
            $('#durasidomain').val("");
            $('#hargadomain').val("");
        }
    });

});
</script>