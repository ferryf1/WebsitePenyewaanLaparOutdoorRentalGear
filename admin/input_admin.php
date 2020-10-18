<div class="col-md-9">
				<div class="panel panel-success">
					<div class="panel-heading">TAMBAH PENGGUNA</div>
					<div class="panel-body">
						<p>

											<div class="panel-body">
						<form method="post" enctype="multipart/form-data" >
<table >

            <tr>
                 <td ><b>USERNAME</b></td><td width="20"></td>
                 <td><input class="form-control" type="text" name="username" size="60" placeholder="Username untuk Login" required /></td>
            </tr>

            <tr>
                 <td ><b>PASSWORD</b></td><td width="20"></td>
                 <td><input class="form-control" type="text" name="password" size="60" placeholder="Password untuk Login" required /></td>
            </tr>

            <tr>
                 <td ><b>NAMA PENGGUNA</b></td><td width="20"></td>
                 <td><input class="form-control" type="text" name="nama_lengkap" size="60" placeholder="Nama Lengkap"  required /></td>
            </tr>


  <br>
  <tr>
     <td></td><td width="30"></td>
    <td>
    <br>
        <input class="btn btn-primary btn-sm" name="simpan" type="submit" value="Simpan">
    </td>
    <td>&nbsp;</td>

    </tr>
</table>
</form>

<br><br>


<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $nama_lengkap = $_POST['nama_lengkap'];



    mysql_query("INSERT INTO  tb_admin VALUES ('','$username','$password','$nama_lengkap','superadmin')")or die (mysql_error());
    //echo "<center><font color='#FF0000' size='+1'>Berhasil disimpan</font></center><br>";
    ?><script language="javascript">alert('Data ADmin Pengguna Berhasil Disimpan')</script>
    <script>document.location.href="?page=tb_admin";</script><?php


}

?>

					</div>






	
				</p>
					</div>
				</div>
			</div>
		</div><!-- /.row -->

