<script type='text/javascript'>
    var count = 6;
    var redirect = baseurl + 'mulai';
                 
    function countDown(){
        var timer = document.getElementById('timer');
        if(count > 0){
            count--;
            timer.innerHTML = 'Tunggu '+count+' detik.';
            setTimeout('countDown()', 1000);
        }else{
            window.location.href = redirect;
        }
    }
</script>

<?php
if ($error=='1'){
    $judul = "Aktivasi Gagal";
    $pesan = "Kode aktivasi expired, kirim lagi?";
}elseif ($error=='2'){
    $judul = "Aktivasi Gagal";
    $pesan = "User sudah aktif<br><span id='timer'>
    <script type='text/javascript'>countDown();</script>
    </span>";
}elseif ($error=='0'){
    $judul = "Aktivasi Berhasil";
    $pesan = "Selamat, akun anda telah aktif<br><span id='timer'>
    <script type='text/javascript'>countDown();</script>
    </span>";
}
//NQ4J36mjIlD2VEcSra0pyTwZ1iP9CMAL5hY
//Zk01U21QY084MzZlODZlVU1LMDlHQT09
?>

<div class='container container-login'>
    <div class='center row justify-content-center'>
        <div class='col-md-12 login-form-2'>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading"><?= $judul ?></h3>
                    <div class="row register-form align-items-center">
                        <div class="col text-center text-white">
                        <h5><?= $pesan ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>