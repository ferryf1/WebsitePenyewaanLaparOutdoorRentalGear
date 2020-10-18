<center><h3>DATA STATUS PEMBAYARAN (CEK BUKTI PEMBAYARAN)</h3></center>
    <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0">
        <thead>
          <tr color="blue" align="center" >
            <th align="center">KODE TRANSAKSI</th>
            <th align="center">TOTAL BAYAR</th>
            <th align="center">BARANG SEWA</th>

          </tr>
        </thead>
        <tbody>

                       <?php

          include 'koneksi.php';
          $no=1;
            $query=mysql_query("SELECT * from tb_transaksi where status1='BUKTI BAYAR' order by tgl_transaksi desc");
          
          while ($data = mysql_fetch_array($query))
          {

            ?>



           <tr>
            <td align="left"><?php echo $data['kode_transaksi'] ?></td>
            <td align="left"><?php echo rupiah($data['total_pembayaran']) ?></td>


<td><b><a href="?action=preview_barang_sewa&id_transaksi=<?php echo $data['id_transaksi'] ?>"><button class="btn btn-info btn-sm">Lihat Barang</button></a></b></td>





</tr>
<?php } ?>
</tbody>
</table>
