<?php
$id_uraian = @$_GET['id_uraian'];
mysql_query("DELETE from tb_uraian_transaksi where id_uraian = '$id_uraian'") or die (mysql_error());
?>


<script type="text/javascript">
	window.location.href="?page=tb_transaksi"
</script>
