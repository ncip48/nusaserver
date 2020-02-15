<!doctype html>
<html lang="en">
  <head>
  	<title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/asset/admin/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/admin/plugins/daterangepicker/daterangepicker-bs3.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url()?>asset/memberpage/css/style.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/plugins/jQuery/jquery-1.12.3.min.js"></script>
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<?php include 'sidebar.php' ?>

        <!-- Page Content  -->
      <?php echo $contents ?>
		</div>
<div class="modal fade" id="uploadfoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title float-left" id="myModalLabel">Ganti Foto Profile anda?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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

<div class="modal fade" id="tambahkomunitas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title float-left" id="myModalLabel">Tambah Komunitas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div><center>
      <div class="modal-body">
            <?php 
                $attributes = array('class'=>'form-horizontal','role'=>'form');
                echo form_open_multipart('members/tambahkomunitas',$attributes); ?>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-6 control-label">Nama Komunitas</label>
                        <div style='background:#fff;' class="input-group col-sm-7">
                            <input style='text-transform:lowercase;' type="text" class="form-control" name="kom">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-1">
                            <button type="submit" name='submit' class="btn btn-primary">Ajukan</button>
                        </div>
                    </div>

                </form><div style='clear:both'></div>
      </div>
      </center>
    </div>
  </div>
</div>

    <script src="<?php echo base_url()?>asset/memberpage/js/popper.js"></script>
    <script src="<?php echo base_url()?>asset/memberpage/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>asset/memberpage/js/main.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script>
    $('.datepicker').datepicker();
    $('#rangepicker').daterangepicker();
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
  </body>
</html>