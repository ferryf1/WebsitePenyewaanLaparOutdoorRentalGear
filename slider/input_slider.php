<form method="post" enctype="multipart/form-data" >
<h2><center><br> FORM TAMBAH FOTO SLIDER </br></center></h2>
<table width="" align="center">
 <tr>
                 <td width="40%" align="right"><b>FOTO SLIDER : </b></td>
                 <td><input class="form-control" type="file" name="foto_slider" size="40" required /></td>
                </tr>

                <input class="form-control" type="hidden" name="tanggal_slider" size="40" value="<?php echo $tgl_now ?>" />
               

  <br>
  <br>
  <tr>
     <td></td>
    <td><input name="simpan" type="submit" id="simpan" value="Simpan">
      </td>
    <td>&nbsp;</td>
    </tr>
  </tr>
  <br>
</table>
</table>
</form>  



<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {

  $tanggal_slider = $_POST['tanggal_slider'];

  $lokasi_file1    = $_FILES['foto_slider']['tmp_name'];
  $nama_file1      = $_FILES['foto_slider']['name'];
  $acak1           = rand(1,99);
  $nama_file_unik1 = $acak1.$nama_file1;
  $vdir_upload1 = "foto_slider/";
  $vfile_upload1 = $vdir_upload1 . $nama_file_unik1;
  move_uploaded_file($_FILES["foto_slider"]["tmp_name"], $vfile_upload1);


    mysql_query("INSERT INTO  slider VALUES ('','$nama_file_unik1','$tanggal_slider')")or die (mysql_error());
  
  
    //echo "<center><font color='#FF0000' size='+1'>Berhasil disimpan</font></center><br>";
    ?><script language="javascript">alert('FOTO SLIDER berhasil di Tambahkan')</script>
    <script>document.location.href="?page=slider";</script><?php
  }


?>



















