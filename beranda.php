<h3>SELAMAT DATANG ADMIN LAPAR EXPLORE OUTDOOR RENTAL GEAR  : <b><?php echo $nama_lengkap ?></b></h3>  
<br>
<br>
<marquee><h4>SILAHKAN CEK BERANDA STATUS PEMBAYARAN KONSUMEN</h4></marquee>


<?php 

include 'koneksi.php';

$pending = mysql_num_rows(mysql_query("SELECT * FROM tb_transaksi where status1='pending'"));
$cek_bayar = mysql_num_rows(mysql_query("SELECT * FROM tb_transaksi where status1='BUKTI BAYAR'"));
$terbayar = mysql_num_rows(mysql_query("SELECT * FROM tb_transaksi where status1='TERBAYAR'"));



 ?>	


<div class="btn-group btn-group-justified" role="group" aria-label="...">
	
  <div class="btn-group" role="group">
    <a href="?page=beranda_pending"><button type="button" class="btn btn-danger"><h3><?php echo $pending ?></h3> <br> PEMBAYARAN PENDING</button> </a>
  </div>
 
  <div class="btn-group" role="group">
    <a href="?page=beranda_bukti_bayar"><button type="button" class="btn btn-info"><h3><?php echo $cek_bayar ?></h3> <br> PROSES CEK BAYAR</button></a>
  </div>
  <div class="btn-group" role="group">
    <a href="?page=beranda_terbayar"><button type="button" class="btn btn-default"><h3><?php echo $terbayar ?></h3> <br> TERBAYAR</button></a>
  </div>
</div>