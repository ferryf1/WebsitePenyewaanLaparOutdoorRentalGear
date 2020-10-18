<form method="post" enctype="multipart/form-data" >
<h2><center><br> FORM PENDAFTARAN PELANGGAN </br></center></h2>
<table width="" align="center">
 <tr>
                 <td width="40%" align="right"><b>USERNAME : </b></td>
                 <td><input class="form-control" type="text" name="username" size="40" placeholder="masukkan email yg aktif, @gmail @yahoo / dll" required /></td>
                </tr>
                <tr>
                 <td width="40%" align="right"><b>PASSWORD : </b></td>
                 <td><input class="form-control" type="text" name="password" size="40" required /></td>
                </tr>
             <tr>
                 <td width="40%" align="right"><b>NAMA LENGKAP : </b></td>
                 <td><input class="form-control" type="text" name="nama_pelanggan" size="40" required /></td>
                </tr>
             <tr>
             <tr>
                 <td width="40%" align="right"><b>NO HP : </b></td>
                 <td><input class="form-control" type="text" name="kontak_pelanggan" size="40" required /></td>
                </tr>
             <tr>
                             <td width="40%" align="right"><b>ALAMAT : </b></td>
                 <td><textarea name="alamat_pelanggan" class="form-control"  rows="10">
        </textarea></td>
                </tr>

                <input class="form-control" type="hidden" name="level" size="40" value="penyewa" />
               

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

  $username = $_POST['username'];
  $password = $_POST['password'];
  $nama_pelanggan = $_POST['nama_pelanggan'];
  $kontak_pelanggan = $_POST['kontak_pelanggan'];
  $alamat_pelanggan = $_POST['alamat_pelanggan'];
  $level = $_POST['level'];
  
  
    mysql_query("INSERT INTO  pelanggan VALUES ('','$username','$password','$nama_pelanggan','$kontak_pelanggan','$alamat_pelanggan','$level')")or die (mysql_error());
    //echo "<center><font color='#FF0000' size='+1'>Berhasil disimpan</font></center><br>";
    ?><script language="javascript">alert('Data Pelanggan berhasil di Daftarkan')</script>
    <script>document.location.href="?page=pelanggan";</script><?php
  }


?>



















