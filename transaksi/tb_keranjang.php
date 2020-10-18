<h4>Keranjang Sewa</h4>
      <table class="table table-striped table-bordered table-hover" width="90%" cellspacing="0">
        <thead>
          <tr color="blue" align="center" >
            <th align="center">NO</th>
            <th align="center">BARANG</th>
            <th align="center">JUMLAH</th>
            <th align="center">LAMA SEWA</th>
            <th align="center">TOTAL BAYAR</th>

          </tr>
        </thead>
        <tbody>

                       <?php

          include 'koneksi.php';
          $no=1;
            $query=mysql_query("SELECT * from tb_sewa INNER JOIN tb_barang ON tb_sewa.id_menu=tb_barang.id_menu where tb_sewa.id_pelanggan='$id_pelanggan'");
          
          while ($data = mysql_fetch_array($query))
          {

            ?>



           <tr>
            <td align="left"><?php echo $no++ ?></td>
            <td align="left"><?php echo $data['nama_menu'] ?></td>
            <td align="left"><?php echo $data['banyak'] ?></td>
            <td align="left"><?php echo $data['lama_sewa'] ?></td>
            <td align="left"><?php echo rupiah($data['total_sewa']) ?></td>





</tr>
<?php } ?>
</tbody>
</table>

<br>

<?php 

include 'transaksi/tb_barang_sewa.php';

 ?>
