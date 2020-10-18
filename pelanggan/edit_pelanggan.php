<?php
$id_pelanggan = @$_GET['id_pelanggan'];
$sql = mysql_query("SELECT * from pelanggan where id_pelanggan = '$id_pelanggan'") or die (mysql_error());
$data = mysql_fetch_array($sql);
?>




<form method="post" enctype="multipart/form-data" >
<h2><center><br> FORM EDIT DATA PELANGGAN </br></center></h2>
<table class="table table-bordered"  width="100%" cellspacing="0">
 <tr>
                 <td align="right"><b>USERNAME : </b></td>
                 <td><input class="form-control" type="text" name="username" size="40" value="<?php echo $data['username'] ?>" /></td>
                </tr>
                <tr>
                 <td align="right"><b>PASSWORD : </b></td>
                 <td><input class="form-control" type="text" name="password" size="40" value="<?php echo $data['password'] ?>" /></td>
                </tr>
             <tr>
                 <td align="right"><b>NAMA LENGKAP : </b></td>
                 <td><input class="form-control" type="text" name="nama_pelanggan" size="40" value="<?php echo $data['nama_pelanggan'] ?>" /></td>
                </tr>
             <tr>
             <tr>
                 <td align="right"><b>NO HP : </b></td>
                 <td><input class="form-control" type="text" name="kontak_pelanggan" size="40" value="<?php echo $data['kontak_pelanggan'] ?>" /></td>
                </tr>
             <tr>
                             <td align="right"><b>ALAMAT : </b></td>
                 <td><textarea name="alamat_pelanggan" class="form-control"  rows="10"> <?php echo $data['alamat_pelanggan'] ?>
        </textarea> </td>
                </tr>

                <input class="form-control" type="hidden" name="level" size="40" value="penyewa" />
               

  <br>
  <tr>
     <td></td>
    <td><input name="simpan" type="submit" id="simpan" value="Simpan">
      </td>
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
  
  
  mysql_query("UPDATE pelanggan SET username = '$username' , password = '$password' , nama_pelanggan = '$nama_pelanggan' , kontak_pelanggan = '$kontak_pelanggan' , alamat_pelanggan = '$alamat_pelanggan' WHERE id_pelanggan='$id_pelanggan'")or die (mysql_error());

    //echo "<center><font color='#FF0000' size='+1'>Berhasil disimpan</font></center><br>";
    ?><script language="javascript">alert('Data Pelanggan berhasil di Edit')</script>
    <script>document.location.href="?page=pelanggan";</script><?php
  }


?>



















