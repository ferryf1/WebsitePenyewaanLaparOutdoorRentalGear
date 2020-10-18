<center><h3>DATA STATUS PEMBAYARAN</h3></center>
      <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0">
        <thead>
          <tr color="blue" align="center" >
            <th align="center">KODE TRANSAKSI</th>
            <th align="center">NAMA PELANGGAN</th>
            <th align="center">BARANG</th>
            <th align="center">JUMLAH</th>
            <th align="center">LAMA SEWA</th>
            <th align="center">TOTAL BAYAR</th>
            <th align="center">STATUS PEMBAYAR</th>
            <th align="center">OPTION</th>

          </tr>
        </thead>
        <tbody>

                       <?php

          include 'koneksi.php';
          $no=1;
            $query=mysql_query("SELECT * from tb_sewa INNER JOIN tb_barang ON tb_sewa.id_menu=tb_barang.id_menu INNER JOIN pelanggan ON tb_sewa.id_pelanggan=pelanggan.id_pelanggan  order by tgl_sewa desc");
          
          while ($data = mysql_fetch_array($query))
          {

            ?>



           <tr>
            <td align="left"><?php echo $data['no_sewa'] ?></td>
            <td align="left"><?php echo $data['nama_pelanggan'] ?></td>
            <td align="left"><?php echo $data['nama_menu'] ?></td>
            <td align="left"><?php echo $data['banyak'] ?></td>
            <td align="left"><?php echo $data['lama_sewa'] ?></td>
            <td align="left"><?php echo rupiah($data['total_sewa']) ?></td>


<?php
$status=$data['status'];
if ($status == "Pending") {
echo '<td align="center" bgcolor="red"><b><font color="Black">PENDING </font></b></td>';
}
elseif ($status == "BUKTI BAYAR") {
echo '<td align="center" bgcolor="blue"><b><font color="white">PROSES CEK BAYAR </font></b></td>';
}
elseif ($status == "CANCEL") {
  echo '<td align="center" bgcolor="black"><b><font color="white">CANCEL </font></b></td>';
}
else{
  echo '<td align="center" bgcolor="White"><b><font color="Black">TERBAYAR </font></b></td>';
}
?>


<?php
$status=$data['status'];
if ($status == "Pending") {
echo '<td><b><a href="?action=input_bayar&id_sewa='.$data ['id_sewa'].'"><button class="btn btn-info btn-sm">PEMBAYARAN</button></a</b></td>';
}
else if ($status == "BUKTI BAYAR") {
  echo '<td><b><a href="?action=setujui_bayar&id_sewa='.$data['id_sewa'].'"><button class="btn btn-warning btn-sm">SETUJUI</button></a</b></td>';
}
else {
echo '<td align="center" bgcolor="white"><b><font color="white"></font></b></td>';
}
?>





</tr>
<?php } ?>
</tbody>
</table>




<center><h4>DATA TRANSAKSI</h4> </center><br>


      <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0">
        <thead>
          <tr color="blue" align="center" >
            <th align="center">KODE TRANSAKSI</th>
            <th align="center">TANGGAL TRANSAKSI</th>
            <th align="center">STATUS</th>


            <th align="center">PREVIEW BARANG</th>
            <th align="center">OPTION PEMBAYARAN</th>



          </tr>
        </thead>
        <tbody>

                       <?php

          include 'koneksi.php';
          $no=1;
            $query=mysql_query("SELECT * from tb_transaksi order by tgl_transaksi DESC");
          
          while ($data = mysql_fetch_array($query))
          {

            ?>



           <tr> 
            <td align="left"><?php echo $data['kode_transaksi'] ?></td>
            <td align="left"><?php echo $data['tgl_transaksi'] ?></td>
            <?php
$status=$data['status1'];
if ($status == "pending") {
echo '<td align="center" bgcolor="red"><b><font color="Black">PENDING </font></b></td>';
}
elseif ($status == "BUKTI BAYAR") {
echo '<td align="center" bgcolor="blue"><b><font color="white">PROSES CEK BAYAR </font></b></td>';
}
elseif ($status == "CANCEL") {
  echo '<td align="center" bgcolor="black"><b><font color="white">CANCEL </font></b></td>';
}
elseif ($status == "isi keranjang") {
  echo '<td align="center" bgcolor="black"><b><font color="white">ISI KERANJANG </font></b></td>';
}
else{
  echo '<td align="center" bgcolor="White"><b><font color="Black">TERBAYAR </font></b></td>';
}
?>




      <?php
$status=$data['status1'];
if ($status == "pending") {
echo '<td><b><a href="?action=preview_barang_sewa&id_transaksi='.$data ['id_transaksi'].'"><button class="btn btn-primary btn-sm">Lihat Barang</button></a></b></td>';
}
elseif ($status == "BUKTI BAYAR") {
echo '<td><b><a href="?action=preview_barang_sewa&id_transaksi='.$data ['id_transaksi'].'"><button class="btn btn-primary btn-sm">Lihat Barang</button></a></b></td>';
}
elseif ($status == "CANCEL") {
echo '<td><b><a href="?action=preview_barang_sewa&id_transaksi='.$data ['id_transaksi'].'"><button class="btn btn-primary btn-sm">Lihat Barang</button></a></b></td>';
}
elseif ($status == "TERBAYAR") {
echo '<td><b><a href="?action=preview_barang_sewa&id_transaksi='.$data ['id_transaksi'].'"><button class="btn btn-primary btn-sm">Lihat Barang</button></a></b></td>';
}
else {
echo '<td><b><a href="?action=lihat_barang_sewa&id_transaksi='.$data ['id_transaksi'].'"><button class="btn btn-primary btn-sm">Tambahkan Barang disewa</button></a</b></td>';
}
?>



      <?php
$status=$data['status1'];
if ($status == "pending") {
echo '<td><b><a href="?action=input_bayar&id_transaksi='.$data ['id_transaksi'].'"><button class="btn btn-success btn-sm">PEMBAYARAN</button></a</b></td>';
}
elseif($status == "BUKTI BAYAR") {
echo '<td><b><a href="?action=setujui_bayar&id_transaksi='.$data['id_transaksi'].'"><button class="btn btn-warning btn-sm">SETUJUI</button></a</b></td>';
}
elseif($status == "isi keranjang") {
echo '<td align="center" bgcolor="white"><b><font color="white"></font></b></td>';
}
else {
echo '<td align="center" bgcolor="white"><b><font color="white"></font></b></td>';
}
?>





</tr>
<?php } ?>
</tbody>
</table>
.