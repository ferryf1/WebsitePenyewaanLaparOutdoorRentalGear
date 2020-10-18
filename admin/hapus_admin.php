<?php
$kode_user = @$_GET['kode_user'];
mysql_query("DELETE from tb_admin where kode_user = '$kode_user'") or die (mysql_error());
?>


<script type="text/javascript">
	window.location.href="?page=tb_admin"
</script>