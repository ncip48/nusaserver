<div class="container isi">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <input type='hidden' id='jmlplus' value='7'>
            <input type='hidden' id='tglnow' value='<?php echo date('d-m-Y') ?>'>
            <input type='hidden' id='jmlmin' value='7'>
            <div class="bungkus">
                <div id='sebelum'>
                    <?php $this->model_tgl->getTabelTgl(date('d-m-Y')); ?>
                </div>
                <div id='hasil'></div>
            </div>
            <br>
            <p><button class='btn btn-full btn-sm active'> 08:00 </button> : Tidak Tersedia  <button class='btn btn-outline-primary btn-sm'> 08:00 </button> : Tersedia</p>
        </div>
    </div>
</div>