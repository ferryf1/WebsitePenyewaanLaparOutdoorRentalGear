<?php
$id_pelanggan = @$_GET['id_pelanggan'];
mysql_query("DELETE from pelanggan where id_pelanggan = '$id_pelanggan'") or die (mysql_error());
?>


<script type="text/javascript">
	window.location.href="?page=pelanggan"
</script>