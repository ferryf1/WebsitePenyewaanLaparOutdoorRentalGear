<center><h3>MONITOR BARANG YANG DISEWA</h3></center>
      <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%" cellspacing="0">
        <thead>
          <tr color="blue" align="center" >
            <th align="center">KODE TRANSAKSI</th>

            <th align="center">NAMA PELANGGAN</th>
            <th align="center">BARANG</th>
            <th align="center">JUMLAH</th>
            <th align="center">LAMA SEWA</th>
            <th align="center">TGL AWAL & AKHIR SEWA</th>

            <th align="center">WAKTU BERJALAN</th>
            <th align="center">KETERANGAN</th>



          </tr>
        </thead>
        <tbody>

                       <?php

          include 'koneksi.php';
          $no=1;
            $query=mysql_query("SELECT * from tb_transaksi INNER JOIN tb_uraian_transaksi ON tb_transaksi.id_transaksi=tb_uraian_transaksi.id_transaksi INNER JOIN pelanggan ON tb_transaksi.id_pelanggan=pelanggan.id_pelanggan INNER JOIN tb_barang ON tb_uraian_transaksi.id_menu=tb_barang.id_menu where tb_transaksi.id_pelanggan='$id_pelanggan'");
          
          while ($data = mysql_fetch_array($query))
          {


$tanggal1 = new DateTime();
$tanggal2 = new DateTime($data['tgl_akhir_sewa']);
$perbedaan = $tanggal2->diff($tanggal1)->format("%a");


            ?>



           <tr>
            <td align="left"><?php echo $data['kode_transaksi'] ?></td>

            <td align="left"><?php echo $data['nama_pelanggan'] ?></td>
            <td align="left"><?php echo $data['nama_menu'] ?></td>
            <td align="left"><?php echo $data['banyak'] ?></td>
            <td align="left"><?php echo $data['lama_sewa'] ?></td>
            <td align="left"><?php echo $data['tgl_sewa'] ?> <br> s/d <br> <?php echo $data['tgl_akhir_sewa'] ?></td>
            <td align="left"><?php echo $perbedaan ?></td>


            <?php
$tgl_akhir_sewa=$data['tgl_akhir_sewa'];
$status2=$data['status2'];

if ($status2 == "SELESAI/RETURN STOK") {
echo '<td align="center" bgcolor="white"><b><font color="black">SELESAI/RETURN STOK </font></b></td>';
}
elseif ($status2 == "SELESAI") {
echo '<td align="center" bgcolor="white"><b><font color="black">SELESAI </font></b></td>';
}
elseif ($tgl_akhir_sewa >= $tgl_now) {
echo '<td align="center" bgcolor="blue"><b><font color="Black">AMAN </font></b></td>';
}
elseif ($tgl_now>=$tgl_akhir_sewa) {
  echo '<td align="center" bgcolor="red"><b><font color="black">DENDA </font></b></td>';
}

?>


</tr>
<?php } ?>
</tbody>
</table>
