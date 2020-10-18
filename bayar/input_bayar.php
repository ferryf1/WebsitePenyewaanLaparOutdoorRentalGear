


                    <?php
                    $level = $_SESSION['level'] == 'penyewa';
                    if($level) {
                        ?>

                        <?php
                    
$id_transaksi = @$_GET['id_transaksi'];
$sql = mysql_query("SELECT * from tb_transaksi INNER JOIN tb_uraian_transaksi ON tb_transaksi.id_transaksi=tb_uraian_transaksi.id_transaksi  where tb_transaksi.id_transaksi = '$id_transaksi'") or die (mysql_error());
$data = mysql_fetch_array($sql);

?>




 <?php 
// mencari kode barang dengan nilai paling besar
$query = "SELECT max(no_bayar) as maxKode FROM tb_bayar";
$hasil = mysql_query($query);
$dataa = mysql_fetch_array($hasil);
$kodeBarang = $dataa['maxKode'];
 
// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodeBarang, 5, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;
 
// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "BYR";
$kodeBarang = $char . sprintf("%05s", $noUrut);

?>






          <div class="box-header">
            <h3 class="box-title">Transfer Ke No Rekening: <button class="btn btn-info">146-00-1110671-8 </button> Nama : <button class="btn btn-info">Andi Mukhlis Heriyan  </button> </h3>
            <br>
            
            <p>Kirim bukti pembayaran anda disini</p>
            <div class="alert alert-info">Total tagihan anda <strong>Rp. <?php echo number_format($data["total_pembayaran"]) ?></strong> --- Kode Transaksi :<strong><?php echo $data["kode_transaksi"] ?></strong></div>
          </div>
          <div class="box-body">
            <form method="post" class="form-horizontal" enctype="multipart/form-data">
              <div class="form-group">
                <label class="control-label col-md-3">Nama Penyetor</label>
                <div class="col-md-7">
                  <input type="text" class="form-control" name="nama" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Bank</label>
                <div class="col-md-7">
                  <input type="bank" class="form-control" name="bank" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Jumlah</label>
                <div class="col-md-7">
                  <input type="number" class="form-control" name="jumlah_bayar" min="1" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Foto Ktp</label>
                <div class="col-md-7">
                  <input type="file" class="form-control" name="file_ktp">
                  
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Foto Bukti</label>
                <div class="col-md-7">
                  <input type="file" class="form-control" name="file_bayar">
                  <p class="text-danger">foto bukti dan KTP harus JPG </p>
                </div>
              </div>

              <input type="hidden" class="form-control" name="no_bayar" value="<?php echo $kodeBarang ?>">

              <input type="hidden" class="form-control" name="tgl_bayar" value="<?php echo $tgl_now ?>">


              <input type="hidden" class="form-control" name="ket_bayar" value="TRANSFER">

              <input type="hidden" class="form-control" name="status" value="BUKTI BAYAR">



              <div class="form-group">
                <div class="col-md-8 col-md-offset-5">
                  <button class="btn btn-primary" name="kirim"><i class="fa fa-sign-in-alt"></i> Kirim</button>
                </div>
              </div>
            </form>
            


<?php
include 'koneksi.php';
if (isset($_POST['kirim'])) {


  $no_bayar = $_POST['no_bayar'];
  $nama = $_POST['nama'];
  $bank = $_POST['bank'];
  $jumlah_bayar = $_POST['jumlah_bayar'];
  $tgl_bayar = $_POST['tgl_bayar'];
  $ket_bayar = $_POST['ket_bayar'];

  //UPDATE STATUS1

  $status = $_POST['status'];
 

  $lokasi_file    = $_FILES['file_bayar']['tmp_name'];
  $nama_file      = $_FILES['file_bayar']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file;
  $vdir_upload = "foto_bayar/";
  $vfile_upload = $vdir_upload . $nama_file_unik;
  move_uploaded_file($_FILES["file_bayar"]["tmp_name"], $vfile_upload);


  $lokasi_file1    = $_FILES['file_ktp']['tmp_name'];
  $nama_file1      = $_FILES['file_ktp']['name'];
  $acak1           = rand(1,99);
  $nama_file_unik1 = $acak1.$nama_file1;
  $vdir_upload1 = "foto_ktp/";
  $vfile_upload1 = $vdir_upload1 . $nama_file_unik1;
  move_uploaded_file($_FILES["file_ktp"]["tmp_name"], $vfile_upload1);


    mysql_query("UPDATE tb_transaksi SET no_bayar = '$no_bayar', nama = '$nama', bank = '$bank', jumlah_bayar = '$jumlah_bayar', tgl_bayar = '$tgl_bayar', ket_bayar = '$ket_bayar', file_bayar = '$nama_file_unik', file_ktp = '$nama_file_unik1', status1 = '$status' WHERE id_transaksi='$id_transaksi'")or die (mysql_error());

   // mysql_query("UPDATE tb_sewa INNER JOIN tb_barang ON tb_sewa.id_menu=tb_barang.id_menu SET stok = '$sisa_stok' , status = '$status'  WHERE tb_sewa.id_sewa='$id_sewa'")or die (mysql_error());


    //echo "<center><font color='#FF0000' size='+1'>Berhasil disimpan</font></center><br>";
    ?><script language="javascript">alert('BUKTI PEMBAYARAN BERHASIL DIKIRIM')</script>
    <script>document.location.href="?page=tb_transaksi";</script><?php
  }


?>



          </div>

<?php } ?>

































































                    <?php
                    $level = $_SESSION['level'] == 'superadmin';
                    if($level) {
                        ?>

                        <?php

$id_transaksi = @$_GET['id_transaksi'];
$sql = mysql_query("SELECT * from tb_uraian_transaksi INNER JOIN  tb_transaksi ON tb_uraian_transaksi.id_transaksi=tb_transaksi.id_transaksi INNER JOIN tb_barang ON tb_uraian_transaksi.id_menu=tb_barang.id_menu where tb_uraian_transaksi.id_transaksi = '$id_transaksi'") or die (mysql_error());
$data = mysql_fetch_array($sql);


$stok=$data['stok'];

$banyak=$data['banyak'];


      $sisa_stok=$stok-$banyak;

?>



 <?php 
// mencari kode barang dengan nilai paling besar
$query = "SELECT max(no_bayar) as maxKode FROM tb_bayar";
$hasil = mysql_query($query);
$dataa = mysql_fetch_array($hasil);
$kodeBarang = $dataa['maxKode'];
 
// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodeBarang, 5, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;
 
// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "BYR";
$kodeBarang = $char . sprintf("%05s", $noUrut);

?>






          <div class="box-header">
            <h3 class="box-title">Konfirmasi Pembayaran Kode Transaksi <button class="btn btn-info"><?php echo $data['kode_transaksi'] ?> </button></h3>
            <p>Kirim bukti pembayaran anda disini</p>
            <div class="alert alert-info">Total tagihan anda <strong>Rp. <?php echo number_format($data["total_pembayaran"]) ?></strong></div>
          </div>
          <div class="box-body">
            <form method="post" class="form-horizontal" enctype="multipart/form-data">
              <div class="form-group">
                <label class="control-label col-md-3">Nama Petugas</label>
                <div class="col-md-7">
                  <input type="text" class="form-control" name="nama" ReadOnly value="<?php echo $nama_lengkap ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Jumlah</label>
                <div class="col-md-7">
                  <input type="number" class="form-control" name="jumlah_bayar" min="1" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Foto ktp</label>
                <div class="col-md-7">
                  <input type="file" class="form-control" name="file_ktp">
                  
                </div>
              </div>


              <input type="hidden" class="form-control" name="no_bayar" value="<?php echo $kodeBarang ?>">

              <input type="hidden" class="form-control" name="tgl_bayar" value="<?php echo $tgl_now ?>">

              <input type="hidden" class="form-control" name="ket_bayar" value="LANGSUNG ">

              <input type="hidden" class="form-control" name="status" value="TERBAYAR">



              <div class="form-group">
                <div class="col-md-8 col-md-offset-5">
                  <button class="btn btn-primary" name="kirim"><i class="fa fa-sign-in-alt"></i> Kirim</button>
                </div>
              </div>
            </form>
            


<?php
include 'koneksi.php';
if (isset($_POST['kirim'])) {

$no_bayar = $_POST['no_bayar'];
  $nama = $_POST['nama'];
  $bank = $_POST['bank'];
  $jumlah_bayar = $_POST['jumlah_bayar'];
  $tgl_bayar = $_POST['tgl_bayar'];
  $ket_bayar = $_POST['ket_bayar'];

  //UPDATE STATUS1

  $status = $_POST['status'];
 

  $lokasi_file    = $_FILES['file_bayar']['tmp_name'];
  $nama_file      = $_FILES['file_bayar']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file;
  $vdir_upload = "foto_bayar/";
  $vfile_upload = $vdir_upload . $nama_file_unik;
  move_uploaded_file($_FILES["file_bayar"]["tmp_name"], $vfile_upload);


  $lokasi_file1    = $_FILES['file_ktp']['tmp_name'];
  $nama_file1      = $_FILES['file_ktp']['name'];
  $acak1           = rand(1,99);
  $nama_file_unik1 = $acak1.$nama_file1;
  $vdir_upload1 = "foto_ktp/";
  $vfile_upload1 = $vdir_upload1 . $nama_file_unik1;
  move_uploaded_file($_FILES["file_ktp"]["tmp_name"], $vfile_upload1);


    mysql_query("UPDATE tb_transaksi SET no_bayar = '$no_bayar', nama = '$nama', bank = '$bank', jumlah_bayar = '$jumlah_bayar', tgl_bayar = '$tgl_bayar', ket_bayar = '$ket_bayar', file_bayar = '$nama_file_unik', file_ktp = '$nama_file_unik1' WHERE id_transaksi='$id_transaksi'")or die (mysql_error());

    //mysql_query("UPDATE tb_sewa SET status = '$status' WHERE id_sewa='$id_sewa'")or die (mysql_error());

    mysql_query("UPDATE tb_uraian_transaksi INNER JOIN tb_transaksi ON tb_uraian_transaksi.id_transaksi=tb_transaksi.id_transaksi INNER JOIN tb_barang ON tb_uraian_transaksi.id_menu=tb_barang.id_menu SET stok = '$sisa_stok' , status1 = 'TERBAYAR'  WHERE tb_uraian_transaksi.id_transaksi='$id_transaksi'")or die (mysql_error());


    //echo "<center><font color='#FF0000' size='+1'>Berhasil disimpan</font></center><br>";
    ?><script language="javascript">alert('PEMBAYARAN BERHASIL')</script>
    <script>document.location.href="?page=tb_transaksi";</script><?php
  }


?>



          </div>


<?php } ?>
