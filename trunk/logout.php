<?php
	session_start();
	session_destroy();
	session_unset();
    echo "<script language=javascript> window.location = 'index.php'; </script>";
?>