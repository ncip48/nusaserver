<div class="container isi">
    <div class="row text-white text-left">
        <div class="col-md-12 col-xs-12 col-sm-12">
            <h4 class="text-center py-4">Formulir Survey</h4>
            <form>
                <div class="form-group row">
                    <div class="col-md-3 col-xs-12 col-sm-12">
                        <h6 for="nama">Masukkan Nama Anda</h6>
                        <input type="text" class="form-control form-control-sm" id="nama" name="a" placeholder="Masukkan Nama">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3 col-xs-12 col-sm-12">
                        <h6 for="email">Masukkan Email Anda</h6>
                        <input type="email" class="form-control form-control-sm" id="email" name="b" placeholder="Masukkan Email">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3 col-xs-12 col-sm-12">
                        <h6 for="nohp">Masukkan No HP</h6>
                        <input type="text" class="form-control form-control-sm" id="nohp" name="c" placeholder="Masukkan No HP">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <h6 for="nohp">1. Apakah anda sering mengakses internet?</h6>
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
                        <h6 for="nohp">2. Apakah anda sering mengunjungi marketplace? (tokopedia, bukalapak, shopee)</h6>
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
                        <h6 for="nohp">3. Apakah anda pernah berbelanja di marketplace? (tokopedia, bukalapak, shopee)</h6>
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
            </form>
            </div>
    </div>
</div>
<?= include 'footer2.php' ?>