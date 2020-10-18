<?php
$id_transaksi = @$_GET['id_transaksi'];
$sql = mysql_query("SELECT * from tb_uraian_transaksi INNER JOIN tb_barang ON tb_uraian_transaksi.id_menu=tb_barang.id_menu where tb_uraian_transaksi.id_transaksi = '$id_transaksi'") or die (mysql_error());
$data = mysql_fetch_array($sql);


$stok_lama=$data['stok'];
$banyak_sewa=$data['banyak'];

$stok_update=$stok_lama+$banyak_sewa;
?>




<h3>BARANG DIBAWAH YANG DIPESAN SEBELUMNYA BELUM BAYAR DAN AKAN DI <button class="btn btn-danger">CANCEL</button> </h3>



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
        
        <td colspan="6">
          <input class="btn btn-info btn-sm" name="kembali_stok" type="submit" value="CANCEL">
        </td>
      </tr>

      
    </table>
  </form>


  <?php
  include 'koneksi.php';
  if (isset($_POST['kembali_stok'])) {

  $stok = $_POST['stok'];


     mysql_query("UPDATE tb_transaksi SET status1 = 'CANCEL', status2 = 'SELESAI'  WHERE id_transaksi='$id_transaksi'")or die (mysql_error());


    ?><script language="javascript">alert('Data Berhasil Dicancel Berhasil di Update')</script>
    <script>document.location.href="?page=tb_transaksi";</script><?php
  }


?>







