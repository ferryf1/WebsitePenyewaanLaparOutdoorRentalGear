<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan PENYEWAAN</title>
</head>

<body onLoad="print()">
<?php

include '../koneksi.php';
include '../rupiah.php';
include '../rupiah_terbilang.php';

$tgl_awal = $_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];


//TGL INDONESIA

//$t = $data['tgl_kas'];

function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  
  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}


?>
<br>
<table width="1000" border="0">
  <tr>
    <td width="150" align="center" rowspan="2"><img src="../assetss/img/andi.png" width="80" height="76" align="top" /></td>
    <td width="1300"><div align="center">LAPORAN SEWA ALAT<br> LAPAR EXPLORE OUTDOOR RENTAL GEAR  </div></td>

  </tr>
  <tr>
    <td><div align="center">TANGGAL : <?php echo tgl_indo($tgl_awal) ?> s/d <?php echo tgl_indo($tgl_akhir) ?> </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="1047" border="1">
   <thead>
          <tr color="blue" align="center" >
            <th align="center">NO</th>
            <th align="center">NO TRANSAKSI</th>
            <th align="center">TANGGAL</th>
            <th align="center">NAMA MENU</th>
            <th align="center">BANYAK SEWA</th>
            <th align="center">LAMA SEWA</th>
            <th align="center">TOTAL NILAI</th>
            <th align="center">STATUS</th>

            <th align="center">WAKTU KELEBIHAN</th>
            <th align="center">NILAI DENDA</th>




          </tr>
        </thead>
        <tbody>

                       <?php

          include 'koneksi.php';
          $no=1;
            $query=mysql_query("SELECT * from tb_uraian_transaksi INNER JOIN tb_transaksi ON tb_uraian_transaksi.id_transaksi=tb_transaksi.id_transaksi INNER JOIN tb_barang on tb_uraian_transaksi.id_menu=tb_barang.id_menu where tb_transaksi.tgl_transaksi  between '$tgl_awal' and '$tgl_akhir' order by tgl_transaksi asc");
          
          while ($data = mysql_fetch_array($query))
          {


            $total_nilai += $data['total_pembayaran'];
            $totalll =$total_nilai;

            $nilai_denda += $data['nilai_denda'];
            $tot_denda =$nilai_denda;

            ?>
            <td align="center"><?php echo $no++ ?></td>
            <td align="center"><?php echo $data['kode_transaksi'] ?></td>
            <td align="center"><?php echo tgl_indo($data['tgl_transaksi']) ?></td>
            <td align="center"><?php echo $data['nama_menu'] ?></td>
            <td align="center"><?php echo $data['banyak'] ?></td>
            <td align="center"><?php echo $data['lama_sewa'] ?> Hari</td>
            <td align="center"><?php echo rupiah($data['total_pembayaran']) ?></td>
            <td align="center"><?php echo $data['status1'] ?></td>

            <td align="center"><?php echo $data['lama_denda'] ?></td>
            <td align="center"><?php echo rupiah($data['nilai_denda']) ?></td>

</tr>

               <?php
             }
             ?>
              
           </tbody>

            <tr>
                <td colspan="5" align="center"><em><strong>JUMLAH TOTAL</strong></em></td>
                <td align="center"><em><strong><?php echo rupiah($totalll) ?></strong></em></td>
                 <td colspan="3" align="center"><em><strong>JUMLAH DENDA</strong></em></td>
                 <td align="center"><em><strong><?php echo rupiah($tot_denda) ?></strong></em></td>
              </tr>
              


</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>