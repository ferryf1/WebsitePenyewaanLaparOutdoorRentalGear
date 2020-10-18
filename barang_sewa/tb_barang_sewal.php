<center><h4>LIST BARANG YANG DISEWA</h4> </center><br>

<?php
$id_transaksi = @$_GET['id_transaksi'];
$sql = mysql_query("SELECT * from tb_transaksi where id_transaksi = '$id_transaksi'") or die (mysql_error());
$data = mysql_fetch_array($sql);


?>

<TABLE border="1" class="table table-bordered" >
<tr>
  <TH>KODE TRANSAKSI</TH>
  <th>TGL TRANSAKSI</th>
  <TH>STATUS</TH>

</tr>

<tr>
  <td><?php echo $data['kode_transaksi']; ?></td>
  <td><?php echo $data['tgl_transaksi']; ?></td>
  <td><?php echo $data['status1']; ?></td>

  </tr>

</TABLE>





 <div class="box-body">
            <form method="post" class="form-horizontal" enctype="multipart/form-data">
              <div class="form-group">
                <label class="control-label col-md-3">BARANG DISEWA</label>
                <div class="col-md-7">
                       <select name="id_menu" class="form-control" required>
                  <option value="">Pilih</option>
                 <?php
           //$query=mysql_query("SELECT * FROM tb_up3 where level='$level' ORDER BY ulp");
                   $query=mysql_query("SELECT * FROM tb_barang order by id_menu ");
                   while($r4=mysql_fetch_array($query)){
                  echo "<option value='$r4[id_menu]'>$r4[nama_menu]---stok($r4[stok])---Harga($r4[harga_menu])</option>";}
                 ?>
                </div>
              </select>
            </div>
          </div>



              <div class="form-group">
                <label class="control-label col-md-3">JUMLAH DISEWA</label>
                <div class="col-md-7">
                  <input type="text" class="form-control" name="banyak" required>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3">LAMA DISEWA</label>
                <div class="col-md-7">
                  <input type="text" class="form-control" name="lama_sewa" required>
                </div>
              </div>

                            <div class="form-group">
                <label class="control-label col-md-3">TGL AWAL SEWA</label>
                <div class="col-md-7">
                  <input type="date" class="form-control" name="tgl_sewa" required>
                </div>
              </div>

                            <div class="form-group">
                <label class="control-label col-md-3">TGL AKHIR SEWA</label>
                <div class="col-md-7">
                  <input type="date" class="form-control" name="tgl_akhir_sewa" required>
                </div>
              </div>


              <input type="hidden" class="form-control" name="id_transaksi" value="<?php echo $data['id_transaksi'] ?>">



              <div class="form-group">
                <div class="col-md-8 col-md-offset-5">
                  <button class="btn btn-primary" name="kirim"><i class="fa fa-sign-in-alt"></i> Tambahkan </button>
                </div>
              </div>
            </form>
            


<?php
include 'koneksi.php';
if (isset($_POST['kirim'])) {

  $id_transaksi = $_POST['id_transaksi'];
  $id_menu = $_POST['id_menu'];
   $banyak = $_POST['banyak'];
  $lama_sewa = $_POST['lama_sewa'];

  $jumlah_sewa = $_POST['jumlah_sewa'];
  $total_sewa = $_POST['total_sewa'];
  $tgl_sewa = $_POST['tgl_sewa'];
  $tgl_akhir_sewa = $_POST['tgl_akhir_sewa'];



    mysql_query("INSERT INTO  tb_uraian_transaksi VALUES ('','$id_transaksi','$id_menu','$banyak','$lama_sewa','0','0','$tgl_sewa','$tgl_akhir_sewa')")or die (mysql_error());

   // mysql_query("UPDATE tb_sewa INNER JOIN tb_barang ON tb_sewa.id_menu=tb_barang.id_menu SET stok = '$sisa_stok' , status = '$status'  WHERE tb_sewa.id_sewa='$id_sewa'")or die (mysql_error());


    //echo "<center><font color='#FF0000' size='+1'>Berhasil disimpan</font></center><br>";
    ?><script language="javascript">alert('BARANG SEWAAN BERHASIL DI TAMBAHKAN')</script>
    <script>document.location.href="?action=lihat_barang_sewa&id_transaksi=<?php echo $data['id_transaksi'] ?>";</script><?php
  }


?>



          </div>










































      <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0">
        <thead>
          <tr color="blue" align="center" >
            <th align="center">NO</th>
            <th align="center">NAMA MENU</th>
            <th align="center">HARGA SATUAN</th>
            <th align="center">BANYAK</th>
            <th align="center">LAMA SEWA</th>
            <th align="center">JUMLAH SEWA</th>
            <th align="center">TOTAL SEWA</th>
            <th align="center">TGL SEWA</th>
            <th align="center">TGL AKHIR SEWA</th>


             

            <th align="center">OPTION</th>



          </tr>
        </thead>
        <tbody>

                       <?php

          include 'koneksi.php';
          $no=1;
            $query=mysql_query("SELECT * from tb_uraian_transaksi INNER JOIN tb_barang ON tb_barang.id_menu=tb_uraian_transaksi.id_menu where id_transaksi = '$id_transaksi' order by id_uraian ASC");
          
          while ($data = mysql_fetch_array($query))
          {

            //jumlah_sewa
            $a=$data['banyak'];
            $b=$data['harga_menu'];

            $jumlah_sewa=$a*$b;

            //TOTAL SEWA

            $c=$data['lama_sewa'];

            $total_sewa=$c*$jumlah_sewa;

            $total_bayarr += $total_sewa;
$aaa =$total_bayarr;
?>



           <tr>
            <td align="left"><?php echo $no++ ?></td>
            <td align="left"><?php echo $data['nama_menu'] ?></td>
            <td align="left"><?php echo rupiah($data['harga_menu']) ?></td>
            <td align="left"><?php echo $data['banyak'] ?></td>
            <td align="left"><?php echo $data['lama_sewa'] ?></td>
            <td align="left"><?php echo rupiah($jumlah_sewa)?></td>
            <td align="left"><?php echo rupiah($total_sewa)?></td>
            <td align="left"><?php echo $data['tgl_sewa'] ?></td>
            <td align="left"><?php echo $data['tgl_akhir_sewa'] ?></td>

            

 <td>

      <a onclick="return konfirmasi()" href="?action=hapus_barang_sewa&id_uraian=<?php echo $data ['id_uraian']; ?> "><button class="btn btn-danger btn-sm">HAPUS</button></a>
      <script type="text/javascript" language="JavaScript">
                 function konfirmasi()
                 {
                   tanya = confirm("Yakin Menghapus data, Jika Sudah di Hapus Data akan hilang..!!");
                   if (tanya == true) return true;
                   else return false;
                 }</script>



      </td>



</tr>
<?php } ?>
</tbody>

              <tr>
                <td colspan="6" align="left"><em><strong>TOTAL DIBAYAR</strong></em></td>
                <td colspan="4" align="left"><em><strong><?php echo rupiah($aaa) ?></strong></em></td>
              </tr>

</table>




 <div class="box-body">
            <form method="post" class="form-horizontal" enctype="multipart/form-data">

              <input type="hidden" class="form-control" name="status1" value="pending">

              <input type="hidden" class="form-control" name="total_pembayaran" value="<?php echo $aaa ?>">




              <div class="form-group">
                <div class="col-md-8 col-md-offset-5">
                  <button class="btn btn-primary" name="checkout"><i class="fa fa-sign-in-alt"></i>  Checkout </button>
                </div>
              </div>
            </form>
            


<?php
include 'koneksi.php';
if (isset($_POST['checkout'])) {

  $status1 = $_POST['status1'];
  $total_pembayaran = $_POST['total_pembayaran'];

     mysql_query("UPDATE tb_transaksi SET status1 = '$status1' , total_pembayaran = '$total_pembayaran'  WHERE id_transaksi='$id_transaksi'")or die (mysql_error());
   // mysql_query("UPDATE tb_sewa INNER JOIN tb_barang ON tb_sewa.id_menu=tb_barang.id_menu SET stok = '$sisa_stok' , status = '$status'  WHERE tb_sewa.id_sewa='$id_sewa'")or die (mysql_error());


    //echo "<center><font color='#FF0000' size='+1'>Berhasil disimpan</font></center><br>";
    ?><script language="javascript">alert('Checkout Berhasil')</script>
    <script>document.location.href="?page=tb_transaksi";</script><?php
  }


?>



          </div>
