<center><h3>DATA ADMIN PENGGUNA APLIKASI</h3></center>

  <div style="overflow-x:auto;">

     <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"> <i class="fa fa-plus"></i>  TAMBAH DATA ADMIN</button></a></center>

                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <?php 
                      include "admin/input_admin.php"
                       ?> 
                    </div>
                  </div>
                </div>
                    </td> 

      <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%" cellspacing="0">
        <thead>
          <tr color="blue" align="center" >
            <th align="center">NO</th>
            <th align="center">USERNAME</th>
            <th align="center">PASSWORD</th>
            <th align="center">NAMA PENGGUNA</th>
            <th align="center">ACTION</th>

          </tr>
        </thead>
        <tbody>

          <?php

          include 'koneksi.php';
          $no=1;


            $query=mysql_query("SELECT * from tb_admin order by kode_user DESC");

          while ($data = mysql_fetch_array($query))
          {

            ?>



           <tr>
            <td align="left"><?php echo $no++ ?></td>
            <td align="left"><?php echo $data['username'] ?></td>
            <td align="left"><?php echo $data['password'] ?></td>
            <td align="left"><?php echo $data['nama_lengkap'] ?></td>
            <td align="left">



               <a href="?action=edit_admin&kode_user=<?php echo $data ['kode_user']; ?> "><button class="btn btn-warning btn-sm">Edit</button></a>

            

               <a onclick="return konfirmasi()" href="?action=hapus_admin&kode_user=<?php echo $data ['kode_user']; ?>"><button class="btn btn-danger btn-sm">Hapus</button></a>
               <script type="text/javascript" language="JavaScript">
                 function konfirmasi()
                 {
                   tanya = confirm("Yakin Menghapus data, Jika Sudah di Hapus data Hilang..!!");
                   if (tanya == true) return true;
                   else return false;
                 }</script>

               </td>


               </tr>

               <?php
             }
             ?>
           </tbody>
         </table>



    </div>
