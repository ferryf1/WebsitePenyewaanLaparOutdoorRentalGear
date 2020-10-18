<?php
$id_uraian = @$_GET['id_uraian'];
$sql = mysql_query("SELECT * from tb_uraian_transaksi INNER JOIN tb_barang ON tb_uraian_transaksi.id_menu=tb_barang.id_menu where tb_uraian_transaksi.id_uraian = '$id_uraian'") or die (mysql_error());
$data = mysql_fetch_array($sql);


$stok_lama=$data['stok'];
$banyak_sewa=$data['banyak'];

$stok_update=$stok_lama+$banyak_sewa;
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
         <td>STOK LAMA</td>
        <td colspan="5">
          <input class="form-control" type="text" value="<?php echo $data['stok'] ?>" size="60"  readonly=""  />
  
        </td>
         

      </tr>

                         <tr>
         <td>JUMLAH YANG DISEWA</td>
        <td colspan="5">
          <input class="form-control" type="text" value="<?php echo $data['banyak'] ?>" size="60"  readonly=""  />
  
        </td>
         

      </tr>




      <tr>
         <td>STOK BARU/UPDATE</td>
        <td colspan="5">
          <input class="form-control" type="text" name="stok" value="<?php echo $stok_update ?>" size="60"  readonly=""  />
  
        </td>
         

      </tr>




      <tr>
        
        <td colspan="6">
          <input class="btn btn-info btn-sm" name="kembali_stok" type="submit" value="Update Stok">
        </td>
      </tr>

  		
  	</table>
  </form>


  <?php
  include 'koneksi.php';
  if (isset($_POST['kembali_stok'])) {

  $stok = $_POST['stok'];



     mysql_query("UPDATE tb_uraian_transaksi INNER JOIN tb_barang ON tb_uraian_transaksi.id_menu=tb_barang.id_menu INNER JOIN tb_transaksi ON tb_uraian_transaksi.id_transaksi=tb_transaksi.id_transaksi SET stok = '$stok' , status2 = 'SELESAI'  WHERE tb_uraian_transaksi.id_uraian='$id_uraian'")or die (mysql_error());


    ?><script language="javascript">alert('Data Stok <?php echo $data['nama_menu'] ?> Berhasil di Update')</script>
    <script>document.location.href="?page=menu_barang";</script><?php
  }


?>



  <?php 

  include 'pinjaman/preview_pinjaman_individu.php';

   ?>





