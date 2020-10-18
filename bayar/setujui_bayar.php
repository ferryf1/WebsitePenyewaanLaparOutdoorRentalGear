
<?php

$id_transaksi = @$_GET['id_transaksi'];
$sql = mysql_query("SELECT * from tb_uraian_transaksi INNER JOIN  tb_transaksi ON tb_uraian_transaksi.id_transaksi=tb_transaksi.id_transaksi INNER JOIN tb_barang ON tb_uraian_transaksi.id_menu=tb_barang.id_menu where tb_uraian_transaksi.id_transaksi = '$id_transaksi'") or die (mysql_error());
$data = mysql_fetch_array($sql);





$stok=$data['stok'];

$banyak=$data['banyak'];


      $sisa_stok=$stok-$banyak;


      //echo $sisa_stok;


?>


<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">FORM CHECKING BUKTI PEMBAYARAN :<?php echo $data['no_bayar'] ?>, KODE TRANSAKSI: <?php echo $data['kode_transaksi'] ?>  </div>
					<div class="panel-body">
                        <div class="panel-body">

											
<form method="post" enctype="multipart/form-data" >
<table >

                    <tr>
                 <td ><b>KODE TRANSAKSI </b></td><td width="20"></td>
                 <td><input class="form-control" type="text" size="60"  readonly value="<?php echo $data['kode_transaksi'] ?>" /></td>
            </tr>

                         <tr>
                 <td ><b>KODE BAYAR</b></td><td width="20"></td>
                 <td><input class="form-control" type="text" size="60"  readonly value="<?php echo $data['no_bayar'] ?>"  /></td>
            </tr>

             <tr>
                 <td ><b>NAMA</b></td><td width="20"></td>
                 <td><input class="form-control" type="text" size="60"  readonly value="<?php echo $data['nama'] ?>"  /></td>
            </tr>

                         <tr>
                 <td ><b>BANK</b></td><td width="20"></td>
                 <td><input class="form-control" type="text" size="60"  readonly value="<?php echo $data['bank'] ?>"  /></td>
            </tr>

                         <tr>
                 <td ><b>TOTAL PEMBAYARAN</b></td><td width="20"></td>
                 <td><input class="form-control" type="text" size="60"  readonly value="<?php echo $data['jumlah_bayar'] ?>"  /></td>
            </tr>


                         <tr>
                 <td ><b>TGL PEMBAYARAN</b></td><td width="20"></td>
                 <td><input class="form-control" type="text" size="60"  readonly value="<?php echo $data['tgl_bayar'] ?>"  /></td>
            </tr>




                        <tr>
             <td ><b></b></td><td width="20"></td>
                 <td><b>---------------- BUKTI BAYAR TRANSFER DAN KTP PENYEWA -------------------</b></td>
            </tr>

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%" cellspacing="0">
                                <tr>
                                <th align="center">FOTO TRANSFER</th>
                                <th align="center">FOTO IDENTITAS PENYEWA</th>

                            </tr>

                            <tr>
                                <th><img src="foto_bayar/<?php echo $data['file_bayar'] ?>" alt="" width="350"  height="200"> <br> <a target="_blank" href="foto_bayar/<?php echo $data['file_bayar'] ?>"><?php echo $data['file_bayar'] ?></a>
                                </th>
                               <th><img src="foto_ktp/<?php echo $data['file_ktp'] ?>" alt="" width="350"  height="200"> <br> <a target="_blank" href="foto_ktp/<?php echo $data['file_ktp'] ?>"><?php echo $data['file_ktp'] ?></a> </th>
                           </tr>
                            </table>



     <td></td><td width="30"></td>
    <td>
    <br>
        <input class="btn btn-primary btn-sm" name="setujui" type="submit" value="SETUJUI PEMBAYARAN">
    </td>
    <td>&nbsp;</td>

    </tr>
</table>
</form>

<br><br>



<?php
include 'koneksi.php';
if (isset($_POST['setujui'])) {



     // mysql_query("UPDATE tb_sewa SET status = 'TERBAYAR' WHERE id_sewa='$id_sewa'")or die (mysql_error());

      mysql_query("UPDATE tb_uraian_transaksi INNER JOIN tb_transaksi ON tb_uraian_transaksi.id_transaksi=tb_transaksi.id_transaksi INNER JOIN tb_barang ON tb_uraian_transaksi.id_menu=tb_barang.id_menu SET stok = '$sisa_stok' , status1 = 'TERBAYAR'  WHERE tb_uraian_transaksi.id_transaksi='$id_transaksi'")or die (mysql_error());

    //echo "<center><font color='#FF0000' size='+1'>Berhasil disimpan</font></center><br>";
    ?><script language="javascript">alert('Pembayaran dengan kode Pembayaran : <?php  echo $data['no_bayar'] ?> Telah disetujui')</script>
    <script>document.location.href="?page=check_pembayaran";</script><?php
  }
?>


					</div>

					</div>
				</div>
			</div>
		</div><!-- /.row -->

