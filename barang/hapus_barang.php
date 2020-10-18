<?php
$id_menu = @$_GET['id_menu'];
mysql_query("DELETE from tb_barang where id_menu = '$id_menu'") or die (mysql_error());
?>


<script type="text/javascript">
	window.location.href="?page=menu_barang"
</script>