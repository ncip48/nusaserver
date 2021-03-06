<?php 
$iden = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="phpmu.com">
  <meta name="description" content="<?php echo $iden['meta_deskripsi']; ?>">
  <meta name="keywords" content="<?php echo $iden['meta_keyword']; ?>">
  <meta name="robots" content="all,index,follow">
  <meta http-equiv="Content-Language" content="id-ID">
  <meta NAME="Distribution" CONTENT="Global">
  <meta NAME="Rating" CONTENT="General">
  <link rel="canonical" href="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"/>
  <meta property="og:locale" content="id_ID" />
  <meta property="og:title" content="<?php echo $title; ?>" />
  <meta property="og:description" content="<?php echo $iden['meta_deskripsi']; ?>" />
  <meta property="og:url" content="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
  <meta property="og:site_name" content="<?php echo $iden['nama_website']; ?>" />

  <link rel="icon" type="image/x-icon" href='<?php echo base_url(); ?>asset/images/<?php echo $iden['favicon']; ?>'>

  <link href="<?php echo base_url(); ?>asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <link href="<?php echo base_url(); ?>asset/css/agency.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/floating-wa.css">

  <!--<link href="<?php echo base_url(); ?>asset/css/bootstsrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>asset/css/stylse.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>asset/css/defasult.css" rel="stylesheet" media="screen" />
  <link href="<?php echo base_url(); ?>asset/css/nivo-slider.css" rel="stylesheet" media="screen" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>/asset/admin/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/timepicker/bootstrap-timepicker.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>/asset/admin/plugins/jQuery/jquery-1.12.3.min.js"></script> -->
  <script src="<?php echo base_url(); ?>asset/vendor/jquery/jquery.min.js"></script>
  <script>var baseurl = '<?php echo base_url() ?>';</script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script type="text/javascript">
    function nospaces(t){
        if(t.value.match(/\s/g)){
            alert('Maaf, Username Tidak Boleh Menggunakan Spasi,..');
            t.value=t.value.replace(/\s/g,'');
        }
    }
    function toDuit(number) {
        var number = number.toString(), 
        duit = number.split('.')[0], 
        duit = duit.split('').reverse().join('')
            .replace(/(\d{3}(?!$))/g, '$1,')
            .split('').reverse().join('');
        return 'Rp ' + duit ;
    }

    var count = 6;
    var redirect = "<?php echo base_url(); ?>members/profile";
                 
    function countDown(){
      var timer = document.getElementById("timer");
      if(count > 0){
        count--;
        timer.innerHTML = "This page will redirect in "+count+" seconds.";
        setTimeout("countDown()", 1000);
      }else{
        window.location.href = redirect;
      }
    }
  </script>
<script>
    $(document).ready(function(){
      $(".preloader").fadeOut();
    });
    $('.btn-disabled').click(function(e){
    e.preventDefault();
    })
    </script>
</head>

<body id="page-top" class="bg-white">
  <div class="preloader">
      <div class="loading">
        <a class="intro-banner-vdo-play-btn pinkBg">
        <i class="glyphicon glyphicon-play whiteText" aria-hidden="true"></i>
        <span class="ripple pinkBg"></span>
        <span class="ripple pinkBg"></span>
        <span class="ripple pinkBg"></span>
        </a>
      </div>
    </div>
  <div id='aksilogout'></div>
  <?php include "header.php"; ?>
  <?php echo $contents; ?>
  <?php include "footer.php"; ?>

<div class="modal fade" id="uploadfoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title" id="myModalLabel">Ganti Foto Profile anda?</h5>
      </div><center>
      <div class="modal-body">
            <?php 
                $attributes = array('class'=>'form-horizontal','role'=>'form');
                echo form_open_multipart('members/foto',$attributes); ?>

                    <div class="form-group">
                      <center style='color:#8a8a8a'>Recomended (200 Kb atau 600 x 600) </center><br>
                        <label for="inputEmail3" class="col-sm-3 control-label">Pilih Foto</label>
                        <div style='background:#fff;' class="input-group col-sm-7">
                            <span class="input-group-addon"><i class='fa fa-image fa-fw'></i></span>
                            <input style='text-transform:lowercase;' type="file" class="form-control" name="userfile">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-1">
                            <button type="submit" name='submit' class="btn btn-primary">Update Foto</button>
                        </div>
                    </div>

                </form><div style='clear:both'></div>
      </div>
      </center>
    </div>
  </div>
</div>

<div class="modal fade" id="uploadfotoreseller" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title" id="myModalLabel">Ganti Foto Profile anda?</h5>
      </div><center>
      <div class="modal-body">
            <?php 
                $attributes = array('class'=>'form-horizontal','role'=>'form');
                echo form_open_multipart('reseller/foto',$attributes); ?>

                    <div class="form-group">
                      <center style='color:#8a8a8a'>Recomended (200 Kb atau 600 x 600) </center><br>
                        <label for="inputEmail3" class="col-sm-3 control-label">Pilih Foto</label>
                        <div style='background:#fff;' class="input-group col-sm-7">
                            <span class="input-group-addon"><i class='fa fa-image fa-fw'></i></span>
                            <input style='text-transform:lowercase;' type="file" class="form-control" name="userfile">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-1">
                            <button type="submit" name='submit' class="btn btn-primary">Update Foto</button>
                        </div>
                    </div>

                </form><div style='clear:both'></div>
      </div>
      </center>
    </div>
  </div>
</div>
<div id="myDiv"></div>
<?php $this->model_main->kunjungan(); ?>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--<script src="<?php echo base_url(); ?>asset/js/jqusery-1.12.3.min.js"></script>-->
<script src="<?php echo base_url(); ?>asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/smoothscroll.js"></script>

<script src="<?php echo base_url(); ?>asset/vendor/jquery-easing/jquery.easing.min.js"></script>
<!--<script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>-->
<script src="<?php echo base_url(); ?>asset/js/agency.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/floating-wa.js"></script>

<script src="<?php echo base_url(); ?>asset/js/jquery.nivo.slider.js"></script> 
<script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- <script type="text/javascript"> $(window).load(function() { $('#slider').nivoSlider(); }); </script> -->
<script src="<?php echo base_url() ?>asset/js/jquery.validate.js"></script>
<script> $(document).ready(function(){ $("#formku").validate(); }); </script>
<script> $(document).ready(function(){ $("#formkuu").validate(); }); </script>
<script src="<?php echo base_url(); ?>asset/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>asset/admin/plugins/timepicker/bootstrap-timepicker.js"></script>

<script type="text/javascript">
$('#myDiv').floatingWhatsApp({
    phone: '<?= $iden[no_wa] ?>',
    popupMessage: 'Selamat datang di <?= $iden[nama_website] ?>, ada yang bisa kami bantu?',
    showPopup: true,
    showOnIE: true,
    position: 'right',
    headerTitle: 'Selamat Datang!',
});
</script>

<script type="text/javascript">
  $('.datepicker').datepicker();
  $('.timepicker').timepicker()
</script>

<script type="text/javascript">
  $(document).ready(function() {
    /// make loader hidden in start
    $('#loading').hide();
     $('#username').blur(function(){
        var username_val = $("#username").val();
            // show loader
            $('#loading').show();
            $.post("<?php echo site_url()?>members/username_check", {
                a: username_val
            }, function(response){
                $('#loading').hide();
                $('#messageusername').html('').html(response.messageusername).show();
            });
            return false;
    });
  });  
</script>

<script type="text/javascript">
  $(document).ready(function() {
    /// make loader hidden in start
    $('#loading').hide();
     $('#sponsor').blur(function(){
        var sponsor_val = $("#sponsor").val();
            // show loader
            $('#loading').show();
            $.post("<?php echo site_url()?>members/sponsor_check", {
                sps: sponsor_val
            }, function(response){
                $('#loading').hide();
                $('#messagesponsor').html('').html(response.messagesponsor).show();
            });
            return false;
    });
  });  
</script>

<script type="text/javascript">
  $(document).ready(function() {
    /// make loader hidden in start
    $('#loading').hide();
     $('#presenter').blur(function(){
        var presenter_val = $("#presenter").val();
            // show loader
            $('#loading').show();
            $.post("<?php echo site_url()?>members/presenter_check", {
                psr: presenter_val
            }, function(response){
                $('#loading').hide();
                $('#messagepresenter').html('').html(response.messagepresenter).show();
            });
            return false;
    });
  });  
</script>

<script type="text/javascript">
  $(document).ready(function() {
    /// make loader hidden in start
    $('#loading').hide();
     $('#kodeaktivasi').blur(function(){
        var kodeaktivasi_val = $("#kodeaktivasi").val();
            // show loader
            $('#loading').show();
            $.post("<?php echo site_url()?>members/paket_check", {
                kode: kodeaktivasi_val
            }, function(response){
                $('#loading').hide();
                $('#messagekode').html('').html(response.messagekode).show();
            });
            return false;
    });
  });  
</script>

<script type="text/javascript">
    $(document).ready(function() {
        /// make loader hidden in start
        $('#loading').hide();
         $('#email').blur(function(){
            var email_val = $("#email").val();
            var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
            if(filter.test(email_val)){
                // show loader
                $('#loading').show();
                $.post("<?php echo site_url()?>members/email_check", {
                    d: email_val
                }, function(response){
                    $('#loading').hide();
                    $('#message').html('').html(response.message).show();
                });
                return false;
            }
        });
    });  
</script>

<script type="text/javascript">
  $(document).ready(function() {
    /// make loader hidden in start
    $('#loading').hide();
     $('#ktp').blur(function(){
        var ktp_val = $("#ktp").val();
            // show loader
            $('#loading').show();
            $.post("<?php echo site_url()?>members/ktp_check", {
                g: ktp_val
            }, function(response){
                $('#loading').hide();
                $('#messagektp').html('').html(response.messagektp).show();
            });
            return false;
    });
  });  

      $(function () { 
        $("#example1").DataTable();
        $("#example11").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });

        $('#example3').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "info": true,
          "autoWidth": false,
          "pageLength": 10,
          "order": [[ 4, "desc" ]]
        });

      });
</script>
<?php include "modal.php"; ?>
</body>
</html>
