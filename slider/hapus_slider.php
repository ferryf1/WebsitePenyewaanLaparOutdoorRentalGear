<?php
$id_slider = @$_GET['id_slider'];
mysql_query("DELETE from slider where id_slider = '$id_slider'") or die (mysql_error());
?>


<script type="text/javascript">
	window.location.href="?page=slider"
</script>