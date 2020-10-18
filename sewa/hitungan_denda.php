<?php
$id_uraian = @$_GET['id_uraian'];
$sql = mysql_query("SELECT * from tb_uraian_transaksi INNER JOIN tb_barang ON tb_uraian_transaksi.id_menu=tb_barang.id_menu INNER JOIN tb_transaksi ON tb_uraian_transaksi.id_transaksi=tb_transaksi.id_transaksi where tb_uraian_transaksi.id_uraian = '$id_uraian'") or die (mysql_error());
$data = mysql_fetch_array($sql);


$tanggal1 = new DateTime();
$tanggal2 = new DateTime($data['tgl_akhir_sewa']);
$perbedaan = $tanggal2->diff($tanggal1)->format("%a");

$total_sewa=$data['harga_menu'];
$nilaii_denda=$perbedaan*$total_sewa;

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
         <td>LAMA SEWA</td>
        <td colspan="5">
          <input class="form-control" type="text" value="<?php echo $data['lama_sewa'] ?>" size="60"  readonly=""  />
  
        </td>
         

      </tr>


                         <tr>
         <td>JUMLAH YANG DISEWA</td>
        <td colspan="5">
          <input class="form-control" type="text" value="<?php echo $data['banyak'] ?>" size="60"  readonly=""  />
  
        </td>
         

      </tr>


      <tr>
         <td>NILAI TOTAL SEWA</td>
        <td colspan="5">
          <input class="form-control" type="text" name="lama_denda" value="<?php echo $data['total_pembayaran'] ?>" size="60"  readonly=""  />
  
        </td>
         

      </tr>

      <tr>
         <td>HARI DENDA</td>
        <td colspan="5">
          <input class="form-control" type="text" name="lama_denda" value="<?php echo $perbedaan ?>" size="60"  readonly=""  />
  
        </td>
         

      </tr>


      <tr>
         <td>NILAI DENDA</td>
        <td colspan="5">
          <input class="form-control" type="text" name="nilai_denda" value="<?php echo $nilaii_denda ?>" size="60"  readonly=""  />
  
        </td>
         

      </tr>




      <tr>
        
        <td colspan="6">
          <input class="btn btn-info btn-sm" name="hitung_denda" type="submit" value="Save Denda">
        </td>
      </tr>

  		
  	</table>
  </form>


  <?php
  include 'koneksi.php';
  if (isset($_POST['hitung_denda'])) {

  $lama_denda = $_POST['lama_denda'];
   $nilai_denda = $_POST['nilai_denda'];


     mysql_query("UPDATE tb_transaksi INNER JOIN tb_uraian_transaksi ON tb_transaksi.id_transaksi=tb_uraian_transaksi.id_transaksi SET lama_denda = '$lama_denda' , nilai_denda = '$nilai_denda' , status2 = 'SELESAI/RETURN STOK'  WHERE tb_uraian_transaksi.id_uraian='$id_uraian'")or die (mysql_error());


    ?><script language="javascript">alert('Data Denda <?php echo $data['kode_transaksi'] ?> Berhasil di Tambahkan, Status Pending (menunggu pembayaran)')</script>
    <script>document.location.href="?page=history";</script><?php
  }


?>



  <?php 

  include 'pinjaman/preview_pinjaman_individu.php';

   ?>





