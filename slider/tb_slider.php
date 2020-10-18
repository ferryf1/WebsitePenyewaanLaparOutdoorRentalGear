<center><h4>DATA FOTO SLIDER </h4> </center><br>

            <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"> <i class="fa fa-plus"></i>  TAMBAH FOTO</button></a></center>

                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <?php 
                      include "slider/input_slider.php"
                       ?> 
                    </div>
                  </div>
                </div>
                    </td> 







      <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0">
        <thead>
          <tr color="blue" align="center" >
            <th align="center">NO</th>
            <th align="center">FOTO SLIDER</th>
            <th align="center">TANGGAL INPUT</th>

            <th align="center">OPTION</th>


          </tr>
        </thead>
        <tbody>

                       <?php

          include 'koneksi.php';
          $no=1;
            $query=mysql_query("SELECT * from slider order by id_slider ASC");
          
          while ($data = mysql_fetch_array($query))
          {

            ?>



           <tr>
            <td align="left"><?php echo $no++ ?></td>
            <td align="left"><img src="foto_slider/<?php echo $data['foto_slider'] ?>" height="100" widht="150"</td>
            <td align="left"><?php echo $data['tanggal_slider'] ?></td>


 <td>


      <a onclick="return konfirmasi()" href="?action=hapus_slider&id_slider=<?php echo $data ['id_slider']; ?> "><button class="btn btn-danger btn-sm">HAPUS</button></a>
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
