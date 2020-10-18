<?php
session_start();
if($level = $_SESSION['level']) {
  $id_pelanggan=$_SESSION['id_pelanggan'];
  $nama_pelanggan=$_SESSION['nama_pelanggan'];
  $level=$_SESSION['level'];

  $kontak_pelanggan=$_SESSION['kontak_pelanggan'];
  $alamat_pelanggan=$_SESSION['alamat_pelanggan'];

  ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Menu Produk - Lapar Explore Outdoor Rental Gear</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/fontawesome-all.css">
	<link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/owlcarousel/assets/owl.theme.default.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans:wght@700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/dist/css/style.css">

		<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">


</head>
<body>

<div class="topbar">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-6">
				<div class="contact">
					<ul>
						<li><i class="fa fa-phone"></i> 0895-6113-43047</li>
						<li><i class="fa fa-envelope"></i></i> laparexplore@gmail.com</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<header class="header">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="logo">
					<img src="assets/img/andi.png" class="img-responsive">
				</div>
			</div>

	</div>
</header>
<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".naff">
				<span class="sr-only"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse naff">
			<ul class="nav navbar-nav">
				
				<li><a href="?page=menu_barang"><i class="fas fa-utensils"></i> Produk </a></li>
				<li><a href="?page=tb_transaksi"><i class="fa fa-chevron-circle-right"></i>Data Transaksi</a></li>
				
				<li><a href="?page=history"><i class="fas fa-user-plus"></i> History</a></li>
					<li><a href="logout.php"><i class="fas fa-sign-in-alt"></i> Logout</a></li>
			</ul>

						<ul class="nav navbar-nav navbar-right">
				<li><a target="_blank" href="https://wa.me/62895611343047?text=Isi Pesan"><i class="fa fa-whatsapp" aria-hidden="true"></i> UNTUK INFO LEBIH LANJUT SILAHKAN CHAT ADMIN <button class="btn btn-success btn-sm">WA ADMIN</button></a></li>
			</ul>

		</div>
	</div>
</nav>
<main class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-push-3">
				<div class="box">

					<div class="box-body">
						<div class="row">




 																					<?php
                                                                                     include 'koneksi.php';
                                                                                     include 'rupiah.php';
                                                                                     include 'rupiah_terbilang.php';
                                                                                     $page = @$_GET['page'];
                                                                                     $action = @$_GET['action'];

                                                                                     if($page == "menu_barang") {
                                                                                        include "barang/barang_all.php";
                                                                                    } 
                                                                                    elseif($page == "login_pelanggan") {
                                                                                        include "login_pelanggan.php";
                                                                                    }

                                                                                    //SEWA
                                                                                    elseif($action == "sewa_barang") {
                                                                                        include "sewa/input_sewa.php";
                                                                                    }
                                                                                    elseif($page == "checkout") {
                                                                                        include "sewa/tb_sewa.php";
                                                                                    }

                                                                                    //HISTORY (CERITA DENDA DAN MONITORING DATA SEWA)

                                                                                    elseif($page == "history") {
                                                                                        include "sewa/tb_history.php";
                                                                                    }

                                                                                    elseif($action == "hitung_denda") {
                                                                                        include "sewa/hitungan_denda.php";
                                                                                    }

                                                                                    elseif($action == "kembali_stok") {
                                                                                        include "sewa/kembali_stok.php";
                                                                                    }

                                                                                    //PEMBAYARAN

                                                                                    elseif($action == "input_bayar") {
                                                                                        include "bayar/input_bayar.php";
                                                                                    }


                                                                                    //TRANSAKI AWAL PERTMA


                                                                                    elseif($action == "input_transaksi") {
                                                                                        include "transaksi/input_transaksi.php";
                                                                                    }
                                                                                    elseif($page == "keranjang") {
                                                                                        include "transaksi/tb_keranjang.php";
                                                                                    }
                                                                                    elseif($action == "tambah_barang") {
                                                                                        include "transaksi/input_sewa_barang.php";
                                                                                    }

                                                                                    elseif($page == "tb_transaksi") {
                                                                                        include "transaksi/tb_transaksi.php";
                                                                                    }




                                                                                    //URAIAN BARANG YANG DISEWA

                                                                                     elseif($action == "lihat_barang_sewa") {
                                                                                        include "barang_sewa/tb_barang_sewal.php";
                                                                                    }

                                                                                    elseif($action == "hapus_barang_sewa") {
                                                                                        include "barang_sewa/hapus_barang_sewa.php";
                                                                                    }

                                                                                    elseif($action == "preview_barang_sewa") {
                                                                                        include "barang_sewa/preview_barang_sewal.php";
                                                                                    }





                                                                                    ?>
								






						</div>

					</div>
				</div>
			</div>
			<div class="col-md-3 col-md-pull-9"> 
				<!-- awal sidebar kategori -->
				<div class="panel panel-color">
					<div class="panel-heading">
						<h3 class="panel-title">Selamat Datang</h3>
					</div>
					<div class="list-group">
						<a href="" class="list-group-item"><i class="fas fa-user"></i></i> <?php echo $nama_pelanggan ?></a>
						<a href="" class="list-group-item"><i class="fas fa fa-address-card"></i></i> <?php echo $alamat_pelanggan ?></a>
						<a href="" class="list-group-item"><i class="fas fa fa-address-book"></i></i> <?php echo $kontak_pelanggan ?></a>
					
					</div>
				</div>
				<!-- akhir sidebar kategori -->
			</div>
		</div>
	</div>
</main>
<footer class="footer">
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h3 class="footer-title">Tentang Kami</h3>
					<p>
						Semoga Barokah adalah usaha rumahan yang bergerak dibidang kuliner. Semoga Barokah adalah Jasa Pemesanan Makanan / Katering. Semoga Barokah dirintis pada tanggal 11 Mei 2019.
					</p>
				</div>
				<div class="col-md-3">
					<h3 class="footer-title">Kontak Kami</h3>
					<ul>
						<li>Telp: 0852-6922-2770</li>
						<li>Instagram: @semoga.barokah.amin</li>
						<li>Alamat: Jl. Tanjung Raya 2 Komp.Villa Parma No. A23 Pontianak Timur</li>
					</ul>
				</div>
				<div class="col-md-3">
					<h3 class="footer-title">Lokasi</h3>
					<ul>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.815221622051!2d109.38909071425384!3d-0.07140889994789917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d50b2bdcd1603%3A0x8af60f421d6608f2!2sKomplek%20Villa%20Parma!5e0!3m2!1sen!2sid!4v1595043128722!5m2!1sen!2sid" width="300" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">Copyright &copy; <strong>Semoga Barokah.</strong> All Right Reserved</div>
	</div>
</footer>

<!-- script javascrip -->
<script src="assets/dist/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/owlcarousel/owl.carousel.min.js"></script>
<script src="assets/dist/js/buanapetshop.js"></script>



<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>

	<!-- DataTables JavaScript -->
     <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
     <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
     <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>

	<script>
    $(document).ready(function() {
    $('#dataTables-example').DataTable({
    responsive: true
    });
    });
    </script>









    <script type="text/javascript">
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script>







</body>
</html>



 <?php

                                                        } else {
                                                          header("location: index.php");
                                                      }
                                     
                                                      ?>
