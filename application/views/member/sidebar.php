<?php 
    $row = $this->model_app->profile_konsumen($this->session->id_konsumen)->row_array();
    if (trim($row['foto'])==''){ $foto_user = 'users.gif';  }else{ $foto_user = $row['foto'];  }
?>
<nav id="sidebar">
    <div class="custom-menu">
		<button type="button" id="sidebarCollapse" class="btn btn-primary"></button>
    </div>
	<div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);">
	  	<div class="user-logo">
	  		<div class="img" style="background-image: url(<?= base_url() ?>asset/foto_user/<?= $foto_user ?>);"></div>
	  			<h3><?= $row['nama_lengkap'] ?></h3>
	  	</div>
	</div>
    <ul class="list-unstyled components mb-5">
        <li class="active">
            <a href="<?= base_url() ?>members"><span class="fa fa-tachometer mr-3"></span> Dashboard</a>
        </li>
        <li>
            <a href="<?= base_url() ?>members/services"><span class="fa fa-server mr-3"></span> My Services</a>
        </li>
        <li>
            <a href="<?= base_url() ?>members/domain"><span class="fa fa-globe mr-3"></span> My Domain</a>
        </li>
        <li>
            <a href="<?= base_url() ?>members/tagihan"><span class="fa fa-file-text mr-3"></span> Tagihan</a>
        </li>
        <li>
            <a href="<?= base_url() ?>members/editprofile"><span class="fa fa-user-times mr-3"></span> Edit Profile</a>
        </li>
        <li>
            <a href="<?= base_url() ?>members/keluar"><span class="fa fa-sign-out mr-3"></span> Keluar</a>
        </li>
    </ul>
</nav>