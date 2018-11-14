<?php
	$_SESSION["uname"] = " ";
	//session_destroy();
	echo '<script language="javascript">';
	echo 'alert("Logged out successfully...")';
	echo '</script>';
	include 'login.html';
?>