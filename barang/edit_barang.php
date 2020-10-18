<?php
$id_menu = @$_GET['id_menu'];
$sql = mysql_query("SELECT * from tb_barang where id_menu = '$id_menu'") or die (mysql_error());
$data = mysql_fetch_array($sql);
?>


<h4>FORM EDIT DATA BARANG</h4>
  <form method="post" enctype="multipart/form-data" >
  	<table border="1" class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%" cellspacing="0">

       <tr>
         <td>NAMA BARANG</td>
        <td colspan="5">
          <input class="form-control" type="text" value="<?php echo $data['nama_menu'] ?>" size="60"  name="nama_menu" />
  
        </td>

      </tr>




                   <tr>
         <td>HARGA</td>
        <td colspan="5">
          <input class="form-control" type="text" value="<?php echo $data['harga_menu'] ?>" size="60"  name="harga_menu"  />
  
        </td>
         

      </tr>



      <tr>
                <td>STOK BARANG</td>
        <td colspan="5">
          <input class="form-control" type="number" value="<?php echo $data['stok'] ?>" size="60"  name="stok" />
  
        </td>
      </tr>


                         <tr>
         <td>DESKRIPSI</td>
        <td colspan="5">
          <textarea name="deskripsi_menu" class="form-control"  rows="10" >
            <?php echo $data['deskripsi_menu'] ?>
        </textarea>
  
        </td>
         

      </tr>


            <tr>
                <td>FOTO BARANG</td>
        <td colspan="5">
          <input class="form-control" type="file" value="<?php echo $data['foto_menu'] ?>" size="60"  name="foto_menu" />
  
        </td>
      </tr>




      <tr>
        
        <td colspan="6">
          <input class="btn btn-info btn-sm" name="edit_barang" type="submit" value="Edit Data">
        </td>
      </tr>

  		
  	</table>
  </form>


  <?php
  include 'koneksi.php';
  if (isset($_POST['edit_barang'])) {

  $nama_menu = $_POST['nama_menu'];
  $harga_menu = $_POST['harga_menu'];
  $stok = $_POST['stok'];
  $deskripsi_menu = $_POST['deskripsi_menu'];
  


  $lokasi_file    = $_FILES['foto_menu']['tmp_name'];
  $nama_file      = $_FILES['foto_menu']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file;
  $vdir_upload = "foto_produk/";
  $vfile_upload = $vdir_upload . $nama_file_unik;
  move_uploaded_file($_FILES["foto_menu"]["tmp_name"], $vfile_upload);


     mysql_query("UPDATE tb_barang SET nama_menu = '$nama_menu' , harga_menu = '$harga_menu' , stok = '$stok' , deskripsi_menu = 'deskripsi_menu' , foto_menu = '$nama_file_unik' WHERE id_menu='$id_menu'")or die (mysql_error());


    ?><script language="javascript">alert('Data BARANG <?php echo $data['nama_menu'] ?> Berhasil di edit')</script>
    <script>document.location.href="?page=menu_barang";</script><?php
  }


?>





