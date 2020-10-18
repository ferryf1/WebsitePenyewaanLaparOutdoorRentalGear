
<body>

  <br><br><br><br>


        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-info">
                    <div class="panel-heading">
                        <center><h3 class="panel-title">SILAHKAN LOGIN PELANGGAN</h3></center>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="username" name="user" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="password" name="pass" type="password" required>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <center><input type="submit" name="login" value="Login" class="btn btn-lg btn-info " /></center>

    
                            </fieldset>
                        <div class="panel-heading">
                        <h3 class="panel-title"><center>Belum PUnya Akun, Silahkan Daftar <a href="?page=daftar_pelanggan">Disini</a> </center> </h3>
                    </div>
                        </form>

                        <?php
    if(isset($_POST['login'])) {
      $user = $_POST['user'];
      $pass = $_POST['pass'];
      $data_user = mysql_query("SELECT * FROM pelanggan WHERE username = '$user' AND password = '$pass'");
      $r = mysql_fetch_array($data_user);
      $username = $r['username'];
      $password = $r['password'];
      $level = $r['level'];
      $id_pelanggan = $r['id_pelanggan'];
      $nama_pelanggan = $r['nama_pelanggan'];
      $kontak_pelanggan = $r['kontak_pelanggan'];
      $alamat_pelanggan = $r['alamat_pelanggan'];
        if($user == $username && $pass == $password) {
          $_SESSION['level'] = $level;
          $_SESSION['id_pelanggan'] = $id_pelanggan;
          $_SESSION['nama_pelanggan'] = $nama_pelanggan;
          $_SESSION['kontak_pelanggan'] = $kontak_pelanggan;
          $_SESSION['alamat_pelanggan'] = $alamat_pelanggan;


              echo '<META HTTP-EQUIV="Refresh" Content="0; URL=halaman_admin_penyewa.php?page=menu_barang">';
          } else {
            echo '<div class="alert alert-danger">Upss...!!! Login gagal, Masukan Username dan Password yg Benar</div>';
          }
        }
    ?>


                    </div>
                </div>
            </div>
        </div>



