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
            $query=mysql_query("SELECT * from tb_transaksi INNER JOIN pelanggan ON tb_transaksi.id_pelanggan=pelanggan.id_pelanggan  where tb_transaksi.id_pelanggan='$id_pelanggan' order by tgl_transaksi DESC");
          
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
