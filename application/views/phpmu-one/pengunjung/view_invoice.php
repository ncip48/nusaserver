<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Tagihan</title>
	
	<link rel='stylesheet' type='text/css' href='<?php echo base_url() ?>asset/invoice/css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url() ?>asset/invoice/css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url() ?>asset/invoice/js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url() ?>asset/invoice/js/example.js'></script>

</head>

<body>
	<div id="page-wrap">

		<textarea id="header">TAGIHAN</textarea>
		
		<div id="identity">
		
            <div id="address">NusaServer<br>
Jl Trunojoyo Utara<br>
no 6, Kediri, Jawa Timur
<br><br>
Phone: (081) 335241314</div>

            <div id="logo">
              <img height='25px' id="image" src="<?php echo base_url() ?>asset/images/logo.png" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">
            <?php
                if ($row['jenis_kelamin']='Laki-Laki'){
                    $n = 'Sdr. ';
                }else{
                    $n = 'Sdri.';
                }
                if ($tagihan['status']=='0'){
                    $status = 'Pending';
                }else{
                    $status = 'Lunas';
                }
            ?>
            <span id="customer-title">Tagihan <br>a/n <?php echo $n." ". $row['nama_lengkap']; ?></span>

            <table id="meta">
                <tr>
                    <td class="meta-head">No Tagihan</td>
                    <td><?php echo $tagihan['no_tagihan'] ?></td>
                </tr>
                <tr>

                    <td class="meta-head">Tanggal</td>
                    <td><?php echo $tagihan['tanggal'] ?></td>
                </tr>
                <tr>
                    <td class="meta-head">Total</td>
                    <td><?php echo "Rp " .rupiah($tagihan['total']+$tagihan['ppn']) ?></td>
                </tr>
                <tr>
                    <td class="meta-head">Status</td>
                    <td><?php echo $status ?></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Item</th>
		      <th>Description</th>
		      <th>Harga</th>
		      <th>Lama Pembelian</th>
              <th>Total</th>
		  </tr>
		  
		  <tr class="item-row">
		      <td class="item-name"><div class="delete-wpr"><?php echo $tagihan['nama_produk'] ?></div></td>
		      <td class="description">Style : <?php echo $tagihan['tipe'] ?></td>
		      <td><textarea class="cost"><?php echo "Rp " . rupiah($tagihan['harga']) ?></textarea></td>
		      <td><textarea class="qty"><?php echo $tagihan['durasi'] ?> Hari</textarea></td>
		      <td><span class="price"><?php echo "Rp " . rupiah($tagihan['harga']) ?></span></td>
          </tr>
          
          <tr class="item-row">
		      <td class="item-name"><div class="delete-wpr">Domain : <?php echo $tagihan['nama_domain'].".".$tagihan['tld'] ?></div></td>
		      <td class="description">Sewa domain tahunan</td>
		      <td><textarea class="cost"><?php echo "Rp " .rupiah($tagihan['harga_domain']) ?></textarea></td>
		      <td><textarea class="qty"><?php echo $tagihan['durasi_domain'] ?> Hari</textarea></td>
		      <td><span class="price"><?php echo "Rp ". rupiah($tagihan['harga']) ?></span></td>
		  </tr>
		  
		  <tr id="hiderow">
		    <td colspan="5"></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal"><?php echo "Rp " .rupiah($tagihan['total']) ?></div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Pajak 10%</td>
		      <td class="total-value"><div id="total"><?php echo "Rp ". rupiah((10/100)*$tagihan['total']) ?></div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Diskon</td>

		      <td class="total-value"><textarea id="paid">-</textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">T O T A L</td>
		      <td class="total-value balance"><div class="due"><?php echo "Rp " .rupiah($tagihan['total']+$tagihan['ppn']) ?></div></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>
	
	</div>
	
</body>

</html>