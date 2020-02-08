<div class="container isi">
    <div class="row text-white text-left">
        <div class="col-md-12 col-xs-12 col-sm-12">
            <h3 class="text-center py-4">Formulir Survey</h3>
            <form id='frmSurvey' action='<?= base_url() ?>main/surveygo' method='POST'>
                <div class="form-group row">
                    <div class="col-md-3 col-xs-12 col-sm-12">
                        <h6 for="nama">Masukkan Nama Anda</h6>
                        <input type="text" class="form-control form-control-sm transparan" id="nama" name="a" placeholder="Masukkan Nama">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3 col-xs-12 col-sm-12">
                        <h6 for="email">Masukkan Email Anda</h6>
                        <input type="email" class="form-control form-control-sm transparan" id="email" name="b" placeholder="Masukkan Email">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3 col-xs-12 col-sm-12">
                        <h6 for="nohp">Masukkan No HP</h6>
                        <input type="text" class="form-control form-control-sm transparan" id="nohp" name="c" placeholder="Masukkan No HP">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <h6 for="nohp">1. Apakah internet pada saat ini menjadi kebutuhan pokok anda?</h6>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="1" name="d" class="custom-control-input" value="y">
                            <label class="custom-control-label" for="1">Ya</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="2" name="d" class="custom-control-input" value="g">
                            <label class="custom-control-label" for="2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <h6 for="nohp">2. Apakan anda pernah berbelanja online?</h6>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="3" name="e" class="custom-control-input" value="y">
                            <label class="custom-control-label" for="3">Ya</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="4" name="e" class="custom-control-input" value="g">
                            <label class="custom-control-label" for="4">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <h6 for="nohp">3. Apakah anda sering mengunjungi marketplace? (tokopedia, bukalapak, shopee)</h6>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="5" name="f" class="custom-control-input" value="y">
                            <label class="custom-control-label" for="5">Ya</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="6" name="f" class="custom-control-input" value="g">
                            <label class="custom-control-label" for="6">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <h6 for="nohp">4. Apakah anda pernah membeli barang pada marketplace?</h6>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="7" name="g" class="custom-control-input" value="y">
                            <label class="custom-control-label" for="7">Ya</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="8" name="g" class="custom-control-input" value="g">
                            <label class="custom-control-label" for="8">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <h6 for="nohp">5. Apakah anda pernah mencoba menjual produk secara online?</h6>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="9" name="h" class="custom-control-input" value="y">
                            <label class="custom-control-label" for="9">Ya</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="10" name="h" class="custom-control-input" value="g">
                            <label class="custom-control-label" for="10">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <h6 for="nohp">6. Apakah anda mengetahui digital marketing?</h6>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="11" name="i" class="custom-control-input" value="y">
                            <label class="custom-control-label" for="11">Ya</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="12" name="i" class="custom-control-input" value="g">
                            <label class="custom-control-label" for="12">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <h6 for="nohp">7. Jika anda mempunyai produk, apakah anda ingin membuka toko online?</h6>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="13" name="j" class="custom-control-input" value="y">
                            <label class="custom-control-label" for="13">Ya</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="14" name="j" class="custom-control-input" value="g">
                            <label class="custom-control-label" for="14">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <h6 for="nohp">8. Apakah ada perbedaan omset sebelum dan sesudah menggunakan digital marketing? (jika anda sudah mencoba digital marketing)</h6>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="15" name="k" class="custom-control-input" value="y">
                            <label class="custom-control-label" for="15">Ya</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="16" name="k" class="custom-control-input" value="g">
                            <label class="custom-control-label" for="16">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="kirimsurveybtn">
                    <input id='submitsurvey' type="submit" style='border-radius: 1rem;font-weight: 600;color: #0062cc;background-color: #fff;' class="btn btn-white"  value="Kirim"/>
                </div>
            </form>
            <div id='surveylog' class='text-left py-3'></div>
        </div>
    </div>
</div>
<?php include 'footer2.php' ?>

<script>
$(document).ready(function() {

    $('#frmSurvey').submit(function(){

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                var data = jQuery.parseJSON(response);
                $('#surveylog').html(data.error);
                //console.log(data.error);
            }
        })
        return false;
    });

})
</script>