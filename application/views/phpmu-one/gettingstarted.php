<div class="bg-white">
<div class='container isi'>
    <div class='row'>
        <div class='col-md-12 mb-3 text-center'>
            <div class='row'>
                    <?php if ($this->session->id_konsumen == ''){
                        echo "
                        <div class='col-md-12 col-sm-12 mb-3'>
                        <div class='card'>
                        <div class='card-body'>
                            <div class='card-title'><span class='badge badge-pill badge-danger'>!</span><h5>  Login Dahulu</h5></div>
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
                        echo"<div class='col-md-8 col-sm-8 mb-3'>
                        <div class='card'>
                        <div class='card-header bg-white'>
                            <h5 class='mb-0'> <span class='badge badge-pill badge-primary'>1</span> Pilih Paket</h5>
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
                                                    <div id='paket1' class='card'>
                                                    <div class='card-body'>
                                                        <label class='text-light datecard text-center'>50 %</label>
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
                                                    <div id='paket2' class='card'>
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
                                                    <div id='paket3' class='card'>
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
                                        <h5> <span class='badge badge-pill badge-primary'>2</span> Pilih Template</h5>
                                    </div>
                                    <hr>

                                    <div class='container'>
                                        <div class='row justify-content-center'>
                                            <div class='col-md mx-2 px-0 mt-1'>
                                                <label class='hargakhusus'>
                                                <input type='radio' name='tipe' class='card-input-element' value='1' />
                                                <div class='card card-default card-input card'>
                                                    <div id='tipe1' class='card'>
                                                    <div class='card-body'>
                                                        <h5 style='word-wrap: break-word;'>Template 1</h5>
                                                    </div>
                                                    </div>
                                                </div>
                                                </label>
                                            </div>

                                            <div class='col-md mx-2 px-0 mt-1'>
                                                <label class='hargakhusus'>
                                                <input type='radio' name='tipe' class='card-input-element' value='2' />
                                                <div class='card card-default card-input card'>
                                                    <div id='tipe2' class='card'>
                                                    <div class='card-body'>
                                                        <h5>Template 2</h5>
                                                    </div>
                                                    </div>
                                                </div>
                                                </label>
                                            </div>

                                            <div class='col-md mx-2 px-0 mt-1'>
                                                <label class='hargakhusus'>
                                                <input type='radio' name='tipe' class='card-input-element' value='3' />
                                                <div class='card card-default card-input card'>
                                                    <div id='tipe3' class='card'>
                                                    <div class='card-body'>
                                                        <h5>Template 3</h5>
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
                                <h5 class='mb-0'> <span class='badge badge-pill badge-primary'>3</span> Pilih Domain</h5>
                            </div>
                            <div class='card-body'>
                                <div class='col-lg-12'>
                                <form>
                                <div class='col-xs px-0 py-1'>        
                                    <div class='custom-control custom-radio text-left'>
                                        <div class='row'>
                                            <input type='radio' class='custom-control-input' id='belidomainsendiri' name='pilihandomain' value='0' />
                                            <label class='custom-control-label' for='belidomainsendiri'><h6>Beli domain (.com, .net, .online, .biz)</h6></label>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-xs px-0 py-1'>        
                                    <div class='custom-control custom-radio text-left'>
                                        <div class='row'>
                                            <input type='radio' class='custom-control-input' id='pakenusa' name='pilihandomain' value='1' />
                                            <label class='custom-control-label' for='pakenusa'><h6>Gunakan subdomain nusaserver (misal tokoanda.nusaserver.com)</h6></label>
                                        </div>
                                    </div>
                                </div>
                                <div class='belidomain'>
                                    <div class='row'>
                                        <div class='col-md-8 px-0 mx-0 py-1'>
                                            <div class='input-group'>
                                                <input class='form-control' id='subdomain2' name='subdomain' type='text' placeholder='Nama Toko Anda' required='required' data-validation-required-message='Please enter your name.'>
                                                <p class='help-block text-danger'></p>

                                                <div class='input-group-append'>
                                                <select class='form-control' name='domain2' id='domain2'>
                                                    <option value='com' selected>.com</option>
                                                    <option value='net'>.net</option>
                                                    <option value='biz'>.biz</option>
                                                    <option value='online'>.online</option>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-md-1 px-0 py-1'>
                                        </div>
                                        <div class='col-md-3 px-0 py-1'>
                                            <div class='form-group'>
                                                <button class='btn btn-primary btn-block' id='cekdomain'>Cek</button>
                                            </div>
                                        </div>
                                        <div class='container'>
                                            <div class='row justify-content-center'>
                                                <div id='loaderdomain'></div>
                                            </div>
                                        </div>
                                        <div class='clearfix'></div>
                                            <div class='col-md-8 px-0 text-left text-light'>
                                                <div class='text-dark text-center' id='resultdomain'>
                                                    <label class='hargakhusus'>
                                                            <div class='card card-default card-input card mx-0 my-0 mb-1'>
                                                                <div class='card' style='cursor: default;'>
                                                                    <div class='card-body'>
                                                                    <div class='text-dark text-center' id='domainsukses2'></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class='col-md-1 px-0'>
                                            </div>
                                            <div class='col-md-3 px-0 text-left text-light'>
                                                <div class='text-dark text-center' id='tomboldomain'>
                                                    <label class='hargakhusus'>
                                                    <input type='checkbox' name='buttondomain' class='card-input-element' value='1' />
                                                        <div class='card card-default card-input card mx-0 my-0'>
                                                            <div class='card bg-primary text-white'>
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


                                    <div class='pakenusa'>
                                    <div class='row'>
                                        <div class='col-md-8 px-0 mx-0 py-1'>
                                            <div class='input-group'>
                                                <input class='form-control' id='subdomain3' name='subdomain3' type='text' placeholder='subdomain' required='required' data-validation-required-message='Please enter your name.'>
                                                
                                                <div class='input-group-append'>
                                                  <span class='input-group-text'>.nusaserver.com</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-md-1 px-0 py-1'>
                                        </div>
                                        <div class='col-md-3 px-0 py-1'>
                                            <div class='form-group'>
                                                <button class='btn btn-primary btn-block' id='ceksubdomain'>Cek</button>
                                            </div>
                                        </div>


                                        <div class='container'>
                                            <div class='row justify-content-center'>
                                                <div id='loaderdomain2'></div>
                                            </div>
                                        </div>
                                        <div class='clearfix'></div>
                                            <div class='col-md-8 px-0 text-left text-light'>
                                                <div class='text-dark text-center' id='resultdomain2'>
                                                    <label class='hargakhusus'>
                                                            <div class='card card-default card-input card mx-0 my-0 mb-1'>
                                                                <div class='card' style='cursor: default;'>
                                                                    <div class='card-body'>
                                                                    <div class='text-dark text-center' id='domainsukses3'></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </label>
                                                </div>
                                            </div> 
                                            <div class='col-md-1 px-0'>
                                            </div>
                                            <div class='col-md-3 px-0 text-left text-light'>
                                                <div class='text-dark text-center' id='tomboldomain2'>
                                                    <label class='hargakhusus'>
                                                    <input type='checkbox' name='buttondomain2' class='card-input-element' value='1' />
                                                        <div class='card card-default card-input card mx-0 my-0'>
                                                            <div class='card bg-primary text-white'>
                                                                <div class='card-body'>
                                                                    <h5>Pilih Subomain ini</h5>
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
                            </div>
                        </div>
                    </div>
                    <div class='col-md-4 col-sm-4 mb-3'>
                        <div class='card'>
                            <div class='card-header bg-white'>
                                <h5 class='mb-0'> <span class='badge badge-pill badge-primary'>4</span> Ringkasan Order</h5>
                            </div>
                            <div class='card-body'>
                                <!-- <div class='card-title'><h5>Ringkasan Order</h5></div>
                                <hr> -->
                                <div class='container'>
                                    <div class='row'>
                                        <div class='col-sm mx-2 px-0 mt-1'>
                                            <div id='belanjapaket'>Kosong</div><br>
                                            <div id='belanjadomain'></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='card my-2'>
                            <div class='card-header bg-white'>
                                <h5 class='mb-0'> <span class='badge badge-pill badge-primary'>5</span> Pembayaran</h5>
                            </div>
                            <div class='card-body'>
                                <!--<div class='card-title'><h5>Pembayaran</h5></div>
                                <hr> -->
                                <div class='paymentWrap'>
                                    <div class='btn-group paymentBtnGroup btn-group-justified' data-toggle='buttons'>
                                        <div class='container'>
                                            <div class='row'>
                                                <div class='col-xs-2 mx-0 px-0 mt-1'>
                                                    <label class='btn paymentMethod'>
                                                        <div class='method bri'></div>
                                                        <input type='radio' name='payment' value='bri'> 
                                                    </label>
                                                </div>
                                                <div class='col-xs-2 ml-2 mr-2 px-0 mt-1'>
                                                    <label class='btn paymentMethod'>
                                                        <div class='method mandiri'></div>
                                                        <input type='radio' name='payment' value='mandiri'> 
                                                    </label>
                                                </div>
                                                <div class='col-xs-2 mx-0 px-0 mt-1'>
                                                    <label class='btn paymentMethod'>
                                                        <div class='method bca'></div>
                                                        <input type='radio' name='payment' value='bca'> 
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
                                <form method='post' action='".base_url()."mulai/beli' id='beli'>
                                <input id='id_konsumen' name='a' type='hidden' value='".$this->session->id_konsumen."' \>
                                <input id='id_produk' name='b' type='hidden' \>
                                <input id='tipe' name='c' type='hidden' value='' \>
                                <input id='tgldaftar' name='d' type='hidden' value='".date('Y-m-d H:i:s')."' \>
                                <input id='durasi' name='e' type='hidden' value='' \>
                                <input id='harga_final' name='f' type='hidden' value='' \>
                                
                                <input id='ringkasan' type='hidden' value='' \>
                                <input id='ringkasan2' type='hidden' value='' \>
                                <input id='banktype' name='g' type='hidden' value='' \>

                                <input id='pilihandomain' name='l' type='hidden' value='' \>
                                <input id='namadomain' name='h' type='hidden' value='' \>
                                <input id='tld' name='i' type='hidden' value='' \>
                                <input id='durasidomain' name='j' type='hidden' value='' \>
                                <input id='hargadomain' name='k' type='hidden' value='' \>
                                <input id='btnsubmit' type='submit' class='btn btn-primary btn-sm btn-block' value='BAYAR' \>
                                </form>
                                <p>
                                <div id='error_log' class='text-left'></div>
                            </div>
                        </div>
                        ";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script>
$(document).ready(function() {

    $('.belidomain').hide();
    $('.pakenusa').hide();
    $('.hargapaket').hide();
    $('#tomboldomain').hide();
    $('#resultdomain').hide();
    $('#tomboldomain2').hide();
    $('#resultdomain2').hide();


    $('#paket').change(function() {
        var asd = $(this).val();
        var id = asd.split(";");

        //$(".hargapaket").empty();

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
                produk_id: id[0]
            },
            success: function(response) {
                var data = jQuery.parseJSON(response);
                $('.harga1').empty();
                $('.harga6').empty();
                $('.harga12').empty();
                //var hargasplit = response.split(';');
                var harga_1_bulan = data.satu;
                var harga_6_bulan = data.enam;
                var harga_12_bulan = data.duabelas;
                $('.harga1').append(harga_1_bulan);
                $('.harga6').append(harga_6_bulan);
                $('.harga12').append(harga_12_bulan);
                $('.hargapaket').fadeIn();
                $('#id_produk').val(id[0]);
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
                var data = jQuery.parseJSON(response);
                //var pr = response.split(';');
                //console.log(data);
                if (durasi=='30'){
                    //ganti warna woi
                    $("#paket1").addClass('bg-primary text-white');
                    $("#paket2, #paket3").removeClass('bg-primary text-white');
                    //console.log(pr[5]);
                    $('#harga_final').val(data.satufix);
                    $('#belanjapaket').html("<div class='float-left'><b>"+data.nama_paket+"</b> </div><div class='float-right'>"+data.rpsatufix+"</div>");
                }else if (durasi=='183'){
                    //ganti warna woi
                    $("#paket2").addClass('bg-primary text-white');
                    $("#paket1, #paket3").removeClass('bg-primary text-white');
                    //console.log(pr[8]);
                    $('#harga_final').val(data.enamfix);
                    $('#belanjapaket').html("<div class='float-left'><b>"+data.nama_paket+"</b> </div><div class='float-right'>"+data.rpenamfix+"</div>");
                }else if (durasi=='365'){
                    //ganti warna woi
                    $("#paket3").addClass('bg-primary text-white');
                    $("#paket1, #paket2").removeClass('bg-primary text-white');
                    //console.log(pr[7]);
                    $('#harga_final').val(data.duabelasfix);
                    $('#belanjapaket').html("<div class='float-left'><b>"+data.nama_paket+"</b> </div><div class='float-right'>"+data.rpduabelasfix+"</div>");
                    //$('#belanjapaket').html("<div class='float-left'><b>"+pr[8]+"</b> <br><small> Hari, <div id='durasii' class='float-right'></div></small></div><div class='float-right'>"+pr[7]+"</div>");
                } 
            }
        }); 
    });

    $("input[name='tipe']").change(function(){
        var tipe = $(this).val();
        //$('#durasii').html("no "+tipe);
        $('#tipe').val(tipe);
        if (tipe=='1'){
            $("#tipe1").addClass('bg-primary text-white');
            $("#tipe2, #tipe3").removeClass('bg-primary text-white');
        }else if(tipe=='2'){
            $("#tipe2").addClass('bg-primary text-white');
            $("#tipe1, #tipe3").removeClass('bg-primary text-white');
        }else if(tipe=='3'){
            $("#tipe3").addClass('bg-primary text-white');
            $("#tipe1, #tipe2").removeClass('bg-primary text-white');
        }

    });

    $("input[name='pilihandomain']").change(function(){
        var pilihan = $(this).val();
        //$('#durasii').html("no "+tipe);
        $('#pilihandomain').val(pilihan);
        $("#tomboldomain").hide();
        $("#resultdomain").hide();
        $("#tomboldomain2").hide();
        $("#resultdomain2").hide();
        if (pilihan=='0'){
            //$("#tipe1").addClass('bg-primary text-white');
            //$("#tipe2, #tipe3").removeClass('bg-primary text-white');
            $('.belidomain').fadeIn();
            $('.pakenusa').hide();
        }else if(pilihan=='1'){
            //$("#tipe2").addClass('bg-primary text-white');
            //$("#tipe1, #tipe3").removeClass('bg-primary text-white');
            $('.belidomain').hide();
            $('.pakenusa').fadeIn();
        }
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
                $('#banktype').val(pemb);
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

    $('input[name="buttondomain2"]').click(function(){
        var tipe = $('#ringkasan2').val();
        var domen = tipe.split(";");
        if($(this).is(":checked")){
            $('#namadomain').val(domen[0]);
            $('#tld').val(domen[1]);
            $('#durasidomain').val("365");
            $('#hargadomain').val(domen[2]);
            $('#belanjadomain').html("<div class='float-left'><b>"+domen[0]+domen[1]+"</b></div><div class='float-right'>"+domen[2]+"</div>");
        }
        else if($(this).is(":not(:checked)")){
            $('#namadomain').val("");
            $('#tld').val("");
            $('#durasidomain').val("");
            $('#hargadomain').val("");
        }
    });

    $('#beli').submit(function() {
		    $.ajax({
			    type: 'POST',
			    url: $(this).attr('action'),
			    data: $(this).serialize(),
                beforeSend: function(){
                    $('#load').html("<img class='loading' src='"+baseurl+"asset/images/loading.gif' />");
                },
			    success: function(response) {
                    var data = jQuery.parseJSON(response);
                    //$('#panelregister').hide();
                    //$('#aksiregister').html(data);
                    if (data.error =='0'){
                        //console.log(data);
                        $('#error_log').html("Pembelian berhasil, tunggu...");
                        alert("Daftar Pembelian:\nPaket: "+data.nama_produk+" ("+data.durasi+" Hari, Template no "+data.tipe+")\nHarga: "+data.hargafinal+"\n==========\nDomain: "+data.subdomain+data.tld+"\nHarga: "+data.harga_domain+"\n=============\nSilahkan Transfer ke rekening dibawah\nNama Bank: "+data.bank+"\nNama Pemilik: "+data.namarek+"\nNo Rekening: "+data.norek+"\n=======Terimakasih")
                    }else{
                        //console.log(data);
                        $('#error_log').html(data.error);
                    }
			    }
		    })
		    return false;
        });
        
    $("html").click(function(){  
        //$('#product').prop("checked", false);
        //$('#product').empty(); 
        //console.log("klik")
    });  

});
</script>

