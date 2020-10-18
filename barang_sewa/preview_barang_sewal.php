<center><h4>LIST BARANG YANG DISEWA</h4> </center><br>

<?php
$id_transaksi = @$_GET['id_transaksi'];
$sql = mysql_query("SELECT * from tb_transaksi where id_transaksi = '$id_transaksi'") or die (mysql_error());
$data = mysql_fetch_array($sql);


?>

<TABLE border="1" class="table table-bordered" >
<tr>
  <TH>KODE TRANSAKSI</TH>
  <th>TGL TRANSAKSI</th>
  <TH>STATUS</TH>

</tr>

<tr>
  <td><?php echo $data['kode_transaksi']; ?></td>
  <td><?php echo $data['tgl_transaksi']; ?></td>
  <td><?php echo $data['status1']; ?></td>

  </tr>

</TABLE>




      <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0">
        <thead>
          <tr color="blue" align="center" >
            <th align="center">NO</th>
            <th align="center">NAMA MENU</th>
            <th align="center">HARGA SATUAN</th>
            <th align="center">BANYAK</th>
            <th align="center">LAMA SEWA</th>
            <th align="center">JUMLAH SEWA</th>
            <th align="center">TOTAL SEWA</th>
            <th align="center">TGL SEWA</th>
            <th align="center">TGL AKHIR SEWA</th>


            



          </tr>
        </thead>
        <tbody>

                       <?php

          include 'koneksi.php';
          $no=1;
            $query=mysql_query("SELECT * from tb_uraian_transaksi INNER JOIN tb_barang ON tb_barang.id_menu=tb_uraian_transaksi.id_menu where id_transaksi = '$id_transaksi' order by id_uraian ASC");
          
          while ($data = mysql_fetch_array($query))
          {

            //jumlah_sewa
            $a=$data['banyak'];
            $b=$data['harga_menu'];

            $jumlah_sewa=$a*$b;

            //TOTAL SEWA

            $c=$data['lama_sewa'];

            $total_sewa=$c*$jumlah_sewa;

            $total_bayarr += $total_sewa;
$aaa =$total_bayarr;
?>



           <tr>
            <td align="left"><?php echo $no++ ?></td>
            <td align="left"><?php echo $data['nama_menu'] ?></td>
            <td align="left"><?php echo rupiah($data['harga_menu']) ?></td>
            <td align="left"><?php echo $data['banyak'] ?></td>
            <td align="left"><?php echo $data['lama_sewa'] ?></td>
            <td align="left"><?php echo rupiah($jumlah_sewa)?></td>
            <td align="left"><?php echo rupiah($total_sewa)?></td>
            <td align="left"><?php echo $data['tgl_sewa'] ?></td>
            <td align="left"><?php echo $data['tgl_akhir_sewa'] ?></td>

            




</tr>
<?php } ?>
</tbody>

              <tr>
                <td colspan="6" align="left"><em><strong>TOTAL DIBAYAR</strong></em></td>
                <td colspan="4" align="left"><em><strong><?php echo rupiah($aaa) ?></strong></em></td>
              </tr>

</table>


