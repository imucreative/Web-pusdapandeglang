<?php
	session_start();
	session_destroy();
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';
	exit;
?>