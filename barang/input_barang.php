<form method="post" enctype="multipart/form-data" >
<h2><center><br> TAMBAHKAN DATA BARANG SEWA </br></center></h2>
<table width="" align="center">
 <tr>
                 <td width="40%" align="right"><b>NAMA BARANG : </b></td>
                 <td><input class="form-control" type="text" name="nama_menu" size="40" required /></td>
                </tr>
                <tr>
                 <td width="40%" align="right"><b>HARGA BARANG : </b></td>
                 <td><input class="form-control" type="text" name="harga_menu" size="40" required /></td>
                </tr>
             <tr>
                 <td width="40%" align="right"><b>STOK AWAL : </b></td>
                 <td><input class="form-control" type="text" name="stok" size="40" required /></td>
                </tr>
             <tr>
                 <td width="40%" align="right"><b>DESKRIPSI BARANG : </b></td>
                 <td><textarea name="deskripsi_menu" class="form-control"  rows="10">
        </textarea></td>
                </tr>
                <tr>
                 <td width="40%" align="right"><b>FOTO BARANG : </b></td>
                 <td><input class="form-control" type="file" name="foto_menu" required /></td>
                </tr>

  <br>
  <tr>
     <td></td>
    <td><input name="simpan" type="submit" id="simpan" value="Simpan">
      </td>
    <td>&nbsp;</td>
    </tr>
  </tr>
</table>
</table>
</form>  



<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {

  $nama_menu = $_POST['nama_menu'];
  $harga_menu = $_POST['harga_menu'];
  $stok = $_POST['stok'];
  $deskripsi_menu = $_POST['deskripsi_menu'];
  


  $lokasi_file    = $_FILES['foto_menu']['tmp_name'];
  $nama_file      = $_FILES['foto_menu']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file;
  $vdir_upload = "foto_produk/";
  $vfile_upload = $vdir_upload . $nama_file_unik;
  move_uploaded_file($_FILES["foto_menu"]["tmp_name"], $vfile_upload);



    mysql_query("INSERT INTO  tb_barang VALUES ('','$nama_menu','$harga_menu','$stok','$nama_file_unik','$deskripsi_menu','$tgl_now')")or die (mysql_error());
    //echo "<center><font color='#FF0000' size='+1'>Berhasil disimpan</font></center><br>";
    ?><script language="javascript">alert('Data Barang Sewa berhasil di Tambahkan')</script>
    <script>document.location.href="?page=menu_barang";</script><?php
  }


?>



















