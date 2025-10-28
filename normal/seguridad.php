<?php
	session_start();
	if (!isset($_SESSION['name'])){
		header("LOCATION:../index.php");
	}
?>