<center><h4>DATA PELANGGAN </h4> </center><br>

            <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"> <i class="fa fa-plus"></i>  TAMBAH DATA PELANGGAN</button></a></center>

                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <?php 
                      include "pelanggan/input_pelanggan.php"
                       ?> 
                    </div>
                  </div>
                </div>
                    </td> 







      <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0">
        <thead>
          <tr color="blue" align="center" >
            <th align="center">NO</th>
            <th align="center">USERNAME</th>
            <th align="center">PASSWORD</th>
            <th align="center">NAMA PELANGGAN</th>
            <th align="center">NO HP</th>
            <th align="center">ALAMAT</th>

            <th align="center">OPTION</th>


          </tr>
        </thead>
        <tbody>

                       <?php

          include 'koneksi.php';
          $no=1;
            $query=mysql_query("SELECT * from pelanggan order by id_pelanggan ASC");
          
          while ($data = mysql_fetch_array($query))
          {

            ?>



           <tr>
            <td align="left"><?php echo $no++ ?></td>
            <td align="left"><?php echo $data['username'] ?></td>
            <td align="left"><?php echo $data['password'] ?></td>
            <td align="left"><?php echo $data['nama_pelanggan'] ?></td>
            <td align="left"><?php echo $data['kontak_pelanggan'] ?></td>
            <td align="left"><?php echo $data['alamat_pelanggan'] ?></td>


 <td>


<a href="?action=edit_pelanggan&id_pelanggan=<?php echo $data ['id_pelanggan']; ?> "><button class="btn btn-warning btn-sm"> EDIT</button></a>

      <a onclick="return konfirmasi()" href="?action=hapus_pelanggan&id_pelanggan=<?php echo $data ['id_pelanggan']; ?> "><button class="btn btn-danger btn-sm">HAPUS</button></a>
      <script type="text/javascript" language="JavaScript">
                 function konfirmasi()
                 {
                   tanya = confirm("Yakin Menghapus data, Jika Sudah di Hapus Data akan hilang..!!");
                   if (tanya == true) return true;
                   else return false;
                 }</script>



      </td>



</tr>
<?php } ?>
</tbody>
</table>
