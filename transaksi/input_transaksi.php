


 <?php 
// mencari kode barang dengan nilai paling besar
$query = "SELECT max(kode_transaksi) as maxKode FROM tb_transaksi";
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
$char = "LEX";
$kodeBarang = $char . sprintf("%05s", $noUrut);

?>




<form method="post" class="form-horizontal" enctype="multipart/form-data">


                    <?php
                    $level = $_SESSION['level'] == 'penyewa';
                    if($level) {
                        ?>
          <input class="form-control" type="hidden" name="id_pelanggan" size="60" value="<?php echo $id_pelanggan ?>"  readonly  />

          <?php } ?>

                              <?php
                    $level = $_SESSION['level'] == 'superadmin';
                    if($level) {
                        ?>
          <input class="form-control" type="hidden" name="id_pelanggan" size="60" value="8"  readonly  />

          <?php } ?>
          
<input type="hidden" class="form-control" name="kode_transaksi" value="<?php echo $kodeBarang ?>">
<input type="hidden" class="form-control" name="tgl_transaksi" value="<?php echo $tgl_now ?>">

          <div class="box-header">
            <p>Informasi.</p>
            <div class="alert alert-info"><a href="">

            <h4>Apakah Kamu Ingin Menyewa Barang <button class="btn btn-info"> <b>?</b> </button></h4>


            </strong></div>
          </div>
        

              <div class="form-group">
                <div class="col-md-8 col-md-offset-5">
                  <button class="btn btn-primary" name="kirim"><i class="fa fa-sign-in-alt"></i> YA</button>
                 
                </div>
              </div>


            </form>
            <center><a href="?page=menu_barang"><button class="btn btn-primary"><i class="fa fa-sign-in-alt"></i> TIDAK</button></a></center>


<?php
include 'koneksi.php';
if (isset($_POST['kirim'])) {

  $id_pelanggan = $_POST['id_pelanggan'];
  $kode_transaksi = $_POST['kode_transaksi'];
  $tgl_transaksi = $_POST['tgl_transaksi'];

    mysql_query("INSERT INTO  tb_transaksi VALUES ('','$id_pelanggan','$kode_transaksi','$tgl_transaksi','isi keranjang','','','','','','','','','','','','')")or die (mysql_error());


    //echo "<center><font color='#FF0000' size='+1'>Berhasil disimpan</font></center><br>";
    ?><script language="javascript">alert('TRANSAKSI BERHASIL, SILAHKAN MASUKKAN BARANG YANG DISEWA')</script>
    <script>document.location.href="?page=tb_transaksi";</script><?php
  }


?>



          </div>


