<?php

session_start();
if($level = $_SESSION['level']) {
  $kode_user=$_SESSION['kode_user'];
  $nama_lengkap=$_SESSION['nama_lengkap'];
  $level=$_SESSION['level'];



  ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lapar Explore Outdoor Rental Gear - Administrator</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assetss/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assetss/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assetss/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assetss/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

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
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">ADMINISTRATOR</a>
            </div>
            <div style="color: #8a8a5c;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> LAPAR EXPLORE OUTDOOR RENTAL GEAR &nbsp; </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">	
                <li class="text-center">
                    <img src="assets/img/andi.png" class="user-image img-responsive"/>
                    </li>			
                    <li><a href="?page=beranda"><i class="fa fa-home fa-1x"></i> HOME</a></li>
                    <li><a href="?page=menu_barang"><i class="fa fa-copy fa-1x"></i> PRODUK</a></li>
                    <li><a href="?page=tb_transaksi"><i class="fa fa-copy fa-1x"></i> TRANSAKSI</a></li>
                    <!--<li><a href="?page=check_pembayaran"><i class="fa fa-book fa-1x"></i> CHECK PEMBAYARAN</a></li>-->
                    <li><a href="?page=history"><i class="fa fa-book fa-1x"></i> MONITOR SEWA DAN STOK</a></li>
                    <li><a href="?page=laporan"><i class="fa fa-file fa-1x"></i> LAPORAN</a></li>
                    <li><a href="?page=pelanggan"><i class="fa fa-users fa-1x"></i> PELANGGAN</a></li>
                    <li class="treeview">
                        <a href="#">
                            <i class="glyphicon glyphicon-cog"></i>
                            <span> SETTING</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="?page=slider"><i class="glyphicon glyphicon-fast-forward"></i> Ganti Foto Slider</a></li>
                        </ul>
                        <ul class="treeview-menu">
                            <li><a href="?page=tb_admin"><i class="fa fa-users fa-1x"></i> Pengguna Aplikasi</a></li>
                        </ul>
                    </li>
                    <li><a href="logout.php"><i class="fa fa-sign-out fa-1x"></i> LOGOUT</a></li>

                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
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

                                                                                    elseif($action == "edit_barang") {
                                                                                        include "barang/edit_barang.php";
                                                                                    }

                                                                                    elseif($action == "hapus_barang") {
                                                                                        include "barang/hapus_barang.php";
                                                                                    }

                                                                                    elseif($page == "check_pembayaran") {
                                                                                        include "sewa/tb_sewa_admin.php";
                                                                                    }

                                                                                    elseif($action == "setujui_bayar") {
                                                                                        include "bayar/setujui_bayar.php";
                                                                                    }

                                                                                    elseif($page == "history") {
                                                                                        include "sewa/tb_history_admin.php";
                                                                                    }
                                                                                    elseif($action == "input_bayar") {
                                                                                        include "bayar/input_bayar.php";
                                                                                    }
                                                                                    elseif($action == "hitung_denda") {
                                                                                        include "sewa/hitungan_denda.php";
                                                                                    }

                                                                                    elseif($action == "kembali_stok") {
                                                                                        include "sewa/kembali_stok.php";
                                                                                    }
                                                                                    elseif($action == "sewa_barang") {
                                                                                        include "sewa/input_sewa.php";
                                                                                    }

                                                                                    //LAPORANnnn-----------
                                                                                    elseif($page == "laporan") {
                                                                                        include "laporan/laporan_sewa.php";
                                                                                    }

                                                                                    //PELANGGAN

                                                                                    //PELANNGGAN-----------
                                                                                    elseif($page == "pelanggan") {
                                                                                        include "pelanggan/tb_pelanggan.php";
                                                                                    }
                                                                                    elseif($action == "edit_pelanggan") {
                                                                                        include "pelanggan/edit_pelanggan.php";
                                                                                    }
                                                                                    elseif($action == "hapus_pelanggan") {
                                                                                        include "pelanggan/hapus_pelanggan.php";
                                                                                    }

                                                                                    //// BERANDA
                                                                                    elseif($page == "beranda") {
                                                                                        include "beranda.php";
                                                                                    }
                                                                                    elseif($page == "beranda_pending") {
                                                                                        include "beranda/beranda_pending.php";
                                                                                    }
                                                                                    elseif($page == "beranda_bukti_bayar") {
                                                                                        include "beranda/beranda_bukti_bayar.php";
                                                                                    }
                                                                                    elseif($page == "beranda_terbayar") {
                                                                                        include "beranda/beranda_terbayar.php";
                                                                                    }

                                                                                    //SLIDERRRRRRR

                                                                                     elseif($page == "slider") {
                                                                                        include "slider/tb_slider.php";
                                                                                    }
                                                                                     elseif($action == "hapus_slider") {
                                                                                        include "slider/hapus_slider.php";
                                                                                    }

                                                                                    elseif($page == "tb_admin") {
                                                                                        include "admin/tb_admin.php";
                                                                                    }
                                                                                    elseif($action == "edit_admin") {
                                                                                        include "admin/edit_admin.php";
                                                                                    }
                                                                                    elseif($action == "hapus_admin") {
                                                                                        include "admin/hapus_admin.php";
                                                                                    }

                                                                                    //CANCELLLLL

                                                                                    elseif($action == "cancel") {
                                                                                        include "sewa/cancel.php";
                                                                                    }

                                                                                    elseif($action == "preview_barang_sewa") {
                                                                                        include "barang_sewa/preview_barang_sewal.php";
                                                                                    }

                                                                                    elseif($page == "tb_transaksi") {
                                                                                        include "transaksi/tb_transaksi_admin.php";
                                                                                    }

                                                                                    elseif($action == "tambah_barang") {
                                                                                        include "transaksi/input_sewa_barang.php";
                                                                                    }
                                                                                    elseif($action == "input_transaksi") {
                                                                                        include "transaksi/input_transaksi.php";
                                                                                    }
                                                                                    elseif($page == "keranjang") {
                                                                                        include "transaksi/tb_keranjang.php";
                                                                                    }
                                                                                     elseif($action == "lihat_barang_sewa") {
                                                                                        include "barang_sewa/tb_barang_sewal.php";
                                                                                    }
































               
                ?>


            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assetss/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assetss/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assetss/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assetss/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assetss/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assetss/js/custom.js"></script>


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
            split           = number_string.split(','),
            sisa            = split[0].length % 3,
            rupiah          = split[0].substr(0, sisa),
            ribuan          = split[0].substr(sisa).match(/\d{3}/gi);
 
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
                                                          header("location: login.php");
                                                      }
                                     
                                                      ?>