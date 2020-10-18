<center><h4>MENU BARANG YANG TERSEDIA / DISEWAKAN</h4> </center><br>

                          <?php
              $level = $_SESSION['level'] == 'superadmin';
              if($level) {
              ?>

            <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"> <i class="fa fa-plus"></i>  TAMBAH DATA</button></a></center>

                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <?php 
                      include "barang/input_barang.php"
                       ?> 
                    </div>
                  </div>
                </div>
                    </td> 

                  <?php } ?>







      <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0">
        <thead>
          <tr color="blue" align="center" >
            <th align="center">FOTO BARANG</th>
            <th align="center">NAMA MENU</th>
            <th align="center">HARGA SATUAN</th>
            <th align="center">STOK BARANG</th>

              <?php
              $level = $_SESSION['level'] == 'penyewa';
              if($level) {
              ?>

            <th align="center">OPTION</th>

            <?php } ?>

                          <?php
              $level = $_SESSION['level'] == 'superadmin';
              if($level) {
              ?>

            <th align="center">OPTION</th>

            <?php } ?>



          </tr>
        </thead>
        <tbody>

                       <?php

          include 'koneksi.php';
          $no=1;
            $query=mysql_query("SELECT * from tb_barang order by id_menu ASC");
          
          while ($data = mysql_fetch_array($query))
          {

            ?>



           <tr>
            <td><img src="foto_produk/<?php echo $data['foto_menu'] ?>" alt="" width="150"  height="100"></td>
            <td align="left"><?php echo $data['nama_menu'] ?></td>
            <td align="left"><?php echo rupiah($data['harga_menu']) ?></td>
            <td align="left"><?php echo $data['stok'] ?></td>

              <?php
              $level = $_SESSION['level'] == 'penyewa';
              if($level) {
              ?>

 <td>

            <a href="?action=tambah_barang&id_transaksi=<?php echo $data ['id_transaksi']; ?> "><button class="btn btn-info btn-sm">SEWA</button></a>


      </td>

      <?php } ?>




                    <?php
              $level = $_SESSION['level'] == 'superadmin';
              if($level) {
              ?>

 <td>

            <a href="?action=sewa_barang&id_menu=<?php echo $data ['id_menu']; ?> "><button class="btn btn-info btn-sm">SEWA</button></a>

<a href="?action=edit_barang&id_menu=<?php echo $data ['id_menu']; ?> "><button class="btn btn-warning btn-sm"> EDIT</button></a>

      <a onclick="return konfirmasi()" href="?action=hapus_barang&id_menu=<?php echo $data ['id_menu']; ?> "><button class="btn btn-danger btn-sm">HAPUS</button></a>
      <script type="text/javascript" language="JavaScript">
                 function konfirmasi()
                 {
                   tanya = confirm("Yakin Menghapus data, Jika Sudah di Hapus Data akan hilang..!!");
                   if (tanya == true) return true;
                   else return false;
                 }</script>



      </td>

      <?php } ?>



</tr>
<?php } ?>
</tbody>
</table>
