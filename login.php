<?php
session_start();
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LAPAR EXPLORE </title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<style type="text/css">
  body{
    background-image: url(file/images/arsip3332.png); 
    background-size: cover;
    background-attachment: fixed;
  }
</style>



<body>

  <br><br><br>
  <center><h1>Lapar Explore Outdoor Rental Gear: Login</h1></center>
  <br>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-warning">
                    <div class="panel-heading">
                        <center><h3 class="panel-title">MASUKAN USERNAME DAN PASSWORD</h3></center>
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
                                <center><input type="submit" name="login" value="LOGIN" class="btn btn-lg btn-warning " /></center>

    
                            </fieldset>
                        <div class="panel-heading">
                        <h3 class="panel-title"><center>&copy;FERRY FAHRIZAL</center> </h3>
                    </div>
                        </form>

                        <?php
    if(isset($_POST['login'])) {
      $user = $_POST['user'];
      $pass = $_POST['pass'];
      $data_user = mysql_query("SELECT * FROM tb_admin WHERE username = '$user' AND password = '$pass'");
      $r = mysql_fetch_array($data_user);
      $username = $r['username'];
      $password = $r['password'];
      $level = $r['level'];
      $kode_user = $r['kode_user'];
      $nama_lengkap = $r['nama_lengkap'];
        if($user == $username && $pass == $password) {
          $_SESSION['level'] = $level;
          $_SESSION['kode_user'] = $kode_user;
          $_SESSION['nama_lengkap'] = $nama_lengkap;


              echo '<META HTTP-EQUIV="Refresh" Content="0; URL=halaman_admin.php?page=beranda">';
          } else {
            echo '<div class="alert alert-danger">Upss...!!! Login gagal, Masukan Username dan Password yg Benar</div>';
          }
        }
    ?>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
