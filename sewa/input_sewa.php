<?php
$id_menu = @$_GET['id_menu'];
$sql = mysql_query("SELECT * from tb_barang where id_menu = '$id_menu'") or die (mysql_error());
$data = mysql_fetch_array($sql);
?>





 <?php 
// mencari kode barang dengan nilai paling besar
$query = "SELECT max(no_sewa) as maxKode FROM tb_sewa";
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







  <form method="post" enctype="multipart/form-data" >
  	<table border="1" class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%" cellspacing="0">

  		            <tr>
        <td colspan="6">
          <center><img src="foto_produk/<?php echo $data['foto_menu'] ?>" alt="" width="150"  height="150"></center>
  
        </td>

      </tr>

       <tr>
         <td>NAMA BARANG</td>
        <td colspan="5">
          <input class="form-control" type="text" value="<?php echo $data['nama_menu'] ?>" size="60"  readonly=""  />
  
        </td>

      </tr>

                   <tr>
         <td>DESKRIPSI</td>
        <td colspan="5">
          <input class="form-control" type="text" value="<?php echo $data['deskripsi_menu'] ?>" size="60"  readonly=""  />
  
        </td>
         

      </tr>


                   <tr>
         <td>HARGA</td>
        <td colspan="5">
          <input class="form-control" type="text" value="<?php echo rupiah($data['harga_menu']) ?>" size="60"  readonly=""  />
  
        </td>
         

      </tr>



      <tr>
                <td>STOK BARANG</td>
        <td colspan="5">
          <input class="form-control" type="number" value="<?php echo $data['stok'] ?>" size="60"  readonly="" />
  
        </td>
      </tr>

          <input class="form-control" type="hidden" name="no_sewa" size="60" value="<?php echo $kodeBarang; ?>"  readonly  />
          <input class="form-control" type="hidden" name="id_menu" size="60" value="<?php echo $data['id_menu'] ?>"  readonly  />






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


      <tr>


        <td colspan="6">

          <input class="form-control" type="text" value="silahkan isi data jumlah barang dan lama penyewaan. " size="60"  readonly="" />

          
  
        </td>
      </tr>


            <tr>
        <td colspan="5">
          <input class="form-control" type="number" placeholder="JUMLAH BARANG YANG DISEWA" name="banyak" size="60"  />
  
        </td>

      </tr>
      <tr>

        <td colspan="5">
          <input class="form-control" type="number" placeholder="LAMA BARANG YANG DISEWA" name="lama_sewa" size="60"  />


      </tr>




      <tr>
        
        <td colspan="6">
          <input class="btn btn-info btn-sm" name="sewa" type="submit" value="Keranjang">
        </td>
      </tr>

  		
  	</table>
  </form>


  <?php
  include 'koneksi.php';
  if (isset($_POST['sewa'])) {

  $id_menu = $_POST['id_menu'];
   $id_pelanggan = $_POST['id_pelanggan'];
    $no_sewa = $_POST['no_sewa'];
     $banyak = $_POST['banyak'];
      $lama_sewa = $_POST['lama_sewa'];

//PErkalian Banyak x harga barang
      $harga=$data['harga_menu'];

      $jumlah_sewa=$harga*$banyak;

//PERKALIAN TOTAL PEMBAYARAN JUMLAH SEWA x LAMA SEWA
      $total_sewa=$jumlah_sewa*$lama_sewa;

      //PENGURANGAN STOK BARANG
//$stok=$data['stok'];

     // $sisa_stok=$stok-$banyak;

      //BATAS SEWA

      //TANGGAL JATUH TEMPO

$tgl1 = date("Y-m-d");// pendefinisian tanggal awal
$tgl2 = date('Y-m-d', strtotime("+$lama_sewa days", strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 6 hari
//echo " Tanggal Jatuh Tempo = $tgl2"; //print tanggal





     mysql_query("INSERT INTO  tb_sewa VALUES ('','$id_menu','$id_pelanggan','$no_sewa','$banyak','$lama_sewa','$jumlah_sewa','$total_sewa', '$tgl_now','$tgl2','-','Pending','','','')")or die (mysql_error());

    // mysql_query("UPDATE tb_barang SET stok = '$sisa_stok' WHERE id_menu='$id_menu'")or die (mysql_error());


    ?>

                    <?php
                    $level = $_SESSION['level'] == 'penyewa';
                    if($level) {
                        ?>

    <script language="javascript">alert('Data Penyewaan <?php echo $data['nama_menu'] ?> Berhasil di Tambahkan, Status Pending (menunggu pembayaran)')</script>
    <script>document.location.href="?page=checkout";</script>

  <?php } ?>


                      <?php
                    $level = $_SESSION['level'] == 'superadmin';
                    if($level) {
                        ?>

    <script language="javascript">alert('Data Penyewaan <?php echo $data['nama_menu'] ?> Berhasil di Tambahkan, Status Pending (menunggu pembayaran)')</script>
    <script>document.location.href="?page=check_pembayaran";</script>

  <?php } ?>


    <?php
  }


?>

